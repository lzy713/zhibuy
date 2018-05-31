@extends('layout.home')

@section('title',$title)

@section('content')



	
	<!-- xiangqing -->
	<form action="post" method="">
	<div class="xiangqing">
		<div class="neirong w">
			<div class="xiaomi6 fl">{{$res->gname}}</div>
			<nav class="fr">
				<li><a href="">概述</a></li>
				<li>|</li>
				<li><a href="/comments/{{$res->gid}}">用户评价</a></li>
				<div class="clear"></div>
			</nav>
			<div class="clear"></div>
		</div>	
	</div>
	
	<div class="jieshao mt20 w" style="height: 620px;">
		<div class="left fl"><img src="{{$res->img}}"></div>
		<div class="right fr">
			<div class="h3 ml20 mt20 xiadan">{{$res->gname}} 
				<input class="jrgwc shoucang" type="button" gid="{{$res->gid}}" style="float: right; margin-right: 15px;width: 100px;height: 35px"
				@if($flag) value="取消收藏" @else value="收藏" @endif>
			</div>
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
					<input class="jrgwc addCart" type="button" id="{{$res->gid}}" name="jrgwc" value="加入购物车" />
				
			</div>
		</div>

		<div class="clear"></div>
	</div>
	</form>

	<div style=" width:1226px;margin: 0px auto; overflow: hidden;">
		<h3>商品详情</h3><hr>
		<center>{!!$res->content!!}</center>
	</div>


@endsection

@section('js')

<script>
	$('.addCart').click(function(){
		var gid = $(this).attr('id');

		$.get('/addCart/'+gid, {}, function(data){
			if (data) {
				location.href='/successCart';
			}
		});
	});

	$('.shoucang').click(function(){
		var gid = $(this).attr('gid');
		var btn = $(this);
		var val = $(this).val();
		if (val == '取消收藏') {
			$.get('/delshoucang/'+gid, {'_method':'DELETE'}, function(data){
				if (data) {
					btn.val('收藏');
				}
			});
		} else {
			$.get('/shoucang/'+gid, {}, function(data){
				if( typeof(data) == 'string'){
                    location.href = '/login';
                } else {
                	btn.val('取消收藏');
                }

			});
		}

		
	});
</script>

@show