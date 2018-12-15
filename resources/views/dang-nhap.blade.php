@extends('layouts.master')
@section('title', 'ĐĂNG NHẬP')
@section('noidung')
	<div class="container-fluid">
		<div class="row">
			@include('partials.left')
			<div id="giua" class="col-xs-12 col-sm-12 col-md-8 col-lg-8" style="background-color: #EEEEEE;">
				@include('partials.header')
				<div id="giuatrang" class="row">
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<h3 style="background-color:#3366FF; padding:5px; color:#FFFFFF; text-align:center;">ĐĂNG NHẬP THÀNH VIÊN</h3>
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
						<form action="{{ route('dang-nhap') }}" method="post">
							<div class="form-group">
								<label for="email">Email <span style="color:#FF0000;">(*)</span>:</label>
								<input type="email" class="form-control" id="email" name="email">
							</div>
							<div class="form-group">
								<label for="matkhau">Mật khẩu <span style="color:#FF0000;">(*)</span>:</label>
								<input type="password" class="form-control" id="matkhau" name="mat_khau">
							</div>
							{{ csrf_field() }}
							<button type="submit" class="btn btn-primary">Đăng nhập</button>
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