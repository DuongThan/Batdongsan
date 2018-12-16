@extends('layouts.master')
@section('title', 'Slide')
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
						  <h3>Bạn phải đăng nhập mới có thể quản lý slide!</h3>
						</div>
					</div>
					@else
					<div class="col-xs-12">
                         @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
						<h3 style="background-color:#3366FF; padding:5px; color:#FFFFFF; text-align:center;">QUẢN LÝ SLIDE</h3>
						<div>
                            <table class="table table-border">
                                <thead>
                                    <tr>
                                        <th style="width:50px">#</th>
                                        <th>Hình ảnh</th>
                                        <th style="width:150px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($slide as $item)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td class="text-center">
                                            <img style="height: 35px;" src="/img/slide/{{$item->hinh_anh}}" alt="">
                                        </td>
                                        <td class="text-center">
                                            <a href="/sua-slide/{{$item->id}}" class="btn btn-primary btn-sm">Chỉnh
                                                sửa</a>
                                            <button onclick="confirmDelete('{{$item->id}}')" class="btn btn-danger btn-sm">Xóa</button>
                                        </td>
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
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Xác nhận thông tin</h4>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa slide này?</p>
                </div>
                <div class="modal-footer">
                    <a id="linkDelete" type="button" class="btn btn-danger">Xóa</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                </div>
            </div>

        </div>
    </div>
    <script>
        function confirmDelete(id) {
            $("#myModal").modal()
            $("#linkDelete").attr("href", '/xoa-slide/' + id)
        }

    </script>
@endsection