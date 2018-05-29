<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>@yield('title')</title>
		<link rel="stylesheet" type="text/css" href="/home/css/style.css">
		<style>
		/*重置属性*/
*{ font-family:"微软雅黑"; font-size:14px; padding:0; margin:0;}
img{ display:block;}
a{ text-decoration:none;}
ul{ list-style:none;}
p,dl,dd{ margin:0; padding:0;}
/*公共属性*/
.clearfix{ clear:both;}
.shadow{box-shadow: 0px 3px 20px 0px rgba(0, 0, 0, 0.2);}
			/*页脚*/
.footer-box{ width:100%; background-color:#fff;}
.footer{ width:1226px; margin-left:auto; margin-right:auto;}
.footer ul{ margin-top:27px; margin-bottom:27px;}
.footer li{ float:left; width:244px; height:26px; border-right:1px solid #e0e0e0; text-align:center;line-height:26px;}
.footer li a{  color:#616161;}
.footer li a:hover{ color:#ff6700;}
.line{ width:1226px; height:1px; background-color:#e0e0e0; margin-bottom:40px;}
.footer dl{ margin-right:104px; float:left; margin-bottom:25px;}
.footer dd{  margin-bottom:15px; }
.footer dd a{font-size:12px; font-family:"宋体";color:#757575;}
.footer dd a:hover{ color:#ff6700;}
.online{ width:246px; text-align:center; float:right;margin-top: -170px;}
.service{margin-left:auto; margin-right:auto; width:120px; height:30px; border:1px solid #ff6700; line-height:30px; text-align:center; color:#ff6700; font-weight:Arial,"微软雅黑"; font-size:12px;}

/*合作*/
.team-box{ width:100%; background-color:#f5f5f5; padding-top:33px;}
.team{ width:1226px; margin-left:auto; margin-right:auto;}
.team .logo{ float:left; margin-right:3px;}
.team a{ border-right:1px solid #b0b0b0; line-height:12px; padding-left:5px; padding-right:5px; font-family:Arial,"宋体"; font-size:12px; color:#757575;}
.team p{font-family:Arial,"宋体"; font-size:12px; margin-bottom:2px; float:left; color:#b0b0b0;}
.team p a:hover{ color:#ff6700;}
.team .safe{ float:left; width:285px;}
.safe span{ float:left; width:60px; margin-right:4px;}
.word{ width:1226px; margin-left:auto; margin-right:auto; text-align:center;font-family:"华文行楷",sunself; font-size:20px; color:#bababa; font-weight:normal; padding-bottom:30px;}
#homeMsg a p img {width :900px;height: 500px;margin-top: 20px;margin-left: 30px;}
		</style>
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
					<li><a href="/ceping">测评</a></li>
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

	@show
	
<!-- end banner_x -->


@section('content')   


	<!-- start danpin -->
		<div class="danpin center">
			
			<div class="biaoti center">{{$rek->nname}}测评</div>
		
		
				<div class="main center">
				<div class="mingxing fl" style="height: auto;width: 1200px;">
					<div style="height: 100px;width: 1000px;font-size: 20px;margin-left: 50px;margin-top: 30px;">{{$rek->desc}}</div>
					
					<div class="sub_mingxing">
						<a href=""><img src="{{$rek->imgs}}" alt=""></a>
					</div>
					<div id="homeMsg"><a href="">{!!$rek->content!!}</a></div>
					
				</div>
				


				<div class="clear"></div>
			</div>	
	

			
			
			<div class="clear"></div>
		
			
		
		</div>

		

	@show  

	
	<!--页脚-->

	
<style>
.footer-box{ width:100%; background-color:#fff;}
.footer{ width:1226px; margin-left:auto; margin-right:auto;}
.footer ul{ margin-top:27px; margin-bottom:27px;}
.footer li{ float:left; width:244px; height:26px; border-right:1px solid #e0e0e0; text-align:center;line-height:26px;}
.footer li a{  color:#616161;}
.footer li a:hover{ color:#ff6700;}
.line{ width:1226px; height:1px; background-color:#e0e0e0; margin-bottom:40px;}
.footer dl{ margin-right:104px; float:left; margin-bottom:25px;}
.footer dd{  margin-bottom:15px; }
.footer dd a{font-size:12px; font-family:"宋体";color:#757575;}
.footer dd a:hover{ color:#ff6700;}
.online{ width:246px; text-align:center; float:left;}
.service{margin-left:auto; margin-right:auto; width:120px; height:30px; border:1px solid #ff6700; line-height:30px; text-align:center; color:#ff6700; font-weight:Arial,"微软雅黑"; font-size:12px;}

</style>


<!--页脚-->

<div class="footer-box">
	<div class="footer">
    	<ul>
        	<li style="background:url(images/footer_icon01.png) no-repeat 40px center;"><a href="file:///D:/%E5%B0%8F%E7%B1%B3%E9%9C%80%E8%A6%81/%E6%A8%A1%E6%9D%BF/5afadee6659a7/index.html#">1小时快修服务</a></li>
            <li style="background:url(images/footer_icon02.png) no-repeat 40px center;"><a href="file:///D:/%E5%B0%8F%E7%B1%B3%E9%9C%80%E8%A6%81/%E6%A8%A1%E6%9D%BF/5afadee6659a7/index.html#">7天无理由退货</a></li>
            <li style="background:url(images/footer_icon03.png) no-repeat 40px center;"><a href="file:///D:/%E5%B0%8F%E7%B1%B3%E9%9C%80%E8%A6%81/%E6%A8%A1%E6%9D%BF/5afadee6659a7/index.html#">15天免费换修</a></li>
            <li style="background:url(images/footer_icon04.png) no-repeat 40px center;"><a href="file:///D:/%E5%B0%8F%E7%B1%B3%E9%9C%80%E8%A6%81/%E6%A8%A1%E6%9D%BF/5afadee6659a7/index.html#">满150元包邮</a></li>
            <li style="background:url(images/footer_icon05.png) no-repeat 40px center;"><a href="file:///D:/%E5%B0%8F%E7%B1%B3%E9%9C%80%E8%A6%81/%E6%A8%A1%E6%9D%BF/5afadee6659a7/index.html#">520余家售后网点</a></li>
            <div class="clearfix"></div>
        </ul>
        <div class="line"></div>
        <?php
        $rew = DB::table('fd_notice')->where('npid',0)->get(); 
        // dd($rew);
       
        ?>
        @foreach ($rew as $k7 =>$v7)
        <dl>
        	<dd style="font-size:14px; font-family:&#39;微软雅黑&#39;; color:#424242; margin-bottom:28px;">{{$v7->nname}}</dd>
			
		<?php
			 $rez = DB::table('fd_notice')->where('npid',$v7->nid)->get();

        	// dd($rez);

		?>
        	@foreach($rez as $k8=>$v8)
            <dd><a href="">{{$v8->nname}}</a></dd>
            @endforeach
            
        </dl>
     	@endforeach
      
        <div style="width:1px; height:111px; float:left; background-color:#e0e0e0; margin-top:10px; "></div>
        <div class="online" style='float:right;'>
        	<p style="font-size:20px; color:#ff6700; margin-bottom:10px;">400-100-5678</p>
            <p style="font-size:12px; font-family:Arial,&#39;宋体&#39;; color:#616161; margin-bottom:7px;">周一至周日 8:00-18:00</p>
            <p style="font-size:12px; font-family:Arial,&#39;宋体&#39;; color:#616161; margin-bottom:18px;">（仅收市话费）</p>	
            <div class="service">24小时在线客服</div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<!--合作-->
<div class="team-box">
	<div class="team">
    	<div class="logo"><img src="/home/images/team_logo.png"></div>
        <div style="width:880px; float:left; margin-bottom:30px;">
        	<p><a href="file:///D:/%E5%B0%8F%E7%B1%B3%E9%9C%80%E8%A6%81/%E6%A8%A1%E6%9D%BF/5afadee6659a7/index.html#">小米网</a><a href="file:///D:/%E5%B0%8F%E7%B1%B3%E9%9C%80%E8%A6%81/%E6%A8%A1%E6%9D%BF/5afadee6659a7/index.html#">MIUI</a><a href="file:///D:/%E5%B0%8F%E7%B1%B3%E9%9C%80%E8%A6%81/%E6%A8%A1%E6%9D%BF/5afadee6659a7/index.html#">米聊</a><a href="file:///D:/%E5%B0%8F%E7%B1%B3%E9%9C%80%E8%A6%81/%E6%A8%A1%E6%9D%BF/5afadee6659a7/index.html#">多看书城</a><a href="file:///D:/%E5%B0%8F%E7%B1%B3%E9%9C%80%E8%A6%81/%E6%A8%A1%E6%9D%BF/5afadee6659a7/index.html#">小米路由器</a><a href="file:///D:/%E5%B0%8F%E7%B1%B3%E9%9C%80%E8%A6%81/%E6%A8%A1%E6%9D%BF/5afadee6659a7/index.html#">视频电话</a>
        	<a href="file:///D:/%E5%B0%8F%E7%B1%B3%E9%9C%80%E8%A6%81/%E6%A8%A1%E6%9D%BF/5afadee6659a7/index.html#">小米后院</a><a href="file:///D:/%E5%B0%8F%E7%B1%B3%E9%9C%80%E8%A6%81/%E6%A8%A1%E6%9D%BF/5afadee6659a7/index.html#">小米天猫店</a><a href="file:///D:/%E5%B0%8F%E7%B1%B3%E9%9C%80%E8%A6%81/%E6%A8%A1%E6%9D%BF/5afadee6659a7/index.html#">小米淘宝直营店</a><a href="file:///D:/%E5%B0%8F%E7%B1%B3%E9%9C%80%E8%A6%81/%E6%A8%A1%E6%9D%BF/5afadee6659a7/index.html#">小米网盟</a><a href="file:///D:/%E5%B0%8F%E7%B1%B3%E9%9C%80%E8%A6%81/%E6%A8%A1%E6%9D%BF/5afadee6659a7/index.html#">问题反馈</a>
            <a href="file:///D:/%E5%B0%8F%E7%B1%B3%E9%9C%80%E8%A6%81/%E6%A8%A1%E6%9D%BF/5afadee6659a7/index.html#">Select Region</a>
        </p>
        <p style="margin-left:5px;">©mi.com京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号 违法和不良信息举报
        	电话：185-0130-1238</p>
        <p style="margin-left:5px;">本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</p>
        <div class="clearfix"></div>
        </div>
        <div class="safe">
        	<img style="float:left; margin-right:5px;" src="/home/images/safe_icon01.png">
            <span>诚信网站师范企业</span>
            <img style="float:left; margin-right:5px;" src="/home/images/safe_icon02.png">
            <span>可信网站信用评价</span>
            <img style="float:left; margin-right:5px;" src="/home/images/safe_icon03.png">
            <span style="margin-right:0;">网上交易保障中心</span>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="word">探索黑科技，小米为发烧而生</div>
</div>
<div style="height:20px; background-color:#fafafa;"></div>
	</body>


</html>