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
							<li><a href="./login.html" target="_blank">登录</a></li>
							<li>|</li>
							<li><a href="./register.html" target="_blank" >注册</a></li>
							<li>|</li>
							<li><a href="#top">个人中心</a></li>
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
					<li><a href="" style="color:#ff6700;font-weight:bold;">我的个人中心</a></li>
					<li><a href="/login/safe"  style="color:#ff6700;font-weight:bold;">账号安全</a></li>
					<li><a href="">优惠券</a></li>
					<li><a href="">收货地址</a></li>
				</ul>
			</div>
		</div>
		<div class="rtcont fr">
		<form class="layui-form" action="/login/Save_auth/{{$res->id}}" method="post" enctype="multipart/form-data" id="sub_form">
                    <div class="upload-img-box" style="margin-top: 20px;width: 300px;margin-left: 120px;">
                    	@if($res->img)
                    	<div class="upload-icon-img"><div class="upload-pre-item"><img src="{{$res->img}}" class="img" width="100" height="100" ><input type="hidden" name="img" value="{{$res->img}}" /></div></div>
						@endif	
                    </div>

				<div class="box1" style="margin-top: 40px;width: 300px;">
				<label class="layui-form-label">我的头像</label>
                <div class="controls need-img">
                	<button type="button" class="layui-btn" id="upload_img_icon">
					  <i class="layui-icon">&#xe67c;</i>上传图片
					</button>
               

                </div>
        	</div> 
  				<div class="layui-form-item" style="margin-top: 10px;width: 400px;">
				    <label class="layui-form-label">*昵称</label>
				    <div class="layui-input-block">
				    	<!-- required  lay-verify="required" -->
				     {{$res->username}}
				    </div>
				  </div>
				  <div class="layui-form-item" style="margin-top: 10px;width: 400px;">
				    <label class="layui-form-label">真实姓名</label>
				    <div class="layui-input-block">
				      <input type="text" name="name" placeholder="请输入标题" value="{{$res->name}}" autocomplete="off" class="layui-input">
				    </div>
				  </div>
				 
				 <div class="layui-form-item">
				    <label class="layui-form-label">单选框</label>
				    <div class="layui-input-block">
				      <input type="radio"   name="sex" value="男" title="男" @if($res->sex =='男') checked @endif />
				      <input type="radio"  name="sex" value="女" title="女" @if($res->sex =='女') checked @endif />
				    </div>
				  </div>
				 
				   <div class="layui-form-item" style="margin-top: 10px;width: 400px;">
				    <label class="layui-form-label">电话号码</label>
				    <div class="layui-input-block">
				      <input type="text" name="phone" value="{{$res->phone}}" placeholder="请输入标题"  class="layui-input">
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
				

				
				<script>
						// $(element).slideUp()
						 
						//ajax提交token
						 var _token = '{{csrf_token()}}';
						$.ajaxSetup({
						    headers: {
						        'X-CSRF-TOKEN': _token
						    }
						});

						layui.use(['element', 'form', 'upload', 'layer'], function(){
						  var element = layui.element;
						  var form = layui.form;
						  var upload = layui.upload;
						  var layer = layui.layer;
						   
						  upload.render({ //上传图片
					      elem: '#upload_img_icon',
					      url: '/admin/upload/upimg',
					      multiple: false, //是否允许多文件上传。设置 true即可开启。不支持ie8/9
					      before: function(obj) {
					          layer.msg('图片上传中...', {
					              icon: 16,
					              shade: 0.01,
					              time: 0
					          })
					      },
					      done: function(res) {
					          layer.close(layer.msg());
					          $('.upload-img-box').html('<div class="upload-icon-img"><div class="upload-pre-item"><img src="' + res.data + '" class="img" width="100" height="100" ><input type="hidden" name="img" value="' + res.data + '" /></div></div>');
					      }
					      ,error: function(){
					          layer.msg('上传错误！');
					      }
					  });


						   //监听提交
						  form.on('submit(formDemo)', function(data){
						    layer.msg(JSON.stringify(data.field));
						    return false;
						  });

						  @if(session('success'))	
							layer.msg('修改成功');
						  @endif


						});


						
				

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
