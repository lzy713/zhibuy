@extends('layout.home')

@section('title',$title)

@section('content')



	
	<!-- xiangqing -->
	<form action="post" method="">
	<div class="xiangqing">
		<div class="neirong w">
			<div class="xiaomi6 fl">小米6</div>
			<nav class="fr">
				<li><a href="">概述</a></li>
				<li>|</li>
				<li><a href="">变焦双摄</a></li>
				<li>|</li>
				<li><a href="">设计</a></li>
				<li>|</li>
				<li><a href="">参数</a></li>
				<li>|</li>
				<li><a href="">F码通道</a></li>
				<li>|</li>
				<li><a href="">用户评价</a></li>
				<div class="clear"></div>
			</nav>
			<div class="clear"></div>
		</div>	
	</div>
	
	<div class="jieshao mt20 w">
		<div class="left fl"><img src="{{$res->img}}"></div>
		<div class="right fr">
			<div class="h3 ml20 mt20">{{$res->gname}}</div>
			<div class="jianjie mr40 ml20 mt10">{{$res->gdesc}}</div>
			<div class="jiage ml20 mt10">库存：{{$res->gstock}}</div>
			<div class="ft20 ml20 mt20">选择版本</div>
			<div class="xzbb ml20 mt10">
				<div class="banben">
					<a>
						<span>&nbsp;&nbsp;</span>
						<span>{{$res->banben}} </span>
						<span>{{$res->gprice}}</span>
					</a>
					
				</div>
			</div>
			<div class="ft20 ml20 mt20">选择颜色</div>

			<div class="xzbb ml20 mt10">
				<div class="banben fl">
					<a>
						<span class="yuandian"></span>
						<span class="yanse">{{$res->yanse}}</span>
					</a>
				</div>
				
				<div class="clear"></div>
			</div>
			

			<div class="xqxq mt20 ml20">
				<div class="top1 mt10">
					<div class="left1 fl"><i>全场商品无条件支持7天无理由退换，可放心购买。</i></div>
					<div class="clear"></div>
				</div>
				<div class="bot mt20 ft20 ftbc">总计：{{$res->gprice}}元</div>
			</div>
			<div class="xiadan ml20 mt20">
					<input class="jrgwc"  type="button" name="jrgwc" value="立即选购" />
					<input class="jrgwc" type="button" name="jrgwc" value="加入购物车" />
				
			</div>
		</div>
		<div class="clear"></div>
	</div>
	</form>
@endsection

@section('js')

@show