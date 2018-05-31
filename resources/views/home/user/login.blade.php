<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="description" content="小米帐号能使用小米手机，MIUI，小米云，多看阅读，米聊，小米社区等小米服务。">
<meta name="keywords" content="小米帐号，小米账号，小米注册，注册，Mi Account，Sign in，小米，帐号，账号，小米帐户，登录，登陆，安全令牌，动态口令，小米注册，找回密码">

<meta name="csrf-token" content="{{ csrf_token() }}">
  
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title>小米帐号 - 登录</title>
<link href="/home/login/timg.ioc" type="image/x-icon" rel="shortcut icon"/>



<script type="text/javascript" src="/home/login/jquery-1.8.3.min.js"></script>
<script src="/home/login/holder.js"></script>
<style>
    body {
        margin: 0;

    }

    .h_panel,
    .login_banner {
        width: 1130px;
        margin: 0 auto;
    }

    .h_logo {
         width: 200px;
        height: 98px;
        background: url('/home/login/mistore_logo.png') no-repeat;
        margin-left:110px; 

    }
    .login_banner_panel {
        /* background:#1e2f40;*/
        width: 100%;
        height: 588px;
        position: absolute;
        background-attachment:fixed;
         /*position:fixed;*/
        /*margin-right:1800px;*/
        top: 98px;
        background-repeat: no-repeat;
        background-position: top center;

    }
    .nav_tabs_panel{

    }
    </style>
</head>

<body class="win_banner_mistore zh_CN">
  <div class="wrapper">
    <!-- loading -->
    
    
    <div  style="width: 100%; height: 100px;">
        <div class="h_logo">
              
        </div>
    </div>


    <!--bg_banner_start-->
    <div class="bgiframe" style="background: url('/home/login/login.jpg') center;">
      <!-- <iframe name="ifr" class="login_banner_panel" style="margin-top: 90px;width: 100%;"  src="/home/login/login.jpg" id="bgiframe" frameborder="0" scrolling="no"></iframe> -->
    </div>
    <!--bg_banner_end-->
    <div class="wrap">
      <div class="layout_panel">
        <div class="layout" id="layout">
          <!--表单输入登录-->
          <div class="mainbox" id="login-main">
            <div id="custom_display_2"><a class="ercode" id="qrcode-trigger" href="javascript:void(0)"></a></div>
            <!-- header s -->
            <div class="lgnheader">
              <div class="header_tit t_c">
                <em id="custom_display_1" class="milogo">
                  <svg width="100%" height="100%" version="1.1"><rect width="48" height="48" rx="3" ry="3" style="fill:#ff6700"></rect><rect x="10" y="15" width="4.2" height="18" style="fill:#FFFFFF"></rect><rect x="33.75" y="15" width="4.2" height="18" style="fill:#FFFFFF"></rect><rect x="11.25" y="15" width="15" height="4.1" style="fill:#FFFFFF"></rect><rect x="26.2" y="20.55" width="4.2" height="12.5" style="fill:#FFFFFF"></rect><rect x="20.6" y="15" width="9.8" height="9.8" rx="4.4" ry="4.4" style="fill:#FFFFFF"></rect><rect x="20.2" y="19" width="6" height="6" rx="2" ry="2" style="fill:#ff6700"></rect><rect x="18" y="19.1" width="4" height="2.2" style="fill:#ff6700"></rect><rect x="24.2" y="23" width="1.94" height="10" style="fill:#ff6700"></rect><rect x="18.1" y="22.8" width="4.2" height="10.2" style="fill:#FFFFFF"></rect></svg>
                </em>
                <h4 class="header_tit_txt" id="login-title">小米帐号登录</h4>
              <div class="site_info"></div></div>
            </div>
            <!-- header e -->
            <!-- tab s -->
            <div class="nav_tabs_panel">
              <div id="nav-tabs" class="nav_tabs">
                <a class="navtab-link now" href="javascript:void(0);" data-tab="pwd">帐号登录</a>
               
              </div>
            </div>
            <!-- tab e -->
            <!-- tab con s -->
            <div class="tabs-con tabs_con now" data-con="pwd">
              <div>
                <div class="login_area">
                  <form action="/login/skip" method="post" id="login-main-form">
                    <div class="loginbox c_b">
                      <!-- 输入框 -->
                      <div class="lgn_inputbg c_b login-panel pwdLogin">
                        <!--验证用户名-->
                        <label id="region-code" class="labelbox login_user c_b" for="">
                          <input class="item_account"  type="text" name="username" id="user" placeholder="用户名">
                        </label>
                        <label class="labelbox pwd_panel c_b">
                          <input class="item_account" type="password" placeholder="密码" autocomplete="off" id="pwd" name="password">
                        </label>
                        <label class="labelbox pwd_panel c_b" style="height: 50px;">
                          <input class="item_account" type="text" placeholder="验证码" autocomplete="off" id="pcode" name="passcode">
                          <!--  刷新一次换一次验证码 -->
                           <div style="width:120px;"><img src="/login/code" onclick="this.src = '/login/code/?a=' + Math.random()" ></div>
                        </label>
                      </div>


                      <!-- 错误信息 -->
                      <div class="err_tip" id="yhm" style="display: none;">
                       
                      </div>
