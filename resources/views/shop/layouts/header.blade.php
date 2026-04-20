<div class="header-top">
    <div class="container">
        <div class="row">
            <!-- HEADER-LEFT-MENU START -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="header-left-menu">

                </div>
            </div>
            <!-- HEADER-LEFT-MENU END -->
            <!-- HEADER-RIGHT-MENU START -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="header-right-menu">
                    <nav>
                        <ul class="list-inline">
                            <li><a href="/lien-he">Liên Hệ</a></li>
                            <li><a href="{{ route('shop.cart') }}">
                                    Giỏ Hàng
                                    @if(session('cart'))
                                    <span id="total-qty" class="" style="margin: 5px">( {{session('cart')->totalQty }}
                                        )</span>
                                    @else
                                    <span id="total-qty" class="" style="margin: 5px">( 0 )</span>
                                    @endif
                                </a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- HEADER-RIGHT-MENU END -->
        </div>
    </div>
</div>
<!-- HEADER-TOP END -->
<!-- HEADER-MIDDLE START -->
<section class="header-middle">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- LOGO START -->
                <div class="logo">
                    <a href="/"><img src="https://static.autofun.vn/pc/vn/images/1d066151762f40ca8e8b.svg" alt="bstore logo"
                            style="width: 100px;" /></a>
                </div>

                <div class="categorys-product-search">
                    <form action="{{ route('shop.search') }}" method="GET" class="search-form-cat">
                        <div class="search-product form-group">
                            <input value="{{ isset($keyword) ? $keyword : '' }}" style="width: 100%" type="text"
                                class="form-control search-form" name="tu-khoa" placeholder="Nhập từ khóa tìm kiếm" />
                            <button class="search-button" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <!-- CATEGORYS-PRODUCT-SEARCH END -->
            </div>
        </div>
    </div>
</section>
<!-- HEADER-MIDDLE END -->
