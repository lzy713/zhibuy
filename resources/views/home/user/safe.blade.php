<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>个人中心</title>
		<link rel="stylesheet" type="text/css" href="/home/self/css/style.css">
		<link rel="stylesheet" href="/layui/css/layui.css" media="all">
		
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
					<div class="gouwuche fr"><a href="./dingdanzhongxin.html">我的订单</a></div>
					<div class="fr">
						<ul>
							<li><a href="/" target="_blank">登录</a></li>
							<li>|</li>
							<li><a href="/register" target="_blank" >注册</a></li>
							<li>|</li>
							<li><a href="/login/self_auth">个人中心</a></li>
							<li>|</li>
							<li><a href="/">退出</a></li>
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
			<div class="search fr" style="margin-top: -10px;">
				
					<div class="text fl" >
						<input type="text" class="shuru"  placeholder="小米6&nbsp;小米MIX现货">
					</div>
					<div class="submit fl">
						<input type="submit" class="sousuo" value="搜索"/>
					</div>
					<div class="clear"></div>
				<div class="clear"></div>
			</div>
		</div>
<!-- end banner_x -->
<!-- self_info -->
	<div class="grzxbj">
		<div class="selfinfo center">
		<div class="lfnav fl">
			<div class="ddzx">订单中心</div>
			<div class="subddzx">
				<ul>
					<li><a href="" >我的订单</a></li>
					<li><a href="">意外保</a></li>
					<li><a href="">团购订单</a></li>
					<li><a href="">评价晒单</a></li>
				</ul>
			</div>
			<div class="ddzx">个人中心</div>
			<div class="subddzx">
				<ul>
					<li><a href="/login/self_auth" style="color:#ff6700;font-weight:bold;">我的个人中心</a></li>
					<li><a href="/login/safe"  style="color:#ff6700;font-weight:bold;">账号安全</a></li>
					<li><a href="">优惠券</a></li>
					<li><a href="">收货地址</a></li>
				</ul>
			</div>
		</div>
		<div class="rtcont fr">

		@if (count($errors) > 0)
    		<div class="mws-form-message error">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li style='color:blue;font-size:17px;list-style:none'>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

		<form class="layui-form" action="/login/safe_auth" id="sub_form">
  				<div class="layui-form-item" style="margin-top: 10px;width: 400px;">
				    <label class="layui-form-label">修改密码</label>
				    <div class="layui-input-block">
				   </div>
				  </div>
				  <div class="layui-form-item" style="margin-top: 10px;width: 400px;">
				    <label class="layui-form-label">原密码</label>
				    <div class="layui-input-block">
				      <input type="password" name="ypass" placeholder="输入原密码" value="" autocomplete="off" class="layui-input">
				    </div>

				    <p id="tishi" style="color: red;margin-left: 110px;">{{session('msg')}}</p>


				  </div>
				   <div class="layui-form-item" style="margin-top: 10px;width: 400px;">
				    <label class="layui-form-label">新密码</label>
				    <div class="layui-input-block">
				      <input id="xpassword"  type="password" name="xpass" value="" placeholder="输入新密码"  class="layui-input">
				    </div>
				    <span style="display: none;margin-left: 110px;"  id="mxd">新密码不能为空</span>
				    <span style="display: none;margin-left: 110px;"  id="sdf">请输入正确的密码格式</span>
				  

				    <div class="layui-form-item" style="margin-top: 10px;width: 400px;">
				     <div class="layui-input-block">
				      <input id="cf" type="password" name="xphone" value="" placeholder="重复新密码"  class="layui-input">

						<span style="display: none;margin-left: 110px;"  id="mmm">两次密码不一致</span>
				       <span style="margin-top: 10px;">密码长度4~16位，数字、字母、下划线_</span>
				    </div>
				  

				  </div>

				   <div class="layui-form-item" style="margin-top: 10px;width: 220px;">
				    
				     <label class="labelbox pwd_panel c_b" style="height: 50px;">
				     <label class="layui-form-label">验证码</label>
				     <div class="layui-input-block">
				     <input  type="text" name="code" placeholder="输入验证码" value="" class="layui-input">
                          <!--  刷新一次换一次验证码 -->
                      <div class="layui-input-block" style="margin-top: -50px;">
                      <div style="width:100px;"><img src="/login/code" onclick="this.src = '/login/code/?a=' + Math.random()" ></div>
                	 </div>
                     </label>
				    </div>
				  </div>
				</div>
					{{csrf_field()}}
				<div class="layui-form-item">
				    <div class="layui-input-block">
				      <button id="baocun" class="layui-btn" type="submit" >保存</button>
				    </div>
				</div>

				</form>
				<script src="/layui/layui.js"></script>
				<script src="/home/js/jquery.js"></script>
				
				<script >
					

       		$('#baocun').click(function(){

       			var one = $('input[name=xpass]').val();

       			var two = $('input[name=xphone]').val();

       			console.log(thr);

       			var reg = /^\w{4,16}$/;

       			if(!one){

       				  $('#mxd').css('color','red').show();

       				  return false;
       			}else if(!reg.test(one)){

       				// alert($);

       					$('#mxd').css('color','red').hide();

       				   $('#sdf').css('color','red').show();

       				   return false;

       			}else if(one != two){
       					// $('#mmm').css('color','red').show();
       					// alert($);

       					return false;

       			}

       			
       				

       			
       		})

					

					
					
				</script>
				
				
				

		</div>
		
		<div class="clear"></div>
	
<!-- self_info -->
		
		<footer class="mt20 center">			
			<div class="mt20">小米商城|MIUI|米聊|多看书城|小米路由器|视频电话|小米天猫店|小米淘宝直营店|小米网盟|小米移动|隐私政策|Select Region</div>
			<div>©mi.com 京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号</div> 
			<div>违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</div>
		</footer>
	</body>
</html>

