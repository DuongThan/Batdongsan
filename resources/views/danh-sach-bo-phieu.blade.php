@extends('layouts.master')
@section('title', 'Danh sách bỏ phiếu')
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
						  <h3>Bạn phải đăng nhập mới có thể quản lý danh sách bỏ phiếu!</h3>
						</div>
					</div>
					@else
					<div class="col-xs-12">
                         @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
						<h3 style="background-color:#3366FF; padding:5px; color:#FFFFFF; text-align:center;">DANH SÁCH BỎ PHIẾU</h3>
						<div>
                            <table class="table table-border">
                                <thead>
                                    <tr>
                                        <th style="width:50px">#</th>
                                        <th>Họ và tên</th>
                                        <th>Nguồn</th>
                                        <th>Ngày bỏ phiếu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bophieus as $item)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td>{{$item->ho_ten}}</td>
                                        <td>{{$item->hinh_thuc}}</td>
                                        <td>{{$item->date}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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