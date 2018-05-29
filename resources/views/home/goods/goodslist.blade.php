@extends('layout.home')

@section('title',$title)

@section('content')

	<!-- start banner_y -->
	<!-- end banner -->

	<!-- start danpin -->
		<div class="danpin center">
			@if(!empty($data))
			<div class="biaoti center">{{$data->cname}}</div>
			@else
			<div class="biaoti center">搜索结果</div>
			@endif

			<div class="main center">
				
				<?php $i=0;?>
				@foreach($res as $k=>$v)
				<div class="mingxing fl mb20" style="border:2px solid #fff;width:230px;cursor:pointer;" onmouseout="this.style.border='2px solid #fff'" onmousemove="this.style.border='2px solid red'">
					<div class="sub_mingxing"><a href="/goodsdetails/{{$v->gid}}" target="_blank"><img src="{{$v->img}}" alt=""></a></div>
					<div class="pinpai"><a href="" target="_blank">{{$v->gname}}</a></div>
					<div class="youhui">{{$v->gdesc}}</div>
					<div class="jiage">{{$v->gprice}}元</div>
				</div>
				<?php $i++;?>

				@if($i==5)
					
					</div>
					<div class="main center mb20">
				@endif
				@endforeach

				<div class="clear"></div>

			</div>	

			<div class="clear"></div>
		</div>
		<div style="text-align: center;">{{$res->links()}}</div>
		

@endsection

@section('js')

@show