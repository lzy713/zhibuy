<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>@yield('title')</title>
		<link rel="stylesheet" type="text/css" href="/home/order/style.css">
		<link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
		<script src="/layui/layui.js"></script>
		<script src="/js/jquery.min.js"></script>
	</head>
	<body>
	<!-- start header -->
		<header>
			<div class="top center">
				<div class="left fl">
					<ul>
						<li><a href="" target="_blank">小米商城</a></li>
						<li>|</li>
						<li><a href="">MIUI</a></li>
						<li>|</li>
						<li><a href="">米聊</a></li>
						<li>|</li>
						<li><a href="">游戏</a></li>
						<li>|</li>
						<li><a href="">多看阅读</a></li>
						<li>|</li>
						<li><a href="">云服务</a></li>
						<li>|</li>
						<li><a href="">金融</a></li>
						<li>|</li>
						<li><a href="">小米商城移动版</a></li>
						<li>|</li>
						<li><a href="">问题反馈</a></li>
						<li>|</li>
						<li><a href="">Select Region</a></li>
						<div class="clear"></div>
					</ul>
				</div>
				<div class="right fr">
					<div class="gouwuche fr"><a href="/myorder">我的订单</a></div>
					<div class="fr">
						<ul>
							@if(session('homeFlag')==false)	
								<li><a href="/login" target="_blank">登录</a><li>
								<li>|</li>
								<li><a href="/register.html" target="_blank" >注册</a></li>
								@else
								<li><a href="/login" target="_blank">{{session('homeMsg')->username}}</a></li>
								<li>|</li>
								<li><a href="/login/self_auth">个人中心</a></li>
								<li>|</li>
								<li><a href="/login/loginout">退出</a></li>
								@endif
						</ul>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		</header>
	<!--end header -->
	<!-- start banner_x -->
		<div class="banner_x center">
			<a href="./index.html" target="_blank"><div class="logo fl"></div></a>
			<a href=""><div class="ad_top fl"></div></a>
			<div class="nav fl">
				<ul>
					<li><a href="">小米手机</a></li>
					<li><a href="">红米</a></li>
					<li><a href="">平板·笔记本</a></li>
					<li><a href="">电视</a></li>
					<li><a href="">盒子·影音</a></li>
					<li><a href="">路由器</a></li>
					<li><a href="">智能硬件</a></li>
					<li><a href="">服务</a></li>
					<li><a href="">社区</a></li>
				</ul>
			</div>
			<div class="search fr">
				<form action="" method="post">
					<div class="text fl">
						<input type="text" class="shuru"  placeholder="小米6&nbsp;小米MIX现货">
					</div>
					<div class="submit fl">
						<input type="submit" class="sousuo" value="搜索"/>
					</div>
					<div class="clear"></div>
				</form>
				<div class="clear"></div>
			</div>
		</div>
<!-- end banner_x -->
<!-- self_info -->
	<div class="grzxbj">
		<div class="selfinfo center">

		<div class="lfnav fl" id="cebian">
			<div class="ddzx">个人中心</div>
			<div class="subddzx">
				<ul>
					<li><a href="/login/self_auth">我的个人中心</a></li>
					<!--  style="color:#ff6700;font-weight:bold;" -->
					<li><a href="/myorder">我的订单</a></li>
					<li><a href="/mycollection">收藏</a></li>
					<li><a href="/myaddress">收货地址</a></li>
				</ul>
			</div>
		</div>
		@section('content')
		<div class="rtcont fr">
		
			
		
		</div>

		<div class="clear"></div>
		</div>
		@show
	</div>
<!-- self_info -->
		
		<footer class="mt20 center">			
			<div class="mt20">小米商城|MIUI|米聊|多看书城|小米路由器|视频电话|小米天猫店|小米淘宝直营店|小米网盟|小米移动|隐私政策|Select Region</div>
			<div>©mi.com 京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号</div> 
			<div>违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</div>
		</footer>
		@section('js')

		@show
	</body>
</html>