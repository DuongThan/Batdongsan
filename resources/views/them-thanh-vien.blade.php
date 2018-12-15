@extends('layouts.master')
@section('title', 'THÊM THÀNH VIÊN')
@section('noidung')
	<div class="container-fluid">
		<div class="row">
			@include('partials.left')
			<div id="giua" class="col-xs-12 col-sm-12 col-md-8 col-lg-8" style="background-color: #EEEEEE;">
				@include('partials.header')
				<div id="giuatrang" class="row">
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<h3 style="background-color:#3366FF; padding:5px; color:#FFFFFF; text-align:center;">THÊM THÀNH VIÊN</h3>
						@if(count($errors) > 0)
                          <div class="alert alert-warning">
                            @foreach($errors->all() as $err)
                              {{ $err }} <br>
                            @endforeach
                          </div>
                        @endif
                        @if(isset($loi))
                          <div class="alert alert-warning">
                              {{ $loi }} <br>
                          </div>
                        @endif    
                        @if(session('thongbao'))
                          <div class="alert alert-success">
                            {{ session('thongbao') }}
                          </div>
                        @endif
						<form action="{{ route('them-thanh-vien') }}" method="post">
							<div class="form-group">
								<label for="kieuthanhvien">Kiểu thành viên <span style="color:#FF0000;">(*)</span>:</label>
								<select class="form-control" id="loaibatdongsan" name="kieu_thanh_vien">
									<option value="">Chọn kiểu thành viên</option>
									<option value="1">Admin</option>
									<option value="2">Khách hàng</option>
								</select>
							</div>
							<div class="form-group">
								<label for="email">Email <span style="color:#FF0000;">(*)</span>:</label>
								<input type="email" class="form-control" id="email" name="email">
							</div>
							<div class="form-group">
								<label for="matkhau">Mật khẩu <span style="color:#FF0000;">(*)</span>:</label>
								<input type="password" class="form-control" id="matkhau" name="mat_khau">
							</div>
							<div class="form-group">
								<label for="nhaplaimatkhau">Nhập lại mật khẩu <span style="color:#FF0000;">(*)</span>:</label>
								<input type="password" class="form-control" id="nhaplaimatkhau" name="nhap_lai_mat_khau">
							</div>
							<div class="form-group">
								<label for="hoten">Họ tên:</label>
								<input type="text" class="form-control" id="hoten" name="ho_ten">
							</div>
							<div class="form-group">
								<label for="sodienthoai">Số điện thoại:</label>
								<input type="text" class="form-control" id="sodienthoai" name="so_dien_thoai">
							</div>
							<div class="form-group">
								<label for="diachi">Địa chỉ:</label>
								<input type="text" class="form-control" id="diachi" name="dia_chi">
							</div>
							{{ csrf_field() }}
							<button type="submit" class="btn btn-primary">Thêm thành viên</button>
						</form>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
				</div>
				<br>
				@include('partials.footer')
			</div>	
			@include('partials.right')
		</div>
	</div>
@endsection