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
          <a class="" href="javascript:;">分类管理</a>
          <dl class="layui-nav-child">
            <dd><a href="/admin/cates/index">添加分类</a></dd>
            <dd><a href="/admin/cates/show">查看分类</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">个人中心</a>
          <dl class="layui-nav-child">
            <dd><a href="/users/index">会员管理</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">商品管理</a>
          <dl class="layui-nav-child">
            <dd><a href="/admin/goods/add">添加商品</a></dd>
            <dd><a href="/admin/goods/show">查看商品</a></dd>
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


 <script type="text/javascript" charset="utf-8" src="/admin/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/admin/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/admin/ueditor/lang/zh-cn/zh-cn.js"></script>


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