@extends('layout.home')
@section('title',$title)
<link rel="stylesheet" href="/home/cart/css/addbase.min.css">
<link rel="stylesheet" href="/home/cart/css/success.css">
@section('header')
<!-- start banner_x -->
    <div class="banner_x center">
        <a href="./index.html" target="_blank"><div class="logo fl"></div></a>
        
        <div class="wdgwc fl ml40">我的购物车</div>
        <div class="wxts fl ml20">温馨提示：产品是否购买成功，以最终下单为准哦，请尽快结算</div>
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
    <div class="page-main">
        <div class="container">
            <div class="buy-succ-box clearfix">
                <div class="goods-content" id="J_goodsBox">
                    <div class="goods-img">
                        <img src="/img/success.png" width="64" height="64">
                    </div>
                    <div class="goods-info" style="padding-top: 13px">
                        <h3>已成功加入购物车！</h3>
                    </div>
                </div>
                <div class="actions J_actBox">
                    <p class="hide J_notic">有商品未成功加入购物车，可以在购物车中查看</p>
                    <a href="javascript:void(0);" class="btn btn-line-gray J_goBack" onclick="javascript:window.history.go(-1)">返回上一级</a>
                    <a href="/shopCart" class="btn btn-primary" onclick="">去购物车结算</a>
                </div>
			</div>
            <div class="buy-succ-recommend container xm-carousel-container" id="J_buyRecommend">
                <h2 class="xm-recommend-title">
                    <span>买购物车中商品的人还买了</span>
				</h2>
                <div class="xm-recommend">
                    <div class="xm-carousel-wrapper" style="height: 320px; overflow: hidden;">
                        <ul class="xm-carousel-col-5-list xm-carousel-list clearfix" style="width: 2480px; margin-left: 0px; transition: margin-left 0.5s ease;">
                            @foreach($goods as $k=>$v)
                            <li class="J_xm-recommend-list">
                                <dl>
                                    <dt>
                                        <a href="" " target="_blank" onclick="">
                                            <img src="{{$v->img}}" alt="{{$v->gname}}">
										</a>
                                    </dt>
                                    <dd class="xm-recommend-name">
                                        <a href="" target="_blank" onclick="">{{$v->gname}}</a>
									</dd>
                                    <dd class="xm-recommend-price">{{$v->gprice}}</dd>
                                    <dd class="xm-recommend-tips ">3585人好评</dd>
                                    <dd class="xm-recommend-notice"></dd>
                                </dl>
                            </li>
                            @endforeach
						</ul>
                    </div>
                </div>
            </div>
		</div>
    </div>
@endsection

@section('js')

@endsection