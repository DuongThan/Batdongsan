@extends('layouts.master')
@section('title', 'BÀI ĐĂNG CHI TIẾT')
@section('noidung')
	<div class="container-fluid">
		<div class="row">
			@include('partials.left')
			<div id="giua" class="col-xs-12 col-sm-12 col-md-8 col-lg-8" style="background-color: #EEEEEE;">
				@include('partials.header')
				<div id="giuatrang" class="row">
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
						<h4 style="background-color:#3366FF; padding:5px; color:#FFFFFF;">{{ $bai_dang->tieu_de }}</h4>
						<hr style="border: 1px solid #BBBBBB;">
						<p>{{ $bai_dang->noi_dung }}</p>
						<p>
							<span>Giá: <b style="color: #FF0000;">{{ $bai_dang->gia }}</b></span>
							<span style="margin-left:10px;">Diện tích: <b style="color: #FF0000;">{{ $bai_dang->dien_tich }}m<sup>2</sup></b></span>
						</p>
						<p>Loại tin: <b>{{ $bai_dang->loai_tin }}</b></p>
						<p>Loại bất động sản: <b>{{ $bai_dang->loai_bat_dong_san }}</b></p>
						<p>Tỉnh thành: <b>{{ $bai_dang->tinh_thanh }}</b></p>
						@if($bai_dang->dia_chi != '')
						<p>Địa chỉ: <b>{{ $bai_dang->dia_chi }}</b></p>
						@endif
						<p>
							<span>Liên hệ: <b style="color: #FF0000;">{{ $bai_dang->ten_lien_he }}</b></span>
							<span style="margin-left:10px;">Số điện thoại: <b style="color: #FF0000;">{{ $bai_dang->so_dien_thoai }}</b></span>
						</p>
						<b>Hình ảnh:</b>
						<img class="img-responsive" src="{{ URL::to('/img/anh-bai-dang/'.$bai_dang->anh_chinh) }}" alt="{{ $bai_dang->tieu_de }}" style="width:100%;">
						@if($bai_dang->anh_phu_1 != '')
						<img class="img-responsive" src="{{ URL::to('/img/anh-bai-dang/'.$bai_dang->anh_phu_1) }}" alt="{{ $bai_dang->tieu_de }}" style="width:100%;">
						@endif
						@if($bai_dang->anh_phu_2 != '')
						<img class="img-responsive" src="{{ URL::to('/img/anh-bai-dang/'.$bai_dang->anh_phu_2) }}" alt="{{ $bai_dang->tieu_de }}" style="width:100%;">
						@endif
						@if($bai_dang->anh_phu_3 != '')
						<img class="img-responsive" src="{{ URL::to('/img/anh-bai-dang/'.$bai_dang->anh_phu_3) }}" alt="{{ $bai_dang->tieu_de }}" style="width:100%;">
						@endif
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