@extends('layouts.master')
@section('title', 'QUẢN LÝ THÀNH VIÊN')
@section('noidung')
	<div class="container-fluid">
		<div class="row">
			@include('partials.left')
			<div id="giua" class="col-xs-12 col-sm-12 col-md-8 col-lg-8" style="background-color: #EEEEEE;">
				@include('partials.header')
				<div id="giuatrang" class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h3 style="background-color:#3366FF; padding:5px; color:#FFFFFF; text-align:center;">QUẢN LÝ THÀNH VIÊN</h3>
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
						<table class="table table-bordered">
						    <thead>
						      <tr>
						      	<th>Kiểu thành viên</th>
						        <th>Email</th>
						        <th>Họ tên</th>
						        <th>Số điện thoại</th>
						        <th>Địa chỉ</th>
						        <th>Xóa</th>
						      </tr>
						    </thead>
						    <tbody>
						      @foreach($thanh_vien as $tv)		
						      <tr>
						      	<td>@if($tv->kieu_thanh_vien == 2) Khách hàng @else Admin @endif</td>
						        <td>{{$tv->email}}</td>
						        <td>{{$tv->ho_ten}}</td>
						        <td>{{$tv->so_dien_thoai}}</td>
						        <td>{{$tv->dia_chi}}</td>
						        <td><a href="{{ route('xoa-thanh-vien-chi-tiet', ['id' => $tv->id]) }}">Xóa</a></td>
						      </tr>
						      @endforeach
						    </tbody>
					  	</table>
					  	<div class="text-center"><a href="{{ route('them-thanh-vien') }}" class="btn-primary" style="padding: 5px;">Thêm thành viên</a></div>
					  <div class="text-center">{!! $thanh_vien->links() !!}</div>
					</div>
				</div>
				<br>
				@include('partials.footer')
			</div>	
			@include('partials.right')
		</div>
	</div>
@endsection