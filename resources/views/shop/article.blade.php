@extends('shop.layouts.main')

@section('content')
<style>
    .new-title {
        font-weight: bold;
        font-size: 20px;
    }
</style>
<section class="main-content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- BSTORE-BREADCRUMB START -->
                <div class="bstore-breadcrumb">
                    <a href="/">Trang chủ<span><i class="fa fa-caret-right"></i> </span> </a>
                    <span> <i class="fa fa-caret-right"> </i> </span>
                    <a href="/tin-tuc">Tin tức</a>
                </div>
                <!-- BSTORE-BREADCRUMB END -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="new-title">{{ $article->title }}</h2>
                <h5 style="margin: 15px 0px">{{ $article->created_at }}</h5>
                {!! $article->description !!}
                <br>
                <a href="{{route('trangchu')}}" class="btn btn-flat btn-info">
                    <i class="fa fa-home"></i> Về trang chủ
                </a>
            </div>
        </div>
    </div>
</section>
@endsection