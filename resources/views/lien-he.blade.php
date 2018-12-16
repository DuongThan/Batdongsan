@extends('layouts.master')
@section('title', 'Liên hệ')
@section('noidung')
<div class="container-fluid">
    <div class="row">
        @include('partials.left')
        <div id="giua" class="col-xs-12 col-sm-12 col-md-8 col-lg-8" style="background-color: #EEEEEE;">
            @include('partials.header')
            <div id="giuatrang" class="row">
                <div class="col-xs-12">
                    <h4 style="background-color:#3366FF; padding:5px; color:#FFFFFF;">Thông tin liên hệ</h4>
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{$err}} <br>
                        @endforeach
                    </div>
                    @endif
                    @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                    @endif
                    <div class="row">
                        <form method="post" action="/them-lien-he">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="hotel-search-label">Họ và tên:</span>
                                    <input require value="" type="text" name="ho_ten" class="form-control">
                                </div>
                                <div class="form-group">
                                    <span class="hotel-search-label">Email:</span>
                                    <input require value="" type="text" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <span class="hotel-search-label">Số điện thoại:</span>
                                    <input require value="" type="text" name="so_dien_thoai" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="hotel-search-label">Yêu cầu thêm:</span>
                                    <textarea name="yeu_cau" value=" " rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary" type="submit">Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            @include('partials.footer')
        </div>
        @include('partials.right')
    </div>
</div>
@endsection
