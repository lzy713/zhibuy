<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>@yield('title')</title>
		<link rel="stylesheet" type="text/css" href="/home/css/style.css">
		<link rel="stylesheet" href="/layui/css/layui.css">
		<link rel="stylesheet" type="text/css" href="/home/css/common.css">
	</head>
	<body>
@section('header')
	<!-- start header -->

		<header>

			<div class="top center">
				<div class="left fl">
					<ul>
						<li><a href="/" target="_blank">小米商城</a></li>
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
					<div class="gouwuche fr"><a href="">购物车</a></div>
					<div class="fr">
						<ul>

								@if(session('homeFlag')==false)	
								<li><a href="/login" target="_blank">登录</a><li>
								<li>|</li>
								<li><a href="/register" target="_blank" >注册</a></li>
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
					<li><a href="./liebiao.html" target="_blank">小米手机</a></li>
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
					<?php
					$lbt = App\Model\Admin\Poster::where('cid',3)->orderBy('listorder','desc')->first();
					?>
					<div class="text fl">
						<input type="text" class="shuru" value="{{$lbt->title}}">
					</div>
					<div class="submit fl">
						<input type="submit" class="sousuo"/>
					</div>
					<div class="clear"></div>
				</form>
				<div class="clear"></div>
			</div>
		</div>

	@show
	
<!-- end banner_x -->