<!-- 
                      <div class="err_tip" id="yhms" style="display: block;display: none;">
                        <div><em class="icon_error"></em><span class="error-con">用户名或密码不正确</span></div>
                      </div>

                      <div class="err_tip" id="yzm" style="display: block;display: none;">
                        <div><em class="icon_error"></em><span class="error-con">验证码错误</span></div>
                      </div> -->
                      {{csrf_field()}}
                     
                      <div class="btns_bg">
                        <input class="btnadpt" id="login-button" type="submit" value="登录">
                        <span id="custom_display_8" class="sns-default-container sns_default_container" style="display: none;">
                          </span>
                      </div>
                      <div class="other_panel clearfix">
                        <span id="custom_display_256" class="sms_link">
                            <a href="javascript:;" class="btnadpt btn_gray" id="ChangeLoginType">手机短信登录/注册</a>
                        </span>
                        <div class="reverse">
                          <div class="n_links_area" id="custom_display_64">
                            <a class="outer-link" href="/register">立即注册</a><span>|</span>
                            <a class="outer-link" href="/login/reset">忘记密码？</a>
                          </div>
                        </div>
                       
                        <!-- 其他登录方式 e -->
                        <p class="acq_tips" style="display: none;"></p>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="tabs-con tabs_con" data-con="qr">
              <div class="tab_qrcon">
                <div class="tab_code_iframe">
                  <iframe style="background:#fff;" src="./home/login/saved_resource.html" id="tab-qriframe" frameborder="0" scrolling="no"></iframe>
                </div>
                <div class="custom_sub_txt">
                  <p>使用<span>小米商城APP</span>扫一扫</p>
                  <p>小米手机可打开「设置」&gt;「小米帐号」扫码登录</p>
                </div>
              </div>
            </div>
            <!-- tab con e -->
          </div>
          <div class="ercode_area" id="login-qrcode">
            <div class="ercode_pannel">
              <a class="code_close" href="javascript:void(0)" title="关闭" id="qrcode-close"><span class="icon_code_close"></span></a>
              <div class="ercode_box">
                <div class="code_hd">
                  <h3 class="code_tit">小米帐号扫码登录</h3>
                  <p>请打开「设置 &gt; 小米帐号 &gt; 右上角扫一扫」扫码登录</p>
                </div>
                <div class="code_iframe">
                  <iframe style="background:#fff;" src="/home/login/saved_resource(1).html" id="qriframe" frameborder="0" scrolling="no"></iframe>
                </div>
              </div>
            </div>
          </div>
          <div class="ac-box" style="display: none">
            <!-- 取号注册 -->
            <div id="ac-register" class="tac" style="display: none">
              <h1>注册小米帐号</h1>
              <div class="box">
                 <img src="./home/login/sim.png" alt="sim card" class="fl" width="70" height="70">
                <div class="fl">
                  <p>手机号：<span class="maskedPhone"></span></p>
                </div>
              </div>
              <div class="err_tip">
                <div class="dis_box"><em class="icon_error"></em><span class="error-con"></span></div>
              </div>
              <div class="fixed_bot">
                <a href="javascript:;" class="btnadpt ok_btn">一键注册</a>
                <a href="javascript:;" class="btnadpt no_btn btn_gray">登录其他帐号</a>
              </div>
              <p class="acq_tips" style="display: none">取号来源于中国移动</p>
              <p class="agreeTip"><i class="icon_select icon_true"></i>同意小米的 <a href="http://www.miui.com/res/doc/eula/cn.html" class="agreement_link">用户协议</a>和<a href="http://www.miui.com/res/doc/privacy/cn.html" class="privacy_link"> 隐私政策 </a></p>
            </div>
            <!-- 回收号确认 -->
            <div id="ac-confirm" class="tac" style="display: none">
              <div>
                <div class="box">
                  <div class="na-img-area">
                    <div class="na-img-bg-area us-portraitUrl"></div>
                  </div>
                  <div class="confirm_tips">
                    <p>昵称：<span class="usernameShow"></span></p>
                    <p>小米ID：<span class="useridShow"></span></p>
                   
                  </div>
                </div>
                <h2>这是你的帐号吗？</h2>
              </div>
              <div class="err_tip">
                <div class="dis_box"><em class="icon_error"></em><span class="error-con"></span></div>
              </div>
              <div class="fixed_bot">
                <a href="javascript:;" class="btnadpt plain ok_btn">是我的，立即登录</a>
                <a href="javascript:;" class="btnadpt plain no_btn">不是我的，注册新帐号</a>
              </div>
              <p class="acq_tips" style="display: none">取号来源于中国移动</p>
              <p class="ptb30">
                <a href="javascript:;" class="back_btn blue">登录其他帐号</a>
              </p>
            </div>
          </div>
          <div class="oauth_box" style="display: none">
            <p>登录即同意该应用获得以下权限</p>
            <ul class="scope_list"></ul>
            <div class="oauth_wrap">
              <a href="javascript:;" class="wrap_more fl"></a><i class="icon_caret fl"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="custom_display_4" class="n-footer">
    <div class="nf-link-area clearfix">
      <ul class="lang-select-list">
        <li><a href="javascript:void(0)" data-lang="zh_CN" class="lang-select-li current">简体</a>|</li>
        <li><a href="https://account.xiaomi.com/pass/serviceLogin?callback=https%3A%2F%2Forder.mi.com%2Flogin%2Fcallback%3Ffollowup%3Dhttps%253A%252F%252Fwww.mi.com%252Froomrobot%252F%26sign%3DZDQwOGMzMGQwOGEzMWU4N2EzNzU0NTIzNTM2MjJjOGRiYzEyZjk2NA%2C%2C&amp;sid=mi_eshop&amp;_bannerBiz=mistore&amp;_qrsize=180&amp;_locale=zh_TW" data-lang="zh_TW" class="lang-select-li">繁体</a>|</li>
        <li><a href="https://account.xiaomi.com/pass/serviceLogin?callback=https%3A%2F%2Forder.mi.com%2Flogin%2Fcallback%3Ffollowup%3Dhttps%253A%252F%252Fwww.mi.com%252Froomrobot%252F%26sign%3DZDQwOGMzMGQwOGEzMWU4N2EzNzU0NTIzNTM2MjJjOGRiYzEyZjk2NA%2C%2C&amp;sid=mi_eshop&amp;_bannerBiz=mistore&amp;_qrsize=180&amp;_locale=en" data-lang="en" class="lang-select-li">English</a>|</li>
        <li><a href="https://static.account.xiaomi.com/html/faq/faqList.html" target="_blank">常见问题</a>|</li>
        <li><a id="msg-privacy" href="http://www.miui.com/res/doc/privacy/cn.html" target="_blank">隐私政策</a></li>
      </ul>
    </div>
    <p class="nf-intro">小米公司版权所有-京ICP备10046444-<a class="beian-record-link" target="_blank" href=""><span> <img src="./home/login/ghs.png"></span>京公网安备11010802020134号</a>-京ICP证110507号</p>
  </div>
  <div id="cookie-usage-notify" class="cookie_usage_notify">
  </div>
