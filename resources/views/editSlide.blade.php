@extends('layouts.master')
@section('title', 'Sửa Slide')
@section('noidung')
	<div class="container-fluid">
		<div class="row">
			@include('partials.left')
			<div id="giua" class="col-xs-12 col-sm-12 col-md-8 col-lg-8" style="background-color: #EEEEEE;">
				@include('partials.header')
				<div id="giuatrang" class="row">
					@if(!session('id_thanh_vien'))
					<div class="col-xs-12">
						<div class="alert alert-warning">
						  <h3>Bạn phải đăng nhập mới có thể sửa slide!</h3>
						</div>
					</div>
					@else
					<div class="col-xs-12">
						<h3 style="background-color:#3366FF; padding:5px; color:#FFFFFF; text-align:center;">SỬA SLIDE</h3>
						<form action="/cap-nhat-slide/{{$slide->id}}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="form-group">
								<img src="/img/{{$slide->image}}" alt="">
							</div>
							<div class="form-group">
								<label for="anhchinh">Hình ảnh <span style="color:#FF0000;">(*)</span>:</label>
								<input type="file" class="form-control" name="hinhanh">
							</div>
							<button type="submit" class="btn btn-primary">Cập nhật</button>
						</form>
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