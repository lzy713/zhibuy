@extends('layout.home')
@section('title',$title)
<link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
<link rel="stylesheet" href="/home/cart/css/base.min.css">
<link rel="stylesheet" type="text/css" href="/home/cart/css/checkout.min.css">

<style>
	#buts{margin:43px auto auto 85px;}
	#danjia{margin-left:70px;}
	#xiaoji{margin-left:83px;}
	#caozuo{margin-left:138px;}
	#tupian{margin-left:0;}
	#mingcheng{margin-left:100px;}
	.cart-empty{
		height: 98px;
	    padding: 80px 0 120px;
	    color: #333;
	}
	.cart-empty .message{
		height: 98px;
	    padding-left: 341px;
	    background: url(/uploads/no-login-icon.png) 250px 22px no-repeat;
	}
	.cart-empty .message .txt {font-size: 14px;}
	.cart-empty .message li {line-height: 38px;}
	ol, ul {list-style: outside none none;}
	.ftx-05, .ftx05 {color: #005ea7;}
</style>

@section('header')
    <!-- start banner_x -->
	<div class="banner_x center">
		<a href="./index.html" target="_blank"><div class="logo fl"></div></a>
		
		<div class="wdgwc fl ml40">确认订单</div>
		<div class="dlzc fr">
			<span class="user">
                    <a rel="nofollow" class="user-name" href="/login/self_auth">
                        <span class="name">
                            {{session('homeMsg')->username}}
                        </span>
                    </a>
                </span>
                <span class="sep">
                    |
                </span>
                <a rel="nofollow" class="link link-order" href="/myorder"
                target="_blank">
                    我的订单
                </a>
		</div>
		<div class="clear"></div>
	</div>
	<div class="xiantiao"></div>
@endsection

@section('content')
    <!-- 春节发货公告 END-->
    <div class="container">
        <div class="checkout-box">

            <div class="section section-address">

                <div class="section-header clearfix">
                    <h3 class="title">
                        收货地址
                    </h3>
                    <div class="more">
                    </div>
                    <div class="mitv-tips hide" style="margin-left: 0;border: none;" id="J_bigproPostTip">
                    </div>
                </div>
                <div class="section-body clearfix" id="J_addressList">
                    <!-- 当前显示的收货地址 -->
                    @if( !empty($address) )
                    <div class="address-item J_addressItem">
                        <dl>
                            <dt>
                                <span class="tag">
                                </span>
                                <em class="uname">
                                    {{$address->name}}
                                </em>
                            </dt>
                            <dd class="utel">
                                {{$address->phone}}
                            </dd>
                            <dd class="uaddress">
                                {{$address->province}} {{$address->city}} {{$address->area}}
                                <br>
                                {{$address->street}}
                            </dd>
                        </dl>
                        <div class="actions">
                            <a href="javascript:void(0);" class="" data-stat-id="8a158e0ee8f2f343">
                            </a>
                        </div>
                    </div>
                    @endif
                    <!-- 当前显示的收货地址 -->

                    <div class="address-item address-item-new" id="J_newAddress">
                        <i class="iconfont">
                            
                        </i>
                        添加新地址
                    </div>

                </div>
            </div>

            <div class="section section-options section-shipment clearfix">
                <div class="section-header">
                    <h3 class="title">配送方式</h3>
                </div>
                <div class="section-body clearfix">
                    <ul class="clearfix J_optionList options ">
                        <li data-type="shipment" class="J_option selected" data-amount="0" data-value="2">
                            快递配送（免运费）
                        </li>
                    </ul>
                    <div class="service-self-tip" id="J_serviceSelfTip" style="display: none;">
                    </div>
                </div>
            </div>
			
            <div class="section section-goods">
                <div class="section-header clearfix">
                    <h3 class="title">商品</h3>
                    <div class="more">
                        <a href="/shopCart" data-stat-id="1a736b9c4721e309">返回购物车
                            <i class="iconfont"></i>
                        </a>
                    </div>
                </div>
                <div class="section-body">
                    <ul class="goods-list" id="J_goodsList">
						<!--商品-->
						@foreach($res as $k=>$v)
                        <li class="clearfix">
                            <div class="col col-img">
                                <img src="{{$v->goods->img}}" width="30" height="30">
                            </div>
                            <div class="col col-name">{{$v->goods->gname}}</div>
                            <div class="col col-price">{{$v->goods->gprice}} x {{$v->num}}</div>
                            <div class="col col-status">&nbsp;</div>
                            <div class="col col-total">{{$v->prices}}</div>
                        </li>
						<!--商品-->
						@endforeach
                    </ul>
                </div>
            </div>
            <div class="section section-count clearfix">				
                <div class="money-box" id="J_moneyBox">
				
                    <ul>
                        <li class="clearfix">
                            <label>商品件数：</label>
                            <span class="val">{{$count}}</span>
                        </li>
                        <li class="clearfix">
                        	<label>商品总价：</label>
                            <span class="val">{{$prices}}元</span>
                        </li>
                        <li class="clearfix">
                            <label>运费：</label>
                            <span class="val">
                                <i data-id="J_postageVal">0</i>
                                元
                            </span>
                        </li>
                        <li class="clearfix total-price">
                            <label>应付总额：</label>
                            <span class="val">
                                <em data-id="J_totalPrice">{{$prices}}</em>
                                元
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section-bar clearfix">
                <div class="fr">
                    <a href="/shopCart/create" class="btn btn-primary" id="J_checkoutToPay"
                    data-stat-id="7369627d1ecb0ca6">
                        提交订单
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="/layui/layui.js"></script>
<script src="/home/layer/layer.js"></script>
 <script type="text/javascript">
    $('.J_addressItem').click(function(){
        $(this).css('border','1px solid #ff6700');
    });

    $('#J_newAddress').on('click', function(){
        var index = layer.open({
            type: 2,
            shift:1,
            offset: '150px',
            title: '添加新地址',
            fixed: true,
            shadeClose: true,
            maxmin: true,
            area: ['700px', '500px'],
            content: '/address/create',
            
            });
    });

    layui.use('form', function(){
        var form = layui.form
        ,layer = layui.layer;
        $('#J_checkoutToPay').click(function(){
            if ( {{empty($address)}} ) {
                layer.msg('请填写收货地址', {
                icon: 5,
                offset: '150px',
                time:1000
                });
                return false;
            }
        });
        
                
    });
</script>
@endsection
