@extends('layouts.master')
@section('title', 'TÌM KIẾM')
@section('noidung')
	<div class="container-fluid">
		<div class="row">
			@include('partials.left')
			<div id="giua" class="col-xs-12 col-sm-12 col-md-8 col-lg-8" style="background-color: #EEEEEE;">
				@include('partials.header')
				<div id="giuatrang" class="row">
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
						<h4 style="background-color:#3366FF; padding:5px; color:#FFFFFF;">TÌM KIẾM</h4>
						@foreach($bai_dang_da_duyet as $bddd)
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<h5><a href="{{ route('bai-dang-chi-tiet', ['id' => $bddd->id]) }}" style="color:#880000;"><b>{{ $bddd->tieu_de }}</b></a></h5>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<a href="{{ route('bai-dang-chi-tiet', ['id' => $bddd->id]) }}"><img class="img-responsive" src="{{ URL::to('/img/anh-bai-dang/'.$bddd->anh_chinh) }}" alt="{{ $bddd->tieu_de }}" style="width:100%;"></a>
							</div>
							<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
								<p>{{ $bddd->noi_dung  }}</p>
								<a href="{{ route('bai-dang-chi-tiet', ['id' => $bddd->id]) }}">Xem chi tiết >></a>
							</div>
						</div>
						@endforeach
						<div class="text-center">{!! $bai_dang_da_duyet->links() !!}</div>
					</div>
					@include('partials.tin-ben-phai')
				</div>
				<br>
				@include('partials.footer')
			</div>	
			@include('partials.right')	
		</div>
	</div>
@endsection