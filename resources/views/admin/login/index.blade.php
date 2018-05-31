<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>智buy后台管理系统 v3.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="/admin/css/login.css" media="all" />
</head>
<body>
  <video class="video-player" preload="auto" autoplay loop="loop" data-height="1080" data-width="1920" height="1080" width="1920">
      <source src="/admin/video/login.mp4" type="video/mp4">
     <!--  此视频文件为支付宝所有，在此仅供样式参考，如用到商业用途，请自行更换为其他视频或图片，否则造成的任何问题使用者本人承担，谢谢 -->
      </video>
      
    <div class="video_mask"></div>
    <div class="login">
        <h1>智buy商城管理系统</h1>
        <form class="layui-form" action="" method="post" id="sub_form">  
            <div class="layui-form-item">
                <input class="layui-input" name="name" placeholder="用户名" type="text" autocomplete="off">
            </div>
            <div class="layui-form-item">
                <input class="layui-input" name="pwd" placeholder="密码" type="password" autocomplete="off">
            </div>
            <div class="layui-form-item form_code">
                <input class="layui-input" name="code" placeholder="验证码" type="text" autocomplete="off">
                <div class="code"><img src="/admin/captcha" onclick="this.src = '/admin/captcha/?a=' + Math.random()" width="116" height="36"></div>
            </div>
            <button class="layui-btn login_btn layui-btn-normal" lay-submit id="sub_button" lay-filter="*">登录</button>
        </form>
    </div>
    <script src="/admin/js/jquery.js"></script>
    <script type="text/javascript" src="/layui/layui.js"></script>
    <script type="text/javascript" src="/admin/js/login.js"></script>
    <script src="/admin/js/dialog.js"></script>

<script>

//路由地址
var SCOPE = {
  'save_url' : '/admin/dologin',
  'jump_url' : '/admin/index',
  }


//ajax提交token
 var _token = '{{csrf_token()}}';
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': _token
    }
});

//JavaScript代码区域
layui.use(['element', 'form'], function(){
  var element = layui.element;
  var form = layui.form;
  
  form.on('submit(*)', function(data){
    return false;
  });

});

</script>
</body>
</html>