				<div id="dautrang" class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<a href="{{ route('trang-chu') }}"><img class="img-responsive" src="{{ URL::to('/img/logo.png') }}" alt="Logo"></a><br>
						<form class="search" action="{{ route('tim-kiem') }}" style="margin:auto; max-width:350px;">
							<input type="text" placeholder="Bạn tìm gì..." name="tu_khoa" style="width:300px;" required>
							<button type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:20px; text-align:right">
						<i class="fa fa-pencil" style="font-size:16px;"></i> <a href="{{ route('dang-tin') }}" style="margin-right:15px;">Đăng tin nhà đất</a>
						@if(!session('id_thanh_vien'))
						<i class="fa fa-user-plus" style="font-size:16px;"></i> <a href="{{ route('dang-ky') }}" style="margin-right:15px;">Đăng ký thành viên</a>
						<i class="fa fa-user" style="font-size:16px;"></i> <a href="{{ route('dang-nhap') }}">Đăng nhập</a>
						@else
						<i class="fa fa-outdent"></i> <a href="{{ route('dang-xuat') }}">Đăng xuất</a>
						@endif
						@if(session('kieu_thanh_vien') == 1)
						<br>
						<i class="fa fa-book"></i> <a href="{{ route('quan-ly-bai-dang') }}" style="margin-right:15px;">Quản lý bài đăng</a>
						<i class="fa fa-users"></i> <a href="{{ route('quan-ly-thanh-vien') }}">Quản lý thành viên</a>
						@endif
					</div>
					<div id="menu" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<nav class="navbar navbar-default">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>                        
								</button>
							</div>
							<div class="collapse navbar-collapse" id="myNavbar">
								<ul class="nav navbar-nav">
								<li><a id="action" href="{{ route('trang-chu') }}"><b>TRANG CHỦ</b></a></li>
								<li><a href="{{ route('nha-dat-ban') }}"><b>NHÀ ĐẤT BÁN</b></a></li>
								<li><a href="{{ route('nha-dat-cho-thue') }}"><b>NHÀ ĐẤT CHO THUÊ</b></a></li>
								<li><a href="/lien-he"><b>THÔNG TIN LIÊN HỆ - GÓP Ý</b></a></li>
								<li><a href="#"><b>LIÊN KẾT</b></a></li>
								</ul>
							</div>
						</nav>
					</div>
				</div>