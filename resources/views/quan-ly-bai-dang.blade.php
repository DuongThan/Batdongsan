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
						<table class="table table-bordered">
						    <thead>
						      <tr>
						      	<th>Trạng thái</th>
						        <th>Tiêu đề</th>
						        <th>Loại tin</th>
						        <th>Tỉnh thành</th>
						        <th>Ảnh</th>
						        <th>Xem</th>
						        <th>Sửa</th>
						        <th>Xóa</th>
						      </tr>
						    </thead>
						    <tbody>
						      @foreach($bai_dang as $bd)		
						      <tr>
						      	<td>@if($bd->trang_thai == 2) Chưa duyệt @else Đã duyệt @endif</td>
						        <td>{{$bd->tieu_de}}</td>
						        <td>{{$bd->loai_tin}}</td>
						        <td>{{$bd->tinh_thanh}}</td>
						        <td><img class="img-responsive" src="{{ URL::to('/img/anh-bai-dang/'.$bd->anh_chinh) }}" alt="{{ $bd->tieu_de }}" style="width:100%;"></td>
						        <td><a href="{{ route('quan-ly-bai-dang-chi-tiet', ['id' => $bd->id]) }}">Xem</a></td>
						        <td><a href="{{ route('sua-bai-dang-chi-tiet', ['id' => $bd->id]) }}">Sửa</a></td>
						        <td><a href="{{ route('xoa-bai-dang-chi-tiet', ['id' => $bd->id]) }}">Xóa</a></td>
						      </tr>
						      @endforeach
						    </tbody>
					  	</table>
					  <div class="text-center">{!! $bai_dang->links() !!}</div>
					</div>
				</div>
				<br>
				@include('partials.footer')
			</div>	
			@include('partials.right')
		</div>
	</div>
@endsection