@extends('layout.home')
@section('title',$title)
<link rel="stylesheet" type="text/css" href="/home/order/main.min.css">
<link rel="stylesheet" type="text/css" href="/home/order/base.min.css">
<style>
	.layui-laypage .layui-laypage-curr .layui-laypage-em {
	    background-color: #ff6700 !important;
	}
	.left div{
		float: left;
		margin-right: 10px;
	}
	.shanchu{
		cursor: pointer;
	}
</style>
<!-- self_info -->
@section('content')
<div class="grzxbj">
		<div class="selfinfo center">
				 @include('layout.user')
<div class="rtcont fr">
	<div class="page-main user-main">
	    <div class="container">
	        <div class="row">
	            <div class="span16">
				    <div class="uc-box uc-main-box">
				        <div class="uc-content-box">
				            <div class="box-hd">
				                <h1 class="title">喜欢的商品</h1>
				                <div class="more clearfix hide">
				                    <ul class="filter-list J_addrType">
				                        <li class="first active">
				                        	<a href="" onclick="">喜欢的商品</a>
				                        </li>
				                        <li>
				                        	<a href="" onclick="">已下架的商品</a>
				                        </li>
				                    </ul>
				                </div>
				            </div>
				            <div class="box-bd">

								<p class="empty"><!-- 您暂未收藏任何商品。 --></p>
				            	<div class="xm-pagenavi">
									<ul class="left">
					            		@foreach($res as $k=>$v)
					            		<div class="shopbox" style="width: 159px;height: 270px;border: 1px solid white;background: #e2e2e2" >
					            			<div class="shanchu" style="background-color:#ff6700; width: 100%;display:none" id="{{$v->id}}">删除</div>
					            			<div>
					            				<a href="/goodsdetails/{{$v->gid}}"><img src="{{$v->goods->img}}" width="159"></a>
					            			</div>
					            			<div style="margin-top: 5px;margin-left:18px;">
					            				
					            					<li style="margin-top: 5px;">
						            					<a href="/goodsdetails/{{$v->gid}}"><span style="font-size: 16px;color:rgb(117,117,117);font-family: Times New Roman;">{{$v->goods->gname}}</span></a>
						            				</li>
					            					<li style="margin-top: 5px;">
					            						<span style="font-size: 13px;color:rgb(117,117,117);font-family: Times New Roman;">{{$v->goods->gdesc}}</span>
					            					</li>
					            					<li style="margin-top: 5px;">
					            						<span style="color: #ff6700; font-size: 18px;">{{$v->goods->gprice}} 元</span>
					            					</li>
					            			</div>
					            		</div>
					            		@endforeach
				            		</ul>
				            	</div>
				            </div>
				        </div>
				    </div>
				</div>

	        </div>
	    </div>
	</div>
</div>
<div class="clear"></div>
		</div>
	</div>	
@endsection

@section('js')
<script>
	$('.shopbox').on({  
	    mouseover : function(){  
	        $(this).css('border','1px solid #ff6700');
	        $(this).children().eq(0).show();
	    },  
	    mouseout : function(){  
	    	$(this).css('border','1px solid white');
	        $(this).children().eq(0).hide();
	    }   
	});  
	$('.shanchu').click(function(){
		var info = confirm('确定要删除吗?');
		if (!info) return;
		//alert(123);

		var id = $(this).attr('id');
		var btn = $(this);

		$.get('delshoucang/'+id, {}, function(data){
			if (data == 1) {
				btn.parent().remove();
			}
		});
	});
</script>
@endsection

