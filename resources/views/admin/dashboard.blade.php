@extends('admin.layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $numOrder }}</h3>

                    <p>Đơn Hàng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="/admin/order" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $numProduct }}</h3>

                    <p>Sản phẩm</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/admin/product" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $numArticle }}</h3>

                    <p>Bài viết</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="/admin/article" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $numUser }}</h3>

                    <p>Người dùng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="/admin/user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
</section>
<!-- /.content -->
<section class="content-header">
    <h1>
        Thống kê sản phẩm
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Bảng</a></li>
        <li class="active">Products</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            @csrf
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Thông tin danh sách sản phẩm</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div width="200" height="100" style="padding-top: 20px;">
                                <input class="form-control from" name="from" type="date">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div width="200" height="100" style="padding-top: 20px;">
                                <input class="form-control to" name="to" type="date">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div width="200" height="100" style="padding-top: 20px;">
                                <a href="" data-url="{{route('admin.dashboard.filterChar')}}" class="btn btn-info" id="loc">Loc</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div id="chart" style="height: 250px;"></div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection
@section('my_javascript')
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="{{asset('backend/js/morris.js')}}"></script>
<script src="{{asset('backend/js/filter.js')}}"></script>
<script>
    $.ajax({
        url: '/admin/dashboard/show-char',
        type: 'GET', // phương truyền tải dữ liệu
        success: function(res) {
            if (res.code == 200) {
                chart.setData(res.main)
            }
        },
        error: function(e) { // lỗi nếu có
            console.log(e);
        }
    });
</script>
@endsection