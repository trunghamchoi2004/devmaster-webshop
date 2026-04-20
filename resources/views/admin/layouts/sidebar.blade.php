<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{route('admin.dashboard')}}">
                    <i class="fa fa-calendar"></i> <span>Bảng điều khiển</span>
                </a>
            </li>
            <li><a href="{{ route('admin.order.index') }}"><i class="fa fa-cubes"></i> <span>QL Đơn đặt hàng</span></a></li>
            <li><a href="{{ route('admin.category.index') }}"><i class="fa fa-dashboard"></i> <span>QL Danh mục</span></a></li>
            <li><a href="{{ route('admin.product.index') }}"><i class="fa fa-database"></i> <span>QL Sản Phẩm</span></a></li>
            <li><a href="{{ route('admin.article.index') }}"><i class="fa fa-file-text"></i> <span>QL Tin tức</span></a></li>
            <li><a href="{{ route('admin.banner.index') }}"><i class="fa fa-photo"></i> <span>QL Banner</span></a></li>
            <li><a href="{{ route('admin.vendor.index') }}"><i class="fa fa-cube"></i> <span>QL Nhà Cung Cấp</span></a></li>
            <li><a href="{{ route('admin.brand.index') }}"><i class="fa fa-fire"></i> <span>QL Loại</span></a></li>
            <li><a href="{{ route('admin.user.index') }}"><i class="fa fa-user"></i> <span>QL Người dùng</span></a></li>
            <li><a href="{{ route('admin.setting.index') }}"><i class="fa fa-cog"></i> <span>Cấu hình Website</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
