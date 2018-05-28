@extends('layout.home')

@section('title',$title)
<link rel="shortcut icon" href="https://s01.mifile.cn/favicon.ico" type="image/x-icon">
<link rel="icon" href="https://s01.mifile.cn/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="/home/cart/css/bases.min.css">
<link rel="stylesheet" type="text/css" href="/home/cart/css/pay-confirm.min.css">

        

@section('header')
    <div class="site-header site-mini-header">
        <div class="container">
            <div class="header-logo">
                <a class="logo " href="" title="智buy官网">
                </a>
            </div>
            <div class="header-title" id="J_miniHeaderTitle">
                <h2>
                    支付订单
                </h2>
            </div>
            <div class="topbar-info" id="J_userInfo">
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
        </div>
    </div>
@endsection

@section('content')
    <div class="page-main" style="min-height: 435px">

        <div class="container confirm-box" style="height: 435px">
            <form target="_blank" action=""
            id="J_payForm" method="post">
                <div class="section section-order">
                    <div class="order-info clearfix">
                        <div class="fl">
                            <h2 class="title">
                                订单提交成功！
                            </h2>
                            <p class="order-time" id="J_deliverDesc">
                            </p>
                            <p class="order-time">
                                请在
                                <span class="pay-time-tip">
                                    48小时0分
                                </span>
                                内完成支付, 超时后将取消订单
                            </p>
                            <p class="post-info" id="J_postInfo">
                                收货信息：{{$address->name}}&nbsp;&nbsp; {{$address->phone}}&nbsp;&nbsp; {{$address->province}}&nbsp;&nbsp; {{$address->city}}&nbsp;&nbsp; {{$address->area}}&nbsp;&nbsp; {{$address->street}}
                            </p>

                        </div>
                        <div class="fr">
                            <p class="total">
                                应付总额：
                                <span class="money">
                                    <em>
                                        {{$tprice}}
                                    </em>
                                    元
                                </span>
                            </p>
                            <a href="javascript:void(0);" class="show-detail" id="J_showDetail">
                                订单详情
                                <i class="iconfont">
                                    
                                </i>
                            </a>
                            <div style="margin-top:5px">
								<a href="/" type="button" class="btn btn-primary">返回首页</a>
							</div>

                        </div>

                    </div>
                    <i class="iconfont icon-right">
                        √
                    </i>
                    <div class="order-detail">
                        <ul>
                            <li class="clearfix">
                                <div class="label">
                                    订单号：
                                </div>
                                <div class="content">
                                    <span class="order-num">
                                        {{$number}}
                                    </span>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="label">
                                    收货信息：
                                </div>
                                <div class="content">
                                    {{$address->name}}&nbsp;&nbsp; {{$address->phone}}&nbsp;&nbsp; {{$address->province}}&nbsp;&nbsp; {{$address->city}}&nbsp;&nbsp; {{$address->area}}&nbsp;&nbsp; {{$address->street}}
                                </div>
                            </li>
                            
                            <li class="clearfix">
                                <div class="label">
                                    配送时间：
                                </div>
                                <div class="content">
                                    不限送货时间
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="label">
                                    发票信息：
                                </div>
                                <div class="content">
                                    电子发票 个人
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
		
    </div>

@endsection

<script type="text/javascript" async="" src="/home/cart/js/jquery.statData.min.js"></script>
<!-- .modal-globalSites END -->
<script src="/home/cart/js/base.min.js"></script>
<script type="text/javascript" src="/home/cart/js/payConfirm.min.js"></script>


@section('js')
<script>

</script>
@endsection

