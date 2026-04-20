@extends('shop.layouts.main')
@section('content')
    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- BSTORE-BREADCRUMB START -->
                    <div class="bstore-breadcrumb">
                        <a href="/">Trang chủ<span><i class="fa fa-caret-right"></i> </span> </a>
                        <span> <i class="fa fa-caret-right"> </i> </span>
                        <a href="{{ route('shop.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                    </div>
                    <!-- BSTORE-BREADCRUMB END -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <!-- SINGLE-PRODUCT-DESCRIPTION START -->
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
                            <div class="single-product-view">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="thumbnail_1">
                                        <div class="single-product-image">
                                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
                            <div class="single-product-descirption">
                                <h2>{{ $product->name }}</h2>
                                <div class="single-product-condition">
                                    <p>Tình trạng:
                                        @if ($product->stock > 0)
                                            <span style="color: green">CÒN HÀNG</span>
                                        @else
                                            <span style="color: grey">HẾT HÀNG</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="single-product-price">
                                    <h2>{{ number_format($product->sale,0,",",".") }} <span style="text-transform: lowercase">đ</span></h2>
                                </div>
                                <div class="single-product-add-cart">
                                    <a class="add-cart-text" title="Add to cart" href="{{ route('shop.cart.add-to-cart', ['id' => $product->id]) }}">Mua Hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SINGLE-PRODUCT-DESCRIPTION END -->
                    <!-- SINGLE-PRODUCT INFO TAB START -->
                    <div class="row" style="margin-top: 20px">
                        <div class="col-sm-12">
                            <div class="product-more-info-tab">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs more-info-tab">
                                    <li class="active"><a href="#moreinfo" data-toggle="tab">Tóm Tắt</a></li>
                                    <li><a href="#datasheet" data-toggle="tab">Chi tiết</a></li>
                                    <li><a href="#review" data-toggle="tab">Đánh giá</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="moreinfo">
                                        <div class="tab-description">
                                            {!! $product->summary !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="datasheet">
                                        <div class="deta-sheet">
                                            {!! $product->description !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="review">
                                        <div class="row tab-review-row">
                                            <div class="col-xs-5 col-sm-4 col-md-4 col-lg-3 padding-5">
                                                <div class="tab-rating-box">
                                                    <span>Grade</span>
                                                    <div class="rating-box">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-empty"></i>
                                                    </div>
                                                    <div class="review-author-info">
                                                        <strong>write A REVIEW</strong>
                                                        <span>06/22/2015</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-7 col-sm-8 col-md-8 col-lg-9 padding-5">
                                                <div class="write-your-review">
                                                    <p><strong>write A REVIEW</strong></p>
                                                    <p>write A REVIEW</p>
                                                    <span class="usefull-comment">Was this comment useful to you? <span>Yes</span><span>No</span></span>
                                                    <a href="#">Report abuse </a>
                                                </div>
                                            </div>
                                            <a href="#" class="write-review-btn">Write your review!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SINGLE-PRODUCT INFO TAB END -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="left-title-area">
                                <h2 class="left-title">Sản Phẩm Đã Xem</h2>
                            </div>
                        </div>
                        <div class="related-product-area featured-products-area">
                            <div class="col-sm-12">
                                <div class=" row">
                                    <!-- RELATED-CAROUSEL START -->
                                    <div class="related-product">
                                        <!-- SINGLE-PRODUCT-ITEM START -->
                                        @foreach($viewedProducts as $item)
                                            <div class="item">
                                                <div class="single-product-item">
                                                    <div class="product-image">
                                                        <a href="#"><img src="{{ asset($item->image) }}" alt="{{ $item->name }}" /></a>
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="#">{{ $product->name }}</a>
                                                        <div class="price-box">
                                                            <span class="price">{{ number_format($product->sale,0,",",".") }} đ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- RELATED-CAROUSEL END -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- RIGHT SIDE BAR START -->
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="single-product-right-sidebar clearfix">
                        <h2 class="left-title">Tags </h2>
                        <div class="category-tag">
                            @foreach($tags as $tag)
                                <a href="/danh-muc/{{ $tag->slug }}">{{ $tag->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- SINGLE SIDE BAR END -->
            </div>
        </div>
    </section>
@endsection
