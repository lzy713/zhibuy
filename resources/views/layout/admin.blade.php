<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>@yield('title')</title>
<link rel="stylesheet" href="/layui/css/layui.css">
<link rel="stylesheet" href="/admin/css/global.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo layui-icon" style="font-size: 26px;">&#xe609;</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a href="/admin/index" title="控制台" class="refreshr layui-icon">&#xe638;</a></li>
      <li class="layui-nav-item"><a href="/" target="_blank" title="主页" class="refreshr layui-icon">&#xe68e;</a></li>
    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">admin</a>
        <dl class="layui-nav-child">
          <dd><a href="">基本资料</a></dd>
          <dd><a href="">修改密码</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="">退出</a></li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;">商品管理</a>
          <dl class="layui-nav-child">
            <dd><a href="/cates/index">商品分类</a></dd>
            <dd><a href="/goods/index">商品管理</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">个人中心</a>
          <dl class="layui-nav-child">
            <dd><a href="/users/index">会员管理</a></dd>
            <dd><a href="/admin/users/orders">订单管理</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">后台管理</a>
          <dl class="layui-nav-child">
            <dd><a href="/admin/menu">菜单管理</a></dd>
          </dl>
        </li>
        
        <!-- <li class="layui-nav-item"><a href="/admin/user">用户管理</a></li>
        <li class="layui-nav-item"><a href="">发布商品</a></li> -->
      </ul>
    </div>
  </div>
  
  <div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">
    	      
            @section('content')   
	            
      		@show  
        
        
    </div>
  </div>
  <!-- 内容主体区域 -->
  
  <div class="layui-footer">
    <!-- 底部固定区域 -->
    © layui.com - 底部固定区域
  </div>
</div>
<script src="/admin/js/jquery.js"></script>
<script src="/layui/layui.js"></script>
<script src="/admin/js/dialog.js"></script>
<script src="/admin/js/common.js"></script>
@section('js')
<script>
//JavaScript代码区域
layui.use(['element', 'form'], function(){
  var element = layui.element;
  
});
</script>
@show
</body>
</html>