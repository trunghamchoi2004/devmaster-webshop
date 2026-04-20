<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Cart;
use App\Category; // cần thêm dòng này nếu chưa có
use App\Coupon;
use App\Order;
use App\OrderDetail;
use App\Product;
use http\Env\Response;
use App\Statistical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class CartController extends GeneralController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        return view('shop.cart');
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return $this->notfound();
        }
        // Kiểm tra tồn tại giỏ hàng cũ
        $_cart = session('cart') ? session('cart') : '';

        // Khởi tạo lớp giỏ hàng
        $cart = new Cart($_cart);
        // Thêm sản phẩm vào giỏ
        $cart->add($product);
        // Lưu thông tin vào session

        $request->session()->put('cart', $cart);

        return redirect()->route('shop.cart');
    }

    // Xóa sp khỏi giỏ hàng
    public function removeToCart(Request $request, $id)
    {
        // Kiểm tra tồn tại giỏ hàng cũ
        $_cart = session('cart') ? session('cart') : '';
        // Khởi tạo giỏ hàng
        $cart = new Cart($_cart);
        $cart->remove($id);

        if (count($cart->products) > 0) {
            // Lưu thông tin vào session
            $request->session()->put('cart', $cart);
        } else {
            $request->session()->forget('cart');
        }

        return view('shop.components.cart');
    }

    // Cập nhật lại giỏ hàng
    public function updateToCart(Request $request)
    {
        // check nhập số lượng không đúng định dạng
        $validator = Validator::make($request->all(), [
            'qty' => 'required|numeric|min:1',
        ]);

        // check số lượng lỗi
        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'data' => $validator
            ]);
        }

        $product_id = $request->input('id');
        $qty = $request->input('qty');

        // Lấy giỏ hàng hiện tại thông qua session
        $_cart = session('cart');
        $cart = new Cart($_cart);
        $cart->store($product_id, $qty);

        if (count($cart->products) > 0) { // check  có sản phẩm trong giỏ hàng không
            // Lưu thông tin vào session
            $request->session()->put('cart', $cart);
        } else {
            $request->session()->forget('cart'); // clear session cart
        }

        return response()->json([
            'status'  => true, // thành công
            'data' => view('shop.components.cart')->render()
        ]);
    }

    // Check mã giảm giá
    public function checkCoupon(Request $request)
    {
        $coupon_code = $request->query('coupon_code');

        $coupon = Coupon::where('code', $coupon_code)->first();

        if (!$coupon) {
            return redirect()->back()->withErrors(['errorCoupon' => 'Mã giảm giá không tồn tại']);
        }


        $_cart = session('cart'); // lấy thông tin giỏ hàng
        $discount = 0; // số tiền được giảm giá , default = 0

        // check default tính theo giá
        if ($coupon->value) {
            $discount = $coupon->value;
        } else {
            if ($coupon->percent) {
                // tính theo %
                $discount = ($coupon->percent * $_cart->totalPrice) / 100;
            }
        }

        // Get lại giỏ hàng
        $cart = new Cart($_cart);
        $cart->discount = $discount; // set số tiền được giảm
        $cart->coupon = $coupon->code;

        // Lưu thông tin vào session
        $request->session()->put('cart', $cart);

        return redirect()->back();
    }

    // Hủy đơn hàng
    public function destroy(Request $request)
    {
        // remove session
        $request->session()->forget('cart');

        return redirect('/');
    }

    // Thanh toán
    public function checkout()
    {
        return view('shop.checkout');
    }

    // thêm đơn hàng
    public function postCheckout(Request $request)
    {
        // kiểm tra session cart - lưu thông tin giỏ hàng có tồn tại không
        if (!session('cart')) {
            return redirect('/');
        }

        $request->validate([
            'fullname' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        // Lấy thông tin giỏ hang hiện tại
        $_cart = session('cart');

        // Lưu vào bảng đơn đặt hàng - orders
        $order = new Order();
        $order->fullname = $request->input('fullname');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->note = $request->input('note');
        $order->total = $_cart->totalPrice;
        $order->discount = $_cart->discount;
        $order->coupon = $_cart->coupon;
        $order->order_status_id = 1; // 1 = mới
        // Tạo mã đơn hàng gửi tới khách hàng
        $order->code = 'DH-' . date('d') . date('m') . date('Y') . '-' . time();
        if ($order->save()) {
            $id_order = $order->id;
            foreach ($_cart->products as $product) {
                $_detail = new OrderDetail();
                $_detail->order_id = $id_order;
                $_detail->name = $product['item']->name;
                $_detail->image = $product['item']->image;
                $_detail->sku = $product['item']->sku;
                $_detail->product_id = $product['item']->id;
                $_detail->qty = $product['qty'];
                $_detail->price = $product['price'];
                $_detail->user_id = $product['item']->user_id;
                $_detail->save();

                // Giam số lượng trong kho
            }

            $data = OrderDetail::where('order_id', $order->id)->get();
            $quantity = 0;
            foreach ($data as $item) {
                $quantity +=  $item->qty;
            }
            $statistical = new Statistical();
            $statistical->total_quantity = $quantity;
            $statistical->total_price = $_cart->totalPrice;
            $statistical->period = Carbon::now();
            $statistical->id_user = $order->id;
            $statistical->id_status = 0;
            $statistical->save();

            // Xóa thông tin giỏ hàng Hiện tại
            $request->session()->forget('cart');

            // gửi email cho KH


            return redirect()->route('shop.cart.checkout')
                ->with('msg', 'Cảm ơn bạn đã đặt hàng. Mã đơn hàng của bạn : #' . $order->code);
        }
    }
}
