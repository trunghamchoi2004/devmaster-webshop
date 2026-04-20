<header class="main-menu-area">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding-right menuarea">
                <div class="mainmenu">
                    <nav>
                        <ul class="list-inline mega-menu">
                            <li><a href="/">Trang Chủ</a></li>
                            @if(!empty($categories))
                                @foreach($categories as $category)
                                    @if($category->parent_id == 0)
                                        <li>
                                            <a href="{{ route('shop.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                                            <!-- DRODOWN-MEGA-MENU START -->

                                            <div class="drodown-mega-menu">
                                                <div class="left-mega col-xs-6">

                                                    <div class="mega-menu-list">
                                                         @foreach($categories as $key => $child)
                                                            @if($child->parent_id == $category->id  && ($key%2) == 1)
                                                                <a class="mega-menu-title" href="{{ route('shop.category', ['slug' => $child->slug]) }}">
                                                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ $child->name }}</a>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="right-mega col-xs-6">
                                                    <div class="mega-menu-list">
                                                        @foreach($categories as $key => $child)
                                                            @if($category->id == $child->parent_id && ($key%2) == 0)
                                                                <a class="mega-menu-title" href="{{ route('shop.category', ['slug' => $child->slug]) }}">
                                                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ $child->name }}</a>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                    @endif
                                @endforeach
                            @endif
                            <li><a href="/khuyen-mai">Khuyến mại</a></li>
                            <li><a href="{{route('shop.article')}}">Tin tức</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- MAINMENU END -->
        </div>
        <div class="row">
            <!-- MOBILE MENU START -->
            <div class="col-sm-12 mobile-menu-area">
                <div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
                    <span class="mobile-menu-title">MENU</span>
                    <nav>
                        <ul>
                            <li><a href="index.html">Home</a>
                                <ul>
                                    <li><a href="index.html">Home variation 1</a></li>
                                    <li><a href="index-2.html">Home variation 2</a></li>
                                </ul>
                            </li>
                            <li><a href="shop-gird.html">Women</a>
                                <ul>
                                    <li><a href="shop-gird.html">Tops</a>
                                        <ul>
                                            <li><a href="shop-gird.html">T-Shirts</a></li>
                                            <li><a href="shop-gird.html">Blouses</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop-gird.html">Dresses</a>
                                        <ul>
                                            <li><a href="shop-gird.html">Casual Dresses</a></li>
                                            <li><a href="shop-gird.html">Summer Dresses</a></li>
                                            <li><a href="shop-gird.html">Evening Dresses</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            <li><a href="shop-gird.html">men</a>
                                <ul>
                                    <li><a href="shop-gird.html">Tops</a>
                                        <ul>
                                            <li><a href="shop-gird.html">Sports</a></li>
                                            <li><a href="shop-gird.html">Day</a></li>
                                            <li><a href="shop-gird.html">Evening</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop-gird.html">Blouses</a>
                                        <ul>
                                            <li><a href="shop-gird.html">Handbag</a></li>
                                            <li><a href="shop-gird.html">Headphone</a></li>
                                            <li><a href="shop-gird.html">Houseware</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop-gird.html">Accessories</a>
                                        <ul>
                                            <li><a href="shop-gird.html">Houseware</a></li>
                                            <li><a href="shop-gird.html">Home</a></li>
                                            <li><a href="shop-gird.html">Health & Beauty</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="shop-gird.html">clothing</a></li>
                            <li><a href="shop-gird.html">tops</a></li>
                            <li><a href="shop-gird.html">T-shirts</a></li>
                            <li><a href="#">Delivery</a></li>
                            <li><a href="about-us.html">About us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- MOBILE MENU END -->
        </div>
    </div>
</header>
