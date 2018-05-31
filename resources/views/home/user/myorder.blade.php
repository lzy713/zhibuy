@extends('layout.home')
@section('title',$title)
<link rel="stylesheet" type="text/css" href="/home/order/main.min.css">
<link rel="stylesheet" type="text/css" href="/home/order/base.min.css">
<style>
	.layui-laypage .layui-laypage-curr .layui-laypage-em {
    background-color: #ff6700 !important;
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
			                <div class="uc-content-box order-list-box">
			                    <div class="box-hd">
			                        <h1 class="title">我的订单<small>请谨防钓鱼链接或诈骗电话</small></h1>
			                        <div class="more clearfix">
			                            <ul class="filter-list J_orderType">
			                                <li class="first active">全部订单</li>
			                            </ul>
			                            <form id="J_orderSearchForm" class="search-form clearfix" action="/myorders" method="post">
			                            	{{csrf_field()}}
			                                <label for="search" class="hide">站内搜索</label>
			                                <input class="search-text" type="search" id="J_orderSearchKeywords" value="@if($number) {{$number}} @endif" name="number" autocomplete="off" placeholder="订单号">
			                                <input type="submit" class="search-btn iconfont" value="搜索" style="font-size:13px; height: 40px">
			                            </form>
			                        </div>
			                    </div>
			                    <div class="box-bd">
			                        <div id="J_orderList">
			                            <ul class="order-list">
		                                	@if( !empty($res[0]->number) )
			                                <li class="uc-order-item uc-order-item-pay">
			                                    <div class="order-detail">
			                                        <div class="order-summary">
			                                            <div class="order-status">等待付款</div>
			                                        </div>
													@foreach($res as $k=>$v)

			                                        <table class="order-detail-table">
			                                            <thead>
			                                                <tr>
			                                                    <th class="col-main">
			                                                        <p class="caption-info">
			                                                        	{{$v->phone}}
			                                                        	<span class="sep">
			                                                                |
			                                                            </span>
			                                                            {{$v->consignee}}
			                                                            <span class="sep">
			                                                                |
			                                                            </span>
			                                                            订单号：{{$v->number}}
			                                                        </p>
			                                                    </th>
			                                                    <th class="col-sub">
			                                                        <p class="caption-price">
			                                                            订单金额：
			                                                            <span class="num" style="color: #ff6700;font-size: 20px">{{$v->tprice}}</span>元
			                                                        </p>
			                                                    </th>
			                                                </tr>
			                                            </thead>
			                                            <tbody>
			                                                <tr>
			                                                    <td class="order-items">
			                                                        <ul class="goods-list">
			                                                            <li>
			                                                                <div class="figure figure-thumb">
			                                                                    <img src="{{$v->detail[0]->goods->img}}" width="80" height="80" alt="" style="margin: -10px 0 0 -17px">
			                                                                </div>
			                                                                <p class="name">{{$v->detail[0]->goods->gname}}</p>
			                                                                <p class="price">{{$v->detail[0]->price}}元 × {{$v->detail[0]->num}}</p>
			                                                            </li>
			                                                        </ul>
			                                                    </td>
			                                                    <td class="order-actions">
																	@if($v->status=='0')
																	<button class="btn btn-small btn-primary" style="border: 0px">
			                                                            未发货
			                                                        </button>
																	@elseif($v->status=='1')
			                                                        <button class="btn btn-small btn-primary buts" style="border: 0px" id="{{$v->id}}">
			                                                            确认收货
			                                                        </button>
			                                                        @else
			                                                        <button class="btn btn-small btn-primary" style="border: 0px">
			                                                            交易完成
			                                                        </button>
			                                                        @endif
			                                                        <button class="btn btn-small btn-line-gray" onclick="location.href='/myorder/orderDetail/{{$v->number}}'">
			                                                            订单详情
			                                                        </button>
			                                                        <button class="btn btn-small btn-line-gray delOrder" oid="{{$v->id}}">
			                                                            删除订单
			                                                        </button>
			                                                    </td>
			                                                </tr>
			                                            </tbody>
			                                        </table>
													@endforeach
			                                    </div>
			                                </li>
			                                @else
		                                    <center><h3>没有订单</h3></center>
	                                    	@endif
			                            </ul>
			                        </div>
			                        <div id="J_orderListPages">
			                            <div class="xm-pagenavi">
			                                {{$res->appends(['number'=>$number])->links()}}
			                            </div>
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

	$('.buts').click(function(data){
		var id = $(this).attr('id');
		var btn = $(this);
		$.get('/myorder/statusAjax/'+id,{},function(data){
			btn.attr('class','btn btn-small btn-primary');
			btn.text('交易完成');
		});

	});

	$('.delOrder').click(function(){
		var info = confirm('确定要删除吗?');
		if (!info) return;
		var oid = $(this).attr('oid');
		var del = $(this);

		$.get('myorder/flagAjax/'+oid, {}, function(data){
			if (data == 1) {
				del.parents('table').parent().parent().remove();
				location.reload();
			}
		});
	})

</script>
@endsection

