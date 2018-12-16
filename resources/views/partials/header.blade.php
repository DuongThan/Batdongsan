<div id="dautrang" class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('trang-chu') }}">
                    <img class="img-responsive" src="{{ URL::to('/img/logo.png') }}" alt="Logo">
                </a>
            </div>
            <div class="col-md-9">
                <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top: 10px;">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        @foreach(Session::get('slide') as $item)
                        <div class="item {{$loop->iteration == 1?'active':''}}">
                            <img src="/img/slide/{{$item->hinh_anh}}" style="width:100%;">
                        </div>
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>


    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:20px; text-align:right">
        <i class="fa fa-pencil" style="font-size:16px;"></i> <a href="{{ route('dang-tin') }}" style="margin-right:15px;">Đăng
            tin nhà đất</a>
        @if(!session('id_thanh_vien'))
        <i class="fa fa-user-plus" style="font-size:16px;"></i> <a href="{{ route('dang-ky') }}" style="margin-right:15px;">Đăng
            ký thành viên</a>
        <i class="fa fa-user" style="font-size:16px;"></i> <a href="{{ route('dang-nhap') }}">Đăng nhập</a>
        @else
        <i class="fa fa-outdent"></i> <a href="{{ route('dang-xuat') }}">Đăng xuất</a>
        @endif
        @if(session('kieu_thanh_vien') == 1)
        <br>
        <i class="fa fa-book"></i> <a href="{{ route('quan-ly-bai-dang') }}" style="margin-right:15px;">Quản lý bài
            đăng</a>
        <i class="fa fa-users"></i> <a href="{{ route('quan-ly-thanh-vien') }}" style="margin-right:15px;"> Quản lý thành viên </a>
        <i class="fa fa-video-camera"></i> <a href="{{ route('slide') }}" style="margin-right:15px;"> Quản lý slide </a>
        <i class="fa fa-phone"></i> <a href="{{ route('lien-he') }}" style="margin-right:15px;"> Quản lý liên hệ </a>
        <i class="fa fa-file"></i> <a href="{{ route('danh-sach-bo-phieu') }}"> Quản lý bỏ phiếu </a>
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
