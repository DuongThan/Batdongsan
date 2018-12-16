@extends('layouts.master')
@section('title', 'Chi tiết liên hệ')
@section('noidung')
<div class="container-fluid">
    <div class="row">
        @include('partials.left')
        <div id="giua" class="col-xs-12 col-sm-12 col-md-8 col-lg-8" style="background-color: #EEEEEE;">
            @include('partials.header')
            <div id="giuatrang" class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
                @if(!session('id_thanh_vien'))
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="alert alert-warning">
                        <h3>Bạn phải đăng nhập mới có thể xem liên hệ!</h3>
                    </div>
                </div>
                @else
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <span class="hotel-search-label">Họ và tên:</span>
                                <input readonly value="{{$lienhe->ho_ten}}" type="text" name="ho_ten" class="form-control">
                            </div>
                            <div class="form-group">
                                <span class="hotel-search-label">Email:</span>
                                <input readonly value="{{$lienhe->email}}" type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <span class="hotel-search-label">Số điện thoại:</span>
                                <input readonly value="{{$lienhe->so_dien_thoai}}" type="text" name="so_dien_thoai"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <span class="hotel-search-label">Yêu cầu thêm:</span>
                                <textarea readonly name="yeu_cau" rows="5" class="form-control">{{$lienhe->yeu_cau}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <a href="/danh-sach-lien-he" class="btn btn-primary"">Trở về</a>
                            </div>
                    </div>
                </div>
                @endif
            </div>
            <br>
            @include('partials.footer')
        </div>
        @include('partials.right')
    </div>
</div>
@endsection
