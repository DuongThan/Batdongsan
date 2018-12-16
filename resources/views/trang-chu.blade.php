@extends('layouts.master')
@section('title', 'TRANG CHỦ')
@section('noidung')
<style>
    .box-bophieu{
		padding: 10px;
		border: 1px dotted;
		background: #ffeab1bd;
		border-radius: 10px;
		height: 300px;
	}
	.box-search{
		padding: 10px;
		border: 1px dotted;
		background: #d9d9d9bf;
		border-radius: 10px;
		height: 300px;
	}
	.header-title{
		text-align: center;
		font-weight: bold;
		font-size: 16px;
		margin-bottom: 20px;
	}
</style>
<div class="container-fluid">
    <div class="row">
        @include('partials.left')
        <div id="giua" class="col-xs-12 col-sm-12 col-md-8 col-lg-8" style="background-color: #EEEEEE;">
            @include('partials.header')
            <div id="giuatrang" class="row">
                <div class="col-md-12">
                    @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <form class="form-horizontal" method="post" action="">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="box-search">
                                    <h5 class="header-title">Tìm kiếm theo các tiêu chí sau</h5>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Loại tin:</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="loaitin" name="loai_tin">
                                                <option value="">Chọn loại tin</option>
                                                <option value="Cần bán">Cần bán</option>
                                                <option value="Cần mua">Cần mua</option>
                                                <option value="Cho Thuê">Cho thuê</option>
                                                <option value="Cần thuê">Cần thuê</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Tỉnh thành:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Diện tích:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Mức giá:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary btn-sm">Tìm kiếm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form method="post" action="/bo-phieu">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="box-bophieu">
                                    <h5 class="header-title">Bạn biết đến website qua hình thức nào?</h5>
                                    @foreach($bophieu as $item)
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <input value="{{$item->id}}" {{$loop->iteration==1? 'checked':''}} id="{{$item->id}}"
                                                name="bophieu" type="radio">
                                            <span>{{$item->hinh_thuc}}</span>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar"
                                                    aria-valuenow="{{$item->tyle}}" aria-valuemin="0" aria-valuemax="100"
                                                    style="width:{{$item->tyle}}%">
                                                    {{$item->so_luong}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <button class="btn btn-primary btn-sm">Đánh giá</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <h4 style="background-color:#3366FF; padding:5px; color:#FFFFFF;">THÔNG TIN MUA BÁN & CHO THUÊ BẤT
                        ĐỘNG SẢN</h4>
                    @foreach($bai_dang_da_duyet as $bddd)
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h5><a href="{{ route('bai-dang-chi-tiet', ['id' => $bddd->id]) }}" style="color:#880000;"><b>{{
                                        $bddd->tieu_de }}</b></a></h5>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <a href="{{ route('bai-dang-chi-tiet', ['id' => $bddd->id]) }}"><img class="img-responsive"
                                    src="{{ URL::to('/img/anh-bai-dang/'.$bddd->anh_chinh) }}" alt="{{ $bddd->tieu_de }}"
                                    style="width:100%;"></a>
                        </div>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <p>
                                @if(strlen($bddd->noi_dung) > 300)
                                {{ mb_substr($bddd->noi_dung, 0, 300) }} ...
                                @else
                                {{ $bddd->noi_dung }}
                                @endif
                            </p>
                            <a href="{{ route('bai-dang-chi-tiet', ['id' => $bddd->id]) }}">Xem chi tiết >></a>
                        </div>
                    </div>
                    @endforeach
                    <div class="text-center">{!! $bai_dang_da_duyet->links() !!}</div>
                </div>
                @include('partials.tin-ben-phai')
            </div>
            <br>
            @include('partials.footer')
        </div>
        @include('partials.right')
    </div>
</div>
@endsection