@section('content')   
	<!-- start banner_y -->
		<div class="banner_y center">
			
			<div class="nav">
				<?php
					$res = App\Model\Admin\Cates::with('goods')->get();
				?>
				<ul>
					@foreach($res as $k=>$v)
					<li>
						<a href="" class="list" cid="{{$v->cid}}" onclick="return false;">{{$v->cname}}</a>
						
						<div class="pop">

							<div class="left fl">
								<?php $i=0;?>
								@foreach($v->goods as $kk=>$vv)
								
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="/home/image/xm6_80.png" alt=""></div>
											<span class="fl">{{$vv->gname}}</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="./xiangqing.html" target="_blank">选购</a></div>
									<div class="clear"></div>
								</div>

								<?php $i++;?>

								@if($i==6)
									</div>
									<div class="ctn fl">
								@endif
								@endforeach

							</div>
							
							<div class="clear"></div>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
			
			<!--轮播-->	
			<div class="layui-carousel" id="test1">
			  <div carousel-item>
			  	<?php
			  	$lbt = App\Model\Admin\Poster::where('cid',1)->orderBy('listorder','desc')->limit(6)->get();
			  	?>
			  	@foreach($lbt as $k=>$v)

			    <div><a href="{{$v->url}}"><img src="{{$v->pic}}" width="auto" height="460"></a></div>
			    @endforeach
			  </div>
			</div>	

			<!--轮播-->


		</div>	

		<div class="sub_banner center">
			<?php
			$datu = App\Model\Admin\Poster::where('cid',4)->orderBy('listorder','desc')->limit(4)->get();

			//dd($datu);
			?>
			@foreach($datu as $k=>$v)
			<div class="datu fl" @if($k==0) style="margin-left:0;" @endif><a href="{{$v->url}}"><img src="{{$v->pic}}" alt=""></a></div>
			@endforeach

			<div class="clear"></div>
		</div>
	<!-- end banner -->

	<!-- start danpin -->
		<div class="danpin center">
			
			<div class="biaoti center">小米明星单品</div>
			<div class="main center">
				<div class="mingxing fl">
					<div class="sub_mingxing"><a href=""><img src="/home/image/pinpai1.png" alt=""></a></div>
					<div class="pinpai"><a href="">小米MIX</a></div>
					<div class="youhui">5月9日-21日享花呗12期分期免息</div>
					<div class="jiage">3499元起</div>
				</div>
				<div class="mingxing fl">
					<div class="sub_mingxing"><a href=""><img src="/home/image/pinpai2.png" alt=""></a></div>
					<div class="pinpai"><a href="">小米5s</a></div>
					<div class="youhui">5月9日-10日，下单立减200元</div>
					<div class="jiage">1999元</div>
				</div>
				<div class="mingxing fl">
					<div class="sub_mingxing"><a href=""><img src="/home/image/pinpai3.png" alt=""></a></div>
					<div class="pinpai"><a href="">小米手机5 64GB</a></div>
					<div class="youhui">5月9日-10日，下单立减100元</div>
					<div class="jiage">1799元</div>
				</div>
				<div class="mingxing fl"> 	
					<div class="sub_mingxing"><a href=""><img src="/home/image/pinpai4.png" alt=""></a></div>
					<div class="pinpai"><a href="">小米电视3s 55英寸</a></div>
					<div class="youhui">5月9日，下单立减200元</div>
					<div class="jiage">3999元</div>
				</div>
				<div class="mingxing fl">
					<div class="sub_mingxing"><a href=""><img src="/home/image/pinpai5.png" alt=""></a></div>
					<div class="pinpai"><a href="">小米笔记本</a></div>
					<div class="youhui">更轻更薄，像杂志一样随身携带</div>
					<div class="jiage">3599元起</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="peijian w">
			<div class="biaoti center">配件</div>
			<div class="main center">
				<div class="content">
					<div class="remen fl"><a href=""><img src="/home/image/peijian1.jpg"></a>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span>新品</span></div>
						<div class="tu"><a href=""><img src="/home/image/peijian2.jpg"></a></div>
						<div class="miaoshu"><a href="">小米6 硅胶保护套</a></div>
						<div class="jiage">49元</div>
						<div class="pingjia">372人评价</div>
						<div class="piao">
							<a href="">
								<span>发货速度很快！很配小米6！</span>
								<span>来至于mi狼牙的评价</span>
							</a>
						</div>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:#fff"></span></div>
						<div class="tu"><a href=""><img src="/home/image/peijian3.jpg"></a></div>
						<div class="miaoshu"><a href="">小米手机4c 小米4c 智能</a></div>
						<div class="jiage">29元</div>
						<div class="pingjia">372人评价</div>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:red">享6折</span></div>
						<div class="tu"><a href=""><img src="/home/image/peijian4.jpg"></a></div>
						<div class="miaoshu"><a href="">红米NOTE 4X 红米note4X</a></div>
						<div class="jiage">19元</div>
						<div class="pingjia">372人评价</div>
						<div class="piao">
							<a href="">
								<span>发货速度很快！很配小米6！</span>
								<span>来至于mi狼牙的评价</span>
							</a>
						</div>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:#fff"></span></div>
						<div class="tu"><a href=""><img src="/home/image/peijian5.jpg"></a></div>
						<div class="miaoshu"><a href="">小米支架式自拍杆</a></div>
						<div class="jiage">89元</div>
						<div class="pingjia">372人评价</div>
						<div class="piao">
							<a href="">
								<span>发货速度很快！很配小米6！</span>
								<span>来至于mi狼牙的评价</span>
							</a>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="content">
					<div class="remen fl"><a href=""><img src="/home/image/peijian6.png"></a>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:#fff"></span></div>
						<div class="tu"><a href=""><img src="/home/image/peijian7.jpg"></a></div>
						<div class="miaoshu"><a href="">小米指环支架</a></div>
						<div class="jiage">19元</div>
						<div class="pingjia">372人评价</div>
						<div class="piao">
							<a href="">
								<span>发货速度很快！很配小米6！</span>
								<span>来至于mi狼牙的评价</span>
							</a>
						</div>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:#fff"></span></div>
						<div class="tu"><a href=""><img src="/home/image/peijian8.jpg"></a></div>
						<div class="miaoshu"><a href="">米家随身风扇</a></div>
						<div class="jiage">19.9元</div>
						<div class="pingjia">372人评价</div>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:#fff"></span></div>
						<div class="tu"><a href=""><img src="/home/image/peijian9.jpg"></a></div>
						<div class="miaoshu"><a href="">红米4X 高透软胶保护套</a></div>
						<div class="jiage">59元</div>
						<div class="pingjia">775人评价</div>
					</div>
					<div class="remenlast fr">
						<div class="hongmi"><a href=""><img src="/home/image/hongmin4.png" alt=""></a></div>
						<div class="liulangengduo"><a href=""><img src="/home/image/liulangengduo.png" alt=""></a></div>					
					</div>
					<div class="clear"></div>
				</div>				
			</div>
		</div>
	@show  



		<footer class="mt20 center">			
			<div class="mt20">小米商城|MIUI|米聊|多看书城|小米路由器|视频电话|小米天猫店|小米淘宝直营店|小米网盟|小米移动|隐私政策|Select Region</div>
			<div>©mi.com 京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号</div> 
			<div>违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</div>
		</footer>

		<script src="/home/js/jquery.js"></script>
		<script src="/layui/layui.js"></script>
		@section('js')
			<script>
				$('.list').each(function(){
					var cid = $(this).attr('cid');
					$(this).click(function(){

						location.href = "/goodslist/"+cid;
					});
				});



				//JavaScript代码区域
				layui.use(['element', 'form','carousel'], function(){
				  var element = layui.element;
				  var form = layui.form;
				  var carousel = layui.carousel;
				   carousel.render({
				    elem: '#test1'
				    ,width: '100%' //设置容器宽度
				    ,height: '460px'
				    ,arrow: 'always' //始终显示箭头
				    //,anim: 'updown' //切换动画方式
				  });
				  
				 
				});


			</script>
		@show
	</body>
</html>