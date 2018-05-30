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
						<?php
					  	$lbt = App\Model\Admin\Poster::where('cid',5)->orderBy('listorder','desc')->limit(10)->get();
					  	?>
					  	@foreach($lbt as $k=>$v)
						<li><a href="{{$v->url}}" target="_blank">{{$v->title}}</a></li>
						<li>|</li>
					    @endforeach
						<div class="clear"></div>
					</ul>
				</div>
				<div class="right fr">
					<div class="gouwuche fr"><a href="/shopCart">购物车</a></div>
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
			<a href="/" ><div class="logo fl"></div></a>
			<a href=""><div class="ad_top fl"></div></a>
			<div class="nav fl">
				<?php	
					$data = \App\Model\Home\navs::get();
				?>
				
				<ul>
					@foreach($data as $k=>$v)
					<li><a href="{{$v->nurl}}" target="_blank"><b>{{$v->ntitle}}</b></a></li>
					@endforeach
				</ul>
				
				
			</div>
			<div class="search fr">
				
				
				<?php
					$lbt = App\Model\Admin\Poster::where('cid',3)->orderBy('listorder','desc')->first();
					?>
				<form action="/goodsfind" method="get">
					<div class="text fl">
						<input type="text" class="shuru" name="gname" value="{{$lbt->title}}">

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


		<div class="peijian w">
		<?php
		$tuitables = DB::table('fd_tuitable')->get();
		?>	
		@foreach($tuitables as $k3=>$v3)
			<div class="biaoti center">{{$v3->tname}}</div>

			<div class="main center">
				<div class="content">
					<!-- <div class="remen fl"><a href=""><img src="/home/image/peijian1.jpg"></a>
					</div> -->
				<?php
				$tj = DB::table('fd_tuijian')->where('path',$v3->tid)->limit(10)->get();
				$t=1;
				?>
				@foreach($tj as $k4 => $v4)
					<div class="remen fl">
						<div class="xinpin"><span>新品</span></div>
						<div class="tu"><a href="{{$v4->gurl}}"><img src="{{$v4->icon}}" width="150" height="150"></a></div>
						<div class="miaoshu"><a href="">{{$v4->gname}}</a></div>
						<div class="jiage">{{$v4->price}}元</div>
						<div class="pingjia">372人评价</div>
						<div class="piao">
							<a href="">
								<span>发货速度很快！很配小米6！</span>
								<span>来至于mi狼牙的评价</span>
							</a>
						</div>
					</div>
				<?php $t++; ?>

				@if($t == 6)
				<div class="clear"></div>
				</div>
				<div class="content">
				@endif
				@endforeach

				<div class="clear"></div>
			</div>
		</div>
		@endforeach
		</div>

	@show  

	
	<!--页脚-->


<!--页脚-->


<div class="footer-box">
	<div style=" background: #F5F5F5; width: 100%; height: 20px; margin-bottom: 10px;"></div>
	<div class="footer">
    	<ul>
        	<li style="background:url(images/footer_icon01.png) no-repeat 40px center;"><a href="javascript:;">1小时快修服务</a></li>
            <li style="background:url(images/footer_icon02.png) no-repeat 40px center;"><a href="javascript:;">7天无理由退货</a></li>
            <li style="background:url(images/footer_icon03.png) no-repeat 40px center;"><a href="javascript:;">15天免费换修</a></li>
            <li style="background:url(images/footer_icon04.png) no-repeat 40px center;"><a href="javascript:;">满150元包邮</a></li>
            <li style="background:url(images/footer_icon05.png) no-repeat 40px center;"><a href="javascript:;">520余家售后网点</a></li>
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

			    <?php	
					$links = \App\Model\Home\Friendlylinks::get();
				?>
				<p>
				@foreach($links as $k=>$v)
				<a href="">{{$v->fname}}|</a>
				@endforeach	
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