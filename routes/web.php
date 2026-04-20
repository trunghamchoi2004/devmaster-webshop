<?php

// Trang chủ
Route::get('/', 'ShopController@index')->name('trangchu');

Route::get('/lien-he', 'ShopController@contact')->name('shop.contact');
Route::post('/lien-he', 'ShopController@contactStore')->name('shop.contactStore');

// Danh mục
Route::get('/danh-muc/{slug}', 'ShopController@getProductsByCategory')->name('shop.category');

// Chi tiet sản phẩn
Route::get('/chi-tiet-san-pham/{slug}_{id}', 'ShopController@getProduct')->name('shop.product');
// Tim kiem san pham , tin tuc
Route::get('/tim-kiem', 'ShopController@search')->name('shop.search');

Route::get('/tin-tuc', 'ShopController@getListArticles')->name('shop.article');

// Chi tiet tin tuc
Route::get('/chi-tiet-tin-tuc/{id}', 'ShopController@getArticle')->name('shop.article.detail');

// Gio hang
Route::get('/dat-hang', 'CartController@index')->name('shop.cart');

// Thêm sản phẩm vào giỏ hàng
Route::get('/dat-hang/them-sp-vao-gio-hang/{id}', 'CartController@addToCart')->name('shop.cart.add-to-cart');

// Xóa SP khỏi giỏ hàng
Route::get('/dat-hang/xoa-sp-gio-hang/{id}', 'CartController@removeToCart')->name('shop.cart.remove-to-cart');

// Cập nhật giỏ hàng
Route::get('/dat-hang/cap-nhat-gio-hang', 'CartController@updateToCart')->name('shop.cart.update-to-cart');

// Áp dụng giảm giá
Route::get('/dat-hang/ma-giam-gia', 'CartController@checkCoupon')->name('shop.cart.check-coupon');

// Hủy đơn hàng
Route::get('/dat-hang/huy-don-hang', 'CartController@destroy')->name('shop.cart.destroy');

// Thanh toán
Route::get('/thanh-toan', 'CartController@checkout')->name('shop.cart.checkout');

Route::post('/thanh-toan', 'CartController@postCheckout')->name('shop.cart.checkout');

// Liên Hệ
Route::resource('contact', 'ContactController');

// Đăng nhập
Route::get('/admin/login', 'AdminController@login')->name('admin.login');
// Đăng xuất
Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');

Route::post('/admin/postLogin', 'AdminController@postLogin')->name('admin.postLogin');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'checkLogin'], function () {
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    // QL Banner
    Route::resource('banner', 'BannerController');
    // QL Thương Hiệu
    Route::resource('brand', 'BrandController');
    // QL Nhà Cung Cấp
    Route::resource('vendor', 'VendorController');
    // Ql Người dùng
    Route::resource('user', 'UserController');

    // Ql Đơn hàng
    Route::post('order/remove-to-cart', 'OrderController@removeToCart')->name('order.remove');

    Route::resource('order', 'OrderController');
    // QL bài viết
    Route::resource('article', 'ArticleController');
    // Cau Hinh Website
    Route::resource('setting', 'SettingController');
    // dashboard
    Route::get('dashboard/show-char', 'AdminController@showChar')->name('dashboard.showChar');
    Route::post('dashboard/filter', 'AdminController@filterChar')->name('dashboard.filterChar');
});

Auth::routes();
