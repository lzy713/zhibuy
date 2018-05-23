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
      <li class="layui-nav-item"><a href="/admin/index" title="控制台" class="refreshr layui-icon">&#xe665;</a></li>
      <li class="layui-nav-item"><a href="/" target="_blank" title="主页" class="refreshr layui-icon">&#xe68e;</a></li>
    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">{{session('adminMsg')->name}}</a>
        <dl class="layui-nav-child">
          <dd><a href="/admin/admin/pass">修改密码</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="/admin/outLogin">退出</a></li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">

        <?php
        
        //获取路由地址
        //$routeurl =  explode('/', \Request::getRequestUri());
        //$routeurl = $routeurl[1].'/'.$routeurl[2];
        $urls = \Route::current();
        $urls = explode('/', $urls->uri);
        $routeurl = $urls[0].'/'.$urls[1];
        
        //获取栏目信息
        $adminMenus = App\Model\Admin\Menu::getOrderMenusNav();

        //获取权限栏目列
        $mids = explode(',',session('adminMid'));

        
        //dd($urls);
        ?>
        @foreach ($adminMenus as $k=>$v)
          @if (in_array($v->id,$mids)==true && empty($v->url) && $v->pid == 0)
          
          <li class="layui-nav-item">
            <a class="" href="javascript:;">{{$v->title}}</a>
            <dl class="layui-nav-child">

              @foreach ($v->type as $kk=>$vv)
                  @if (in_array($vv->id,$mids)!=false && $vv->pid == $v->id)
                    <dd  @if (strpos($vv->url,$routeurl)) class="layui-this" @endif><a href="{{$vv->url}}<?php echo strpos($routeurl,$vv->url);?>" >{{$vv->title}}</a></dd>
                  @endif
              @endforeach
              
            </dl>
          </li>
          @endif
          @if (in_array($v->id,$mids)==true && !empty($v->url) && $v->pid == 0)
              <li class="layui-nav-item"><a href="{{$v->url}}">{{$v->title}}</a></li>
          @endif
        @endforeach



        {{--
        @foreach ($adminMenus as $k=>$v)
          @if ($v->url == "" && $v->pid == 0)
          <li class="layui-nav-item">
            <a class="" href="javascript:;">{{$v->title}}</a>
            <dl class="layui-nav-child">

              @foreach ($v->type as $kk=>$vv)
                  @if ($vv->pid == $v->id)
                    <dd  @if (strpos($routeurl,$vv->url)===0) class="layui-this" @endif><a href="{{$vv->url}}" >{{$vv->title}}</a></dd>
                  @endif
              @endforeach
              
            </dl>
          </li>
          @endif
          @if ($v->url != "" && $v->pid == 0)
              <li class="layui-nav-item"><a href="{{$v->url}}">{{$v->title}}</a></li>
          @endif
        @endforeach
        --}}

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
    技术支持：长永&nbsp;&nbsp;&nbsp;&nbsp;
              孝磊&nbsp;&nbsp;&nbsp;&nbsp;
              晓博&nbsp;&nbsp;&nbsp;&nbsp;
              泽赛&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;特别鸣谢：laravel.com&nbsp;&nbsp;&nbsp;&nbsp;layui.com
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
<script type="text/javascript">
  $('.layui-this').ready(function(){
      $('.layui-this').parents('li').addClass('layui-nav-itemed');
    })
</script>
</body>
</html>