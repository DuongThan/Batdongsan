@extends('layouts.master')
@section('title', 'SỬA BÀI ĐĂNG CHI TIẾT')
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
						  <h3>Bạn phải đăng nhập mới có thể đăng tin!</h3>
						</div>
					</div>
					@else
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<h3 style="background-color:#3366FF; padding:5px; color:#FFFFFF; text-align:center;">SỬA BÀI ĐĂNG CHI TIẾT</h3>
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
						<form action="{{ route('sua-bai-dang-chi-tiet', ['id' => $bai_dang->id]) }}" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="tieude">Tiêu đề <span style="color:#FF0000;">(*)</span>:</label>
								<input type="text" class="form-control" id="tieude" placeholder="Tiêu đề" name="tieu_de" value="{{ $bai_dang->tieu_de }}">
							</div>
							<div class="form-group">
								<label for="noidung">Nội dung <span style="color:#FF0000;">(*)</span>:</label>
								<textarea class="form-control" rows="5" id="noidung" placeholder="Nội dung" name="noi_dung">{{ $bai_dang->noi_dung }}</textarea>
							</div>
							<div class="form-group">
								<label for="loaitin">Loại tin <span style="color:#FF0000;">(*)</span>:</label>
								<select class="form-control" id="loaitin" name="loai_tin">
									<option value="">Chọn loại tin</option>
									<option value="Cần bán" <?php if($bai_dang->loai_tin == 'Cần bán') echo 'selected'; ?>>Cần bán</option>
									<option value="Cần mua" <?php if($bai_dang->loai_tin == 'Cần mua') echo 'selected';?>>Cần mua</option>
									<option value="Cho Thuê" <?php if($bai_dang->loai_tin == 'Cho Thuê') echo 'selected'; ?>>Cho thuê</option>
									<option value="Cần thuê" <?php if($bai_dang->loai_tin == 'Cần thuê') echo 'selected';?>>Cần thuê</option>
								</select>
							</div>
							<div class="form-group">
								<label for="loaibatdongsan">Loại bất động sản <span style="color:#FF0000;">(*)</span>:</label>
								<select class="form-control" id="loaibatdongsan" name="loai_bat_dong_san">
									<option value="">Chọn loại bất động sản</option>
									<option value="Nhà">Nhà</option>
									<option value="Biệt thự">Biệt thự</option>
									<option value="Mặt bằng">Mặt bằng</option>
								</select>
							</div>
							<div class="form-group">
								<label for="tinhthanh">Tỉnh thành <span style="color:#FF0000;">(*)</span>:</label>
								<input type="text" class="form-control" id="tinhthanh" placeholder="Tỉnh thành" name="tinh_thanh" value="{{ $bai_dang->tinh_thanh }}">
							</div>
							<div class="form-group">
								<label for="gia">Giá <span style="color:#FF0000;">(*)</span>:</label>
								<input type="text" class="form-control" id="gia" placeholder="Giá" name="gia" value="{{ $bai_dang->gia }}">
							</div>
							<div class="form-group">
								<label for="dientich">Diện tích <span style="color:#FF0000;">(*)</span>:</label>
								<input type="text" class="form-control" id="dientich" placeholder="Diện tích" name="dien_tich" value="{{ $bai_dang->dien_tich }}">
							</div>
							<div class="form-group">
								<label for="huong">Hướng:</label>
								<input type="text" class="form-control" id="hương" placeholder="Hướng" name="huong" value="{{ $bai_dang->huong }}">
							</div>
							<div class="form-group">
								<label for="tenlienhe">Tên liên hệ <span style="color:#FF0000;">(*)</span>:</label>
								<input type="text" class="form-control" id="tenlienhe" placeholder="Tên liên hệ" name="ten_lien_he" value="{{ $bai_dang->ten_lien_he }}">
							</div>
							<div class="form-group">
								<label for="sodienthoai">Số điện thoại <span style="color:#FF0000;">(*)</span>:</label>
								<input type="text" class="form-control" id="sodienthoai" placeholder="Số điện thoại" name="so_dien_thoai" value="{{ $bai_dang->so_dien_thoai }}">
							</div>
							<div class="form-group">
								<label for="diachi">Địa chỉ:</label>
								<input type="text" class="form-control" id="diachi" placeholder="Địa chỉ" name="dia_chi" value="{{ $bai_dang->dia_chi }}">
							</div>
							<div class="form-group">
								<label for="anhchinh">Ảnh chính <span style="color:#FF0000;">(*)</span>:</label>
								<input type="file" class="form-control" id="anhchinh" name="anh_chinh">
							</div>
							<div class="form-group">
								<label for="anhphu1">Ảnh phụ 1:</label>
								<input type="file" class="form-control" id="anhphu1" name="anh_phu_1">
							</div>
							<div class="form-group">
								<label for="anhphu1">Ảnh phụ 2:</label>
								<input type="file" class="form-control" id="anhphu2" name="anh_phu_2" >
							</div>
							<div class="form-group">
								<label for="anhphu1">Ảnh phụ 3:</label>
								<input type="file" class="form-control" id="anhphu3" name="anh_phu_3">
							</div>
							{{ csrf_field() }}
							<button type="submit" class="btn btn-primary">Sửa tin</button>
						</form>
					</div>
					@endif
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
				</div>
				<br>
				@include('partials.footer')
			</div>	
			@include('partials.right')
		</div>
	</div>
@endsection