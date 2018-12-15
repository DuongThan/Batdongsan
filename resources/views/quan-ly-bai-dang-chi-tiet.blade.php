@extends('layouts.master')
@section('title', 'QUẢN LÝ BÀI ĐĂNG')
@section('noidung')
	<div class="container-fluid">
		<div class="row">
			@include('partials.left')
			<div id="giua" class="col-xs-12 col-sm-12 col-md-8 col-lg-8" style="background-color: #EEEEEE;">
				@include('partials.header')
				<div id="giuatrang" class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h3 style="background-color:#3366FF; padding:5px; color:#FFFFFF; text-align:center;">QUẢN LÝ BÀI ĐĂNG</h3>
						@if(count($errors) > 0)
                          <div class="alert alert-warning">
                            @foreach($errors->all() as $err)
                              {{ $err }} <br>
                            @endforeach
                          </div>
                        @endif  
                        @if(session('thongbao'))
                          <div class="alert alert-success">
                            {{ session('thongbao') }}
                          </div>
                        @endif
                        <img class="img-responsive" src="{{ URL::to('/img/anh-bai-dang/'.$bai_dang->anh_chinh) }}" alt="{{ $bai_dang->tieu_de }}" style="width:100%;"><hr>
						<p><b>Trạng thái:</b> @if($bai_dang->trang_thai == 2) Chưa duyệt  @else Đã duyệt @endif</p>
						<p><b>Tiêu đề:</b> {{ $bai_dang->tieu_de }}</p>
						<p><b>Nội dung:</b> {{ $bai_dang->noi_dung }}</p>
						<p><b>Loại tin:</b> {{ $bai_dang->loai_tin }}</p>
						<p><b>Loại bất động sản:</b> {{ $bai_dang->loai_bat_dong_san }}</p>
						<p><b>Tỉnh thành:</b> {{ $bai_dang->tinh_thanh }}</p>
						<p><b>Giá:</b> {{ $bai_dang->gia }}</p>
						<p><b>Diện tích:</b> {{ $bai_dang->dien_tich }}</p>
						<p><b>Hướng:</b> {{ $bai_dang->huong }}</p>
						<p><b>Tên liên hệ:</b> {{ $bai_dang->ten_lien_he }}</p>
						<p><b>Số điện thoại:</b> {{ $bai_dang->so_dien_thoai }}</p>
						<p><b>Địa chỉ:</b> {{ $bai_dang->dia_chi }}</p>
						@if($bai_dang->trang_thai == 2)
						<a href="{{ route('duyet-bai-dang-chi-tiet', ['id' => $bai_dang->id]) }}" class="btn btn-primary">Duyệt bài đăng</a>
						@endif
					</div>
				</div>
				<br>
				@include('partials.footer')
			</div>	
			@include('partials.right')
		</div>
	</div>
@endsection