<script>
 //ajax提交token
 var _token = '{{csrf_token()}}';
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': _token
          }
      });
    // alert($);

      //提交事件
     $('#login-button').click(function(){
       // return false;
        var uname =$('#user').val();
        var pass = $('#pwd').val();
        var code = $('#pcode').val();

        //发送ajax
        $.post('/login/loguser',{"user":uname,"pwd":pass,"pcode":code},function(result){
           
              if(result.status == 0){
                $("#yhm").css('display','block');
                $("#yhm").html(result.message);
              } 

              if(result.status == 1){
                window.location.href = result.message;
              } 
              // return true;

        })        
        return false;
             
       })
          
   




</script>

<style>
﻿html,body,h1,h2,h3,h4,h5,h6,blockquote,p,pre,dl,dd,ol,ul,li,a,span,caption,th,td,form,fieldset,legend,input,button,textarea,address{margin:0;padding:0}*{padding:0;margin:0}h1,h2,h3,h4,h5,h6{font-size:100%}ol,ul{list-style:none}li{list-style:none}fieldset,img{border:0}address,cite,dfn,em,var{font-style:normal}code,kbd,pre,samp{font-family:courier new,courier,monospace}input,button,textarea,select{font-size:100%}input,button,select,textarea{outline:0}textarea{resize:none}table{border-collapse:collapse;border-spacing:0;empty-cells:show;font-size:inherit}abbr[title]{border-bottom:1px dotted;cursor:help}a,a:hover{text-decoration:none}a,label,:focus{outline:0 none}a,img,input{border:0 none}s{font-style:normal;text-decoration:none}body{font-size:14px;font-family:arial,"Hiragino Sans GB","Microsoft YaHei","微軟正黑體","儷黑 Pro",sans-serif}button,input,select,textarea{font-family:arial,"Hiragino Sans GB","Microsoft YaHei",sans-serif}input::-moz-placeholder,textarea::-moz-placeholder{color:#3b3b3b;font-weight:normal}::-webkit-input-placeholder{color:#3b3b3b;font-weight:normal}input:-ms-input-placeholder{color:#3b3b3b;font-weight:normal}::-ms-clear{display:none}::-ms-reveal{display:none}.clearfix:after{display:block;content:"\20";height:0;clear:both;overflow:hidden;visibility:hidden}.clearfix{*zoom:1}input::-ms-clear{display:none}input::-ms-reveal{display:none}input:-webkit-autofill{-webkit-box-shadow:0 0 0 1000px white inset}@media screen and (-ms-high-contrast:active),(-ms-high-contrast:none){a{background-color:transparent}}input{background:0;border:0 none}input[type="button"],input[type="submit"],input[type="reset"],a{-webkit-appearance:none;appearance:none}.fl{float:left}.fr{float:right}.nbg{background:none !important}.t_l{text-align:left}.t_c{text-align:center}.t_r{text-align:right}.c_b:before,.c_b:after{content:"";display:block}.c_b:after{clear:both}.c_b{zoom:1}.hidden,.hide{display:none}.hideimportant{display:none !important}.underline{text-decoration:underline}input[type=text]::-ms-clear,input[type=password]::-ms-reveal{display:none}input{color:#333}input:required,input:invalid{-moz-box-shadow:none;box-shadow:none}input::-moz-focus-inner{border:0}input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{-webkit-appearance:none;-moz-appearance:none;appearance:none;margin:0}input[type="number"]{-moz-appearance:textfield}input{color:#4a4a4a}::-webkit-input-placeholder{color:#9b9b9b}input:-ms-input-placeholder{color:#9b9b9b}html,body{height:100%}body{background:#f5f5f5;color:#757575}a{color:#757575}input{color:#333}::-webkit-input-placeholder{color:#9d9d9d}input:-ms-input-placeholder{color:#9d9d9d}.ercode,.icon_type5,.icon_arrow_down,.icon_error{ no-repeat}.btn_turn,.btn_mod_close,.icon_code_close{background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAALCAYAAACprHcmAAAABGdBTUEAALGPC/xhBQAAAJxJREFUGBl1kLEOgkAQRA9pVUKihTR2FBREPwD/v6ehsDYhoTBWVsAb5AguMMm7I7sz3O0FzrkYOnjDlg409ruxm7MrtKaI4g30w0EyPsAGZCzgBH+ygYUxnNm/fH8gAx2ZQgUNDJqbVVBAxjs84QWT/IC+oKOvUEICdgZKP9k72hm8z1mjbywCRzqrzzMmFFD/HLBcoIUatqR3jnolNxObIsWRIwAAAABJRU5ErkJggg==) no-repeat center center}.icon_select.icon_true{background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAAXNSR0IArs4c6QAAAk5JREFUOBGVlctrU1EQxn/3tqZVKxQRCirdWRRX4sKuK7j1GYoLN4JYULT6FwiuFSOiEf+A+iq6FwV3uhIXWqmugigVKT5iTUKa6zfn5CQ3MUnTgXPPa+Y7c+bMNzeihyRHGGWAcSJGnFpCkVUK0VN+dDOLOm0kx9lNhhmBTartFODWOuCyAD+rvaJCPprnQ7t9C2ACMdPMCuys2oRmCKxVpERNrcKi2l2Nb0WPNKpLQz3JCiLmHkOcYJhNQaFnX1YIysxzn9MCsmOcD94m5ryAjvUNZlZDim2GrLuVR/GAyVH2uGuawnrFbqMQubjL1qJkJ81occKN1/rEg5Bpi4jZ2iNKYpcagxxIXb475OgOuPIern6UpYCDmFvKCMOKXZ751Ajbvo8GWudbxuDyCxjbBd8+6QmqzX17WsNQzsbybHMjz4LK/izc/AVTF/zKyDaBPReYolJ4A7cPB81mb7kqAqT8bu6xIiJs2AjTOeWhPJ08Bdv3wpd3kDsEf7sSRf7V+EPCcgoOFp7B3Dm/lL0G4/tgaRGuH4Ti9xbVxsQwRM3YuOnoZAxIy8s78PCSVrTx86vApuD3UlqjOTZbT8mCY0pykhvKposK6v+SUWpWS62P0K61qoUVctEcsz4PS+KkcbOTVIq9wczG8zpvQwcYPWHBEb2kc9YrxmcViVB5vIcG8kDXLvNYTS71KeaAFQdVnGDRSBurFkmNM5R4K4X+y5ccCZXGQN2jBPTQu2IxLNBuBbbKa3mWd6EKRvW+I2DQafwCjE0mlrNr/AL+AbcOsj+c24+/AAAAAElFTkSuQmCC)}.icon_select.icon_true.disabled{background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyFpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDE0IDc5LjE1MTQ4MSwgMjAxMy8wMy8xMy0xMjowOToxNSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpBREFGNUQ3MzNENzExMUU4QTE5Njg2OEEyNzZGOTE2RSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpBREFGNUQ3NDNENzExMUU4QTE5Njg2OEEyNzZGOTE2RSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkFEQUY1RDcxM0Q3MTExRThBMTk2ODY4QTI3NkY5MTZFIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkFEQUY1RDcyM0Q3MTExRThBMTk2ODY4QTI3NkY5MTZFIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+qZxlBAAAAnpJREFUeNqcVEuLE0EQrulMHpsHZJPgSIh5YfQiouJJUVQQH3jYuwoevHvxIOhZvOSwoF68+RtUFkUWTx6UXfAggpCAEZIsSQwmJjt5+tWQ1p44E40NNV3TXfX1V91VpU2nUxqPx1QqlWg4HJLP56NAIEDNZnO/EOK8pmkHJpOJATsTehXyNpFIvOn3+98jkQjVajXSdZ2CwSAxlk7KgDENBoPDOOAONtcAtKLuswNLo9Eo4+CH0B9h2VRtbIAAuj4ajdahrjK428BBOTAsIqI1/N6AbUnuCf54PB42ugmwp9hcCKZGA/tTIPEC+r7ZQaRVKhVWTrbb7VcIYYX+YwBwMx6PX4pGo6ZotVo6HuD+MmDyLuUA07P4v+b1egkPKc5BTi8DBntiZwnKVwZSt8rlsk8g3Cv/CsZ3xCmSz+epUCjYQDEOgekRgYWjTo4s82sMkMvlKBwOc5g2G+BoYH6cX3nv/OsZhkG44F8OKlgoFKJer0cIzyoImRFsg0Q3hEwd1TGZTFI2m6VYLGYxcQJDAZBDegkOeef3nyDTNKlarVrG6XTaYpvJZP4AY1s7kqBOp7MjUIMf1BRgIK5PFtZTqRSHshBMKdttgUbwXAWUpzFLFh7dbtdqHm5gs/EZoO91JPZLGG1h4dg8aL1et8D4Gvgu3cCYkN/vfwxyuzqUXSzcRaE/4xydD4MBeXarbwZDYm/hEZ9YlcK9D7IBh3tODszqL82iBrmKdvaDk17IuoTTA5x0G5uDJZrCR8hlqJ/kO9guBZSLYHsR6mtOywVY3wBUBIEzmLddG6xsRQhzE+oJyAUk+0HMe2ad+Sv232HegM0Xp5N+CjAAy/VdPgbPs8EAAAAASUVORK5CYII=)}.icon_select{width:20px;height:20px;margin-top:-4px;margin-right:5px;display:inline-block;vertical-align:middle;background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAAXNSR0IArs4c6QAAAcxJREFUOBGdVb1qAkEQ9vYwiBcwXiyuiOGKEJLaIoHUh/U9RSxS5Ql8BIsUpsgLHAlCGhEby1xhnZ9CvBDQQs5IvEMQNPMdrviz/twt6O7OzPfN7O7MnBTbMiqVylEikThljB3CbDKZDEej0bdpmr+bYJJIUavVLjKZTCGZTF6nUqmTeDyuwm48HruDweDH9/23Xq9XzufzHyL8XFYsFplt2/etVuuTQFOKaLo6IIMONrC1LOtgTkALmW+gyOVyT5qm3em6rlFUMUlaPwBk0KXT6WNZlm/I4Vk2m31tNBpTzhXM8NbpdP5WI9q1b7fbHrBLZPV6/RJH2AXepAcW9w5Shj8Kv0BHPcc6ygAWjwgsQ2ooinJF6RGFK8AAi4wAF0OeITVED7CvB2DBEeQsgRSeZ/sSiOzAgQII7lBkEFUGQg8VEJWA48CB0mSoTZQTpQTXhZ6BBQe4AnCz2SyhnKIOYMEBsuAOXdd97Ha7X6FDmwGARbNYwqN8UEZho0S5Lpbe/JWr1WqJPD3Tb7jkacvGcRyfgnih+UFoho4Db2HaF1reItl6fyItmoWqqrebGqzneXa/3y8bhvG+SIa1kJAb8U8A7ZWZzNv1CfgHv1r3E9DWv4gAAAAASUVORK5CYII=)}.warning_white{background-image;vertical-align:top;margin-right:4px;width:26px;height:26px;display:inline-block}.icon_close{background;background-position:50% 50%;width:11px;height:11px;display:inline-block}.wrapper{width:100%;min-height:100%;height:auto;display:-webkit-box;display:box;display:-moz-box;display:-o-box;display:-ms-box;-webkit-box-align:center;-moz-box-align:center;-o-box-align:center;box-align:center;-webkit-box-pack:center;-moz-box-pack:center;-o-box-pack:center;box-pack:center}.wrap{padding-bottom:80px;padding-top:100px \9}@media screen and (min-width:0\0){.wrap{padding-top:100px}}.layout{background-color:#fff;width:854px;margin:0 auto 20px;position:relative;min-height:620px}.captcha_layout{min-height:700px}.ercode{width:68px;height:68px;position:absolute;right:0;top:0;opacity:.3;filter:alpha(opacity=30)}.ercode:hover,.ercode:focus{opacity:1;filter:alpha(opacity=100)}.header_tit{padding:50px 0 22px}.milogo{width:49px;height:48px;margin:0 auto;display:block}.header_tit_txt{font-size:30px;color:#424242;font-weight:normal;padding-top:22px}.lgn_inputbg{position:relative}.login_area{width:358px;margin:0 auto;padding-bottom:20px}.labelbox{display:block;margin-bottom:14px;border:1px solid #e0e0e0}.labelbox input{height:22px;line-height:22px;padding:13px 16px 13px 14px;display:block}.placehld{width:326px;padding:13px 16px 13px 14px}.country_list{cursor:pointer;display:none;float:left}.country_regin{max-width:80px;overflow:hidden;white-space:nowrap;-webkit-text-overflow:ellipsis;-moz-text-overflow:ellipsis;-o-text-overflow:ellipsis;text-overflow:ellipsis}.item_account{float:left;width:326px}.pwd_panel{position:relative}.country_regin{margin-right:8px}.country_code{padding-right:12px;position:relative}.icon_arrow_down{width:8px;height:5px;position:absolute;top:8px;right:0;background-position:-19px -69px}.eye_panel{display:none}.divflex .item_account{width:270px}.turn_area{display:none;height:11px;padding:18px 0 18px 10px;float:left}.btn_turn{width:11px;height:11px;display:block}.turn_off{display:none}.add_regioncode .item_account{width:236px}.add_regioncode .country_list{height:22px;line-height:22px;padding:13px 10px 13px 0;margin-left:10px;color:#333;border-right:1px solid #e0e0e0;display:block;overflow:hidden;position:relative}.add_regioncode .country_list span{display:inline-block;vertical-align:middle}.add_regioncode .turn_area{display:block}.add_regioncode .animation{position:relative;-webkit-animation:fade-in ease-in-out .5s;animation-name:fade-in;animation-timing-function:ease-in-out;animation-duration:.5s}.input_normal{width:100%}.lgncode{padding-bottom:14px}.lgncode .chkcode_img{*vertical-align:top}.code_label{float:left;*float:none;*display:inline-block;width:220px;margin-bottom:0}.code_label .code{width:190px}.code_label .placehld{width:190px}.chkcode_img{margin-left:10px;cursor:pointer}.btns_bg{padding-top:10px}.btnadpt{background-color:#ef5b00;width:100%;height:50px;line-height:50px;display:block;margin-bottom:14px;text-align:center;font-size:14px;color:#fff;cursor:pointer}.btnadpt.btn_gray{background:#fff;margin-top:10px;border:1px solid #ddd;color:#333}.btn_sns_icontype{background:url(https://account.xiaomi.com/static/res/166d6dc/account-static/respassport/acc-2014/img/icons_type.png);width:18px;height:18px;margin-right:10px;display:inline-block;vertical-align:middle}.btn_facebook{background-color:#3a5897}.btn_qq{background-color:#0288d1}.btn_weibo{background-color:#d32f2f}.btn_alipay{background-color:#0ae}.btn_weixin{background-color:#00d20d}.icon_default_qq{background-position:-19px 0}.icon_default_weibo{background-position:-38px 0}.icon_default_alipay{background-position:-57px 0;width:25px}.icon_default_weixin{background-position:-83px 0;width:24px}.other_login_type{padding-top:50px}.oth_type_tit{border-top:1px solid #e0e0e0;padding-top:10px;padding-bottom:10px\9}.oth_type_txt{font-size:14px;color:#b0b0b0;margin:0 auto;text-align:center;width:100% \9}@media screen and (min-width:0\0){.oth_type_tit{padding-bottom:0}.oth_type_txt{width:auto}}.oth_type_links{padding-top:10px;text-align:center}.icon_type{width:30px;height:30px;margin:0 12px;display:inline-block;-webkit-border-radius:50%;-moz-border-radius:50%;-o-border-radius:50%;border-radius:50%;-webkit-filter:grayscale(100%);-moz-filter:grayscale(100%);-ms-filter:grayscale(100%);-o-filter:grayscale(100%);filter:grayscale(100%);filter:url(https://account.xiaomi.com/static/res/e5c6b4e/account-static/respassport/acc-2014/sass/gray.svg#grayscale)}.icon_type:hover{-webkit-filter:grayscale(0);-moz-filter:grayscale(0);-ms-filter:grayscale(0);-o-filter:grayscale(0);filter:grayscale(0);filter:none}.icon_type .btn_sns_icontype{display:block;margin:4px auto 0}.icon_type .icon_default_alipay{margin-top:6px;margin-left:4px}.icon_type .icon_default_weixin{margin-top:6px}.other_panel{margin-top:-5px}.n_links_area{text-align:center;color:#e0e0e0}.n_links_area a{font-size:14px}.n_links_area a:hover{color:#ff6700}.n_links_area span{padding-left:5px}.sms_link{float:left;display:none}.sms_link .btnadpt.btn_gray{color:#ef5b00;border:0 none;height:auto;line-height:normal;margin:0}.zh_CN .sms_link,.zh_TW .sms_link,.en .sms_link{display:block}.zh_CN .n_links_area,.zh_TW .n_links_area,.en .n_links_area{float:right}.site_info{padding-top:10px}.site_info_txt{color:#ff6700}.site_info_link{padding:0 5px}.country-container{width:100%;background:#fff;border:1px solid #e8e8e8;position:absolute;left:0;top:61px;z-index:98;display:none}.btn_commom_cancel{display:none}.country-code{height:280px;overflow-x:hidden;overflow-y:auto}.country-code .header{background:#fcdecc;padding:0 10px;margin-bottom:6px;line-height:30px;color:#ef5b00}.country-code .record{padding:0 10px;line-height:39px;overflow:hidden;border-bottom:1px solid #e0e0e0;cursor:pointer}.country-code .record:hover{background:#eaeaea}.country-code .record span{height:39px;overflow:hidden}.country-code .record-country{float:left;max-width:74%;color:#000;cursor:pointer}.country-code .record-code{float:right;max-width:20%;color:#9d9d9d}.country-code .code_style1{background:#f2f6e9;border:1px solid #b7ce8b}.country-code .code_style2{background:#f8f2ec;border:1px solid #fac084}.country-code .code_style3{background:#f9eaeb;border:1px solid #fca1a7}.country-code .code_style4{background:#f2f2f2;border:1px solid #c9c9c9}.country-code .code_style5{background:#e1f6f6;border:1px solid #73bade}.navbar_panel{display:none}.countrycode-container-usual .header{display:none}.countrycode-container-usual .list{zoom:1;*padding-bottom:10px}.countrycode-container-usual .list:before,.countrycode-container-usual .list:after{content:"";display:block}.countrycode-container-usual .list:after{clear:both}.countrycode-container-usual .record{float:left;margin:0 0 10px 10px;padding:6px 10px;line-height:20px;-webkit-border-radius:4px;-moz-border-radius:4px;-o-border-radius:4px;border-radius:4px}.countrycode-container-usual .record span{height:20px}.countrycode-container-usual .record:hover{background:0}.countrycode-container-usual .record-country{max-width:100%}.countrycode-container-usual .record-code{max-width:100%;display:none}.n-footer{height:80px;margin-top:-80px;text-align:center}.nf-intro{padding:10px}.nf-link-area{text-align:center}.nf-link-area li{display:inline-block;*display:inline;*zoom:1}.nf-link-area a{display:inline-block;*display:inline;*zoom:1;padding:0 10px;color:#757575}.nf-link-area a:hover,.nf-link-area a.current{color:#333}.faq_link a{padding:0 10px}.ercode_area{background-color:#fff;width:854px;margin:0 auto;display:none;position:relative;z-index:98}.ercode_box{width:600px;height:400px;position:absolute;left:50%;top:50%;margin-top:-200px;margin-left:-300px}.code_close{background-color:#bdbdbd;-webkit-border-radius:50%;-moz-border-radius:50%;-o-border-radius:50%;border-radius:50%;width:30px;height:30px;position:absolute;right:20px;top:20px}.icon_code_close{width:14px;height:14px;display:block;margin:8px auto 0;cursor:pointer}.code_hd{padding-bottom:50px;text-align:center}.code_tit{font-size:30px;color:#ff6700;font-weight:normal;padding-bottom:10px}.code_iframe{text-align:center}.ercode_container{background:#fff}.na-img-area{width:80px;height:80px;border:2px solid #e3e3e3;border-radius:50%;padding:4px;background:#fff;position:relative;z-index:4;margin:0 auto}.na-img-bg-area{width:100%;height:100%;border-radius:50%;overflow:hidden}.na-img-bg-area:empty{background:url(https://account.xiaomi.com/static/res/7c3e9b0/passport/acc-2014/img/n-avator-bg.png) 0 0 no-repeat}.na-img-area img{display:block;width:100%;height:100%;border-radius:50%}.single_imgarea{text-align:center;line-height:20px;font-size:14px;color:#333}.single_imgarea .us_name{padding-top:10px}.single_imgarea .user_id{padding-top:10px;color:#666}.single_imgarea,.confirm_con{line-height:20px;font-size:14px;color:#333}.confirm_con{padding-top:15px}.confirm_con .txt{padding-bottom:5px}@-moz-document url-prefix(){.add_regioncode{width:100%;-moz-box-sizing:border-box;box-sizing:border-box}}.msk{width:100%;height:100%;background:#000;position:absolute;left:0;top:0;display:none;opacity:.4;filter:alpha(opacity=40)}.err_tip{margin-bottom:5px;line-height:20px;color:#f56700;display:none}.icon_error{background-position:0 -69px}.icon_error{width:14px;height:14px;margin:-1px 5px 0 0;overflow:hidden;display:inline-block;vertical-align:middle}.err_tip span{vertical-align:middle}.err_forbidden{padding:10px;border:1px solid #e0e0e0;line-height:1.5;background:#f5f5f5;color:#ff6700;display:none}.error_bg{border:1px solid #f56700 !important}@media only screen and (max-width:850px){.layout{width:100%;min-width:400px;min-height:480px}.mainbox{padding-bottom:15px}.header_tit{padding:25px 0 0}.header_tit_txt{font-size:22px;padding-top:15px}.btns_bg{padding-top:10px}.oth_type_links{padding-top:5px}}@-webkit-keyframes fade-in{from{left:-100%}to{left:0}}@-moz-keyframes fade-in{from{left:-100%}to{left:0}}@-o-keyframes fade-in{from{left:-100%}to{left:0}}@keyframes fade-in{from{left:-100%}to{left:0}}#getSMSCode.disabled,#getSMSCode.sending{color:#999;cursor:default}#getSMSCode{cursor:pointer;color:#003ab5}.code_panel{padding:15px 20px;color:#333;display:block;overflow:hidden;border-left:1px solid #e0e0e0;position:absolute;right:0;top:0;display:none}.ac-box{padding:80px 0 20px 0;margin:0 auto;width:400px}.chooseTips{padding:40px 0;font-size:16px;text-align:center}.box_tips{padding:40px 0;font-size:16px;text-align:center}.sms_login .country_list{cursor:default}.sms_login .btn_turn,.sms_login .eye_panel,.sms_login #manual_code,.sms_login .icon_arrow_down{display:none}.sms_login .pwd_panel input{width:210px}.code_label{border-right:1px solid #e0e0e0}.btnadpt.disabled{background-color:#ff936a;cursor:not-allowed}.btnadpt.btn_gray.disabled{color:#999;cursor:not-allowed}.tac{text-align:center}.ft16{font-size:16px}.ptb30{padding:30px 0}.blue{color:#32b5ff}@media screen and (-webkit-min-device-pixel-ratio:0){.login_user,.pwd_panel{display:box;display:-webkit-box;display:-moz-box}.login_user input,.pwd_panel input{-webkit-box-flex:1;-moz-box-flex:1;box-flex:1;flex-grow:1}.turn_area,.country_list,.item_account{float:none}.code_panel{position:static}}.agreeTip{margin-bottom:30px}.agreeTip .agreement_link,.agreeTip .privacy_link{font-weight:bold;text-decoration:underline}.oauth_box{width:358px;margin:0 auto;padding-bottom:30px}.oauth_box p{color:#4a4a4a;font-size:16px;margin:10px 0;overflow:hidden;white-space:nowrap;-webkit-text-overflow:ellipsis;-moz-text-overflow:ellipsis;-o-text-overflow:ellipsis;text-overflow:ellipsis}.scope_list{margin-bottom:10px}.scope_list li{color:#9b9b9b;font-size:14px;line-height:30px;overflow:hidden;white-space:nowrap;-webkit-text-overflow:ellipsis;-moz-text-overflow:ellipsis;-o-text-overflow:ellipsis;text-overflow:ellipsis}.icon_caret{display:block;margin:7px 0 0 5px;width:0;height:0;line-height:0;font-size:0;border-width:5px;border-style:solid;border-color:#9b9b9b transparent transparent transparent}.icon_caret.up{border-color:transparent transparent #9b9b9b transparent;margin:2px 0 0 5px}.search-code{padding:10px}.search-code-input{width:314px;height:22px;line-height:22px;padding:5px 10px 5px 10px;display:block;border:1px solid #e0e0e0}.search-mode .header,.search-mode .record{display:none}.search-mode .countrycode-container-usual .record,.search-mode .selected{display:block}.only_pwdlogin .ercode{display:none}.only_qrlogin .code_close,.only_qrlogin .code_hd{display:none}.only_qrlogin .ercode_box{width:auto;height:auto;position:static;margin:0;padding-top:100px\9}.only_qrlogin .ercode_pannel{width:100%;height:100%;display:-webkit-box;display:box;display:-moz-box;display:-o-box;display:-ms-box;-webkit-box-align:center;-moz-box-align:center;-o-box-align:center;box-align:center;-webkit-box-pack:center;-moz-box-pack:center;-o-box-pack:center;box-pack:center}@media screen and (min-width:0\0){.only_qrlogin .ercode_box{padding-top:100px}}.security_Controller{display:none}.checkbox_area{cursor:pointer}.checkbox{vertical-align:text-top;margin-right:3px}.security-controller-modal{width:400px;height:300px;left:50%;top:50%;margin-top:-150px;margin-left:-200px}.security_controller_panel{padding:30px 0 0 25px;line-height:22px}.security_controller_panel h4{color:#a1a1a1;padding-bottom:30px}.security_controller_panel p{color:#333}.security_controller_panel .tip_msg{color:#ff6700;padding:10px 0 0 30px}.tip_btns{padding-top:30px;text-align:center}.btn_tip{min-width:100px;_width:100px;height:33px;margin:0 2px;padding:0 10px;line-height:33px;text-align:center;display:inline-block;vertical-align:middle;cursor:pointer;-webkit-border-radius:4px;-moz-border-radius:4px;-o-border-radius:4px;border-radius:4px}.btn_commom{background:#ff6700;border:1px solid #ff6700;color:#fff}.labelbox .security_controller_chk{width:320px;margin:2px;padding:11px 16px 11px 14px;border:1px solid #e0e0e0}.pwd-object{margin-bottom:14px}.nav_tabs_panel{display:none}.tabs_con{display:none}.tabs_con.now{display:block}.bgiframe{width:100%;height:100%;position:absolute;display:none}.bgiframe iframe{height:100%}.win_banner_mistore{background:#fff}.win_banner_mistore .lgnheader,.win_banner_mistore .ercode{display:none}.win_banner_mistore .n-footer{background:#fff;margin-top:100px;position:relative;z-index:4}.win_banner_mistore .wrapper{display:block;min-height:auto}.win_banner_mistore .wrap{padding-bottom:0;position:relative;padding-top:0 \9}@media screen and (min-width:0\0){.win_banner_mistore .wrap{padding-top:0}}.win_banner_mistore .layout_panel,.win_banner_mistore .h_panel,.win_banner_mistore .login_banner{width:1130px;margin:0 auto}.win_banner_mistore .layout_panel{padding-top:130px}.win_banner_mistore .layout{width:410px;min-height:524px;margin-bottom:0;margin-right:0;font-size:14px;z-index:4}.win_banner_mistore .mainbox{padding-bottom:0}.win_banner_mistore .err_tip{color:#f56600}.win_banner_mistore .error_bg{border:1px solid #f56600 !important}.win_banner_mistore .sms_link .btn_gray.btnadpt{background-color:#fff}.win_banner_mistore .login_area{width:348px;padding-bottom:0}.win_banner_mistore .labelbox input{width:306px}.win_banner_mistore .code_label{width:200px}.win_banner_mistore .code_label .code{width:170px}.win_banner_mistore .lgncode{padding-bottom:0;margin-bottom:14px}.win_banner_mistore .h_panel .h_logo{width:200px;height:98px;background:url(https://account.xiaomi.com/static/res/7f6f2f5/account-static/respassport/acc-2014/img/mistore_logo.png) no-repeat}.win_banner_mistore .login_banner_panel{background:#1e2f40;width:100%;min-height:588px;position:absolute;left:0;top:0}.win_banner_mistore .lbnr,.win_banner_mistore .rbnr{width:50%;height:100%;position:absolute}.win_banner_mistore .lbnr{background-color:#fef6eb;left:0}.win_banner_mistore .rbnr{background-color:#ef625b;left:50%}.win_banner_mistore .login_banner{height:588px;background:url(https://account.xiaomi.com/static/res/ab2708c/account-static/respassport/images/banner.jpg) no-repeat top center;position:relative}.win_banner_mistore .bgiframe{display:block;z-index:3}.win_banner_mistore .oth_type_links{padding-top:3px}.win_banner_mistore .icon_type{margin:0 17px}.win_banner_mistore .loginbox{position:relative}.win_banner_mistore .other_login_type{padding-top:0;position:absolute;top:350px;width:100%}.win_banner_mistore .n_links_area{padding-top:0;color:#999}.win_banner_mistore .n_links_area a{color:#999}.win_banner_mistore .n_links_area a:hover{color:#f56600}.win_banner_mistore .oth_type_txt{color:#bbb}.win_banner_mistore .err_forbidden{margin-bottom:10px}.win_banner_mistore .search-code-input{width:294px}.win_banner_mistore .add_regioncode .item_account{width:212px}.win_banner_mistore .nav_tabs_panel{display:block}.win_banner_mistore .nav_tabs{padding:27px 0 24px;text-align:center;font-size:24px;color:#e0e0e0}.win_banner_mistore .nav_tabs a{color:#666}.win_banner_mistore .nav_tabs a:hover,.win_banner_mistore .nav_tabs a.now{color:#f56600}.win_banner_mistore .line{width:1px;height:24px;margin:0 35px 0 42px;border:1px solid #e0e0e0}.win_banner_mistore .tab_qrcon{text-align:center;padding-top:78px}.win_banner_mistore .custom_sub_txt{padding-top:14px;font-size:14px}.win_banner_mistore .custom_sub_txt span{padding:0 5px;color:#ff6700}.win_banner_youpin{background:#fff}.win_banner_youpin .lgnheader,.win_banner_youpin .ercode{display:none}.win_banner_youpin .n-footer{background:#fff;margin-top:100px;position:relative}.win_banner_youpin .wrapper{display:block;min-height:auto}.win_banner_youpin .wrap{padding-bottom:0;position:relative;padding-top:0 \9}@media screen and (min-width:0\0){.win_banner_youpin .wrap{padding-top:0}}.win_banner_youpin .layout_panel,.win_banner_youpin .h_panel,.win_banner_youpin .login_banner{width:1130px;margin:0 auto}.win_banner_youpin .layout_panel{padding-top:188px}.win_banner_youpin .layout{width:400px;min-height:524px;margin-bottom:0;margin-right:30px;font-size:14px}.win_banner_youpin .mainbox{padding-bottom:0}.win_banner_youpin .err_tip{color:#f56600}.win_banner_youpin .error_bg{border:1px solid #f56600 !important}.win_banner_youpin .login_area{width:338px;padding-bottom:0;color:#845f3f}.win_banner_youpin .labelbox{border:0 none;border-bottom:1px solid #845f3f;margin-bottom:10px}.win_banner_youpin .labelbox input{width:306px;color:#845f3f;font-size:16px}.win_banner_youpin .code_label{width:200px}.win_banner_youpin .code_label .code{width:170px}.win_banner_youpin .btnadpt{font-size:18px;-webkit-border-radius:4px;-moz-border-radius:4px;-o-border-radius:4px;border-radius:4px;background-color:#845f3f}.win_banner_youpin .sms_link .btn_gray.btnadpt{background-color:#fff}.win_banner_youpin .lgncode{padding-bottom:0;margin-bottom:14px}.win_banner_youpin .h_panel .h_logo{width:200px;height:98px; no-repeat}.win_banner_youpin .login_banner_panel{background:#1e2f40;width:100%;min-height:588px;position:absolute;left:0;top:0}.win_banner_youpin .lbnr,.win_banner_youpin .rbnr{width:50%;height:100%;position:absolute}.win_banner_youpin .lbnr{background-color:#fef6eb;left:0}.win_banner_youpin .rbnr{background-color:#ef625b;left:50%}.win_banner_youpin .login_banner{height:588px;background:url(https://account.xiaomi.com/static/res/ab2708c/account-static/respassport/images/banner.jpg) no-repeat top center;position:relative}.win_banner_youpin .bgiframe{display:block}.win_banner_youpin .btns_bg{padding-bottom:3px;padding-top:33px}.win_banner_youpin .oth_type_links{padding-top:3px}.win_banner_youpin .icon_type{margin:0 17px}.win_banner_youpin .loginbox{position:relative}.win_banner_youpin .oth_type_tit{border-top:1px solid #845f3f}.win_banner_youpin .other_login_type{position:absolute;top:350px;width:100%}.win_banner_youpin .n_links_area{padding-top:0;color:#845f3f}.win_banner_youpin .n_links_area a{padding:0 9px 0 6px;color:#845f3f}.win_banner_youpin .oth_type_txt{color:#845f3f}.win_banner_youpin .err_forbidden{margin-bottom:10px}.win_banner_youpin .search-code-input{width:294px}.win_banner_youpin .add_regioncode .item_account{width:212px}.win_banner_youpin .nav_tabs_panel{display:block}.win_banner_youpin .nav_tabs{padding:27px 0 24px;text-align:center;font-size:34px;color:#845f3f}#username[disabled=disabled]{color:#999}</style>
<a target="_blank"></a><div class="modal_container" style="display: none;"><div class="modal_msk"></div><div class="modal_tip mod_acc_tip security-controller-modal" id="modal-id-0" style="display: none;"><div class="modal_tip_flex"><div class="modal_tip_hd modal-header"><div class="external_logo_area"><a class="milogo" href="javascript:void(0)"></a></div><div class="modal-header-text modal_tip_title">提示</div><a href="javascript:void(0)" title="" class="modal-header-close btn_mod_close"><span>关闭</span></a></div><div class="modal_tip_bd modal-body"><div id="sect-controller-panel" class="security_controller_panel"><h4>您需要安装安全控件，才可使用安全登录。</h4><p>控件可对您的密码进行加密保护，提升账户安全性。</p><p>请点击“立即安装控件”按钮，并根据提示进行安装。</p><div class="tip_msg">完成安装后，请重新启动浏览器</div></div><div class="tip_btns"><a title="立即安装控件" href="https://account.xiaomi.com/static/res/0369340/account-static/static/mipay/XiaomiCtrl.exe" class="btn_tip btn_commom btn-action-controller">立即安装控件</a></div></div></div></div></div>

</body></html>