<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
<title>小米帐号 -重置密码</title>

		<link type="text/css" rel="stylesheet" href="/home/reset/css/reset.css">
		<link type="text/css" rel="stylesheet" href="/home/reset/css/layout.css">
		<link type="text/css" rel="stylesheet" href="/home/reset/css/registerpwd.css">

	
</head>
<!-- 添加版本uLocale -->
<body class="zh_CN">
  
<div class="wrapper">
<div class="wrap">
  <div class="layout">  
  <div class="n-frame device-frame reg_frame">
    <div class="external_logo_area"><a class="milogo" href="javascript:void(0)"></a></div>
    <div class="title-item t_c">
      <h4 class="title_big30">重置密码</h4>
    </div>
    <form action="/forget" method="post" id="forgetpwd_form">
  
    <!-- 记得在此添加标记语言uLocale -->
    <div class="regbox">
      <h5 class="n_tit_msg">请输入注册小米帐号：</h5>      
      <div class="inputbg">
        <!-- 错误添加class为err_label -->
        <label class="labelbox labelbox-user" style="width: 300px;">
          <input type="text" name="username" id="user" autocomplete="off"  placeholder="小米帐号"  rule="(^[\w.\-]+@(?:[A-Za-z0-9]+(?:-[A-Za-z0-9]+)*\.)+[A-Za-z]{2,6}$)|(^1\d{10}$)|(^\d{3,}$)|(^\++\d{2,}$)">
         </label>
         <p style="display: none;" id="dsf">请输入用户名</p>
         <p style="display: none;" id="dsd">用户名格式不正确</p>
          @if (session('msgyhm'))
                <p>
                    {{ session('msgyhm') }}
                </p>
            @endif
      </div>	
      <div class="err_tip error-tip-1">
        <div class="dis_box">
          <em class="icon_error"></em>
          <span id="error-content"></span>
        </div>
      </div> 
			<div class="inputbg inputcode dis_box">
				<label class="labelbox labelbox-captcha" style="width: 150px;">
					<input id="code-captcha" class="code" type="text" name="icode" placeholder="图片验证码">
         
       
          <div style="width:130px; margin-top: -40px;margin-left: 190px;"><img src="/login/code" onclick="this.src = '/login/code/?a=' + Math.random()" style="height: 42px;"></div>
          </div>
     
           <p style="display: none;" id="ico">请输入验证码</p>
           <p style="display: none;" id="icd">验证码不正确</p>
            
            @if (session('msg'))
                <p>
                    {{ session('msg') }}
                </p>
            @endif



				</label>
			
			<div class="err_tip error-tip-2">
				<div class="dis_box"><em class="icon_error"></em><span id="error-content-2"></span></div>
			</div>
     		 {{csrf_field()}}
      <div class="fixed_bot">
        <input class="btn332 btn_reg_1" type="submit" id="submit_button" value="下一步">   
      </div>
    </div>
    </form>        
  </div>
  </div>
</div>
</div>
<div class="n-footer">
  <div class="nf-link-area clearfix">
  <ul class="lang-select-list">
    <li><a class="lang-select-li" href="javascript:void(0)" data-lang="zh_CN">简体</a>|</li>
    <li><a class="lang-select-li" href="javascript:void(0)" data-lang="zh_TW">繁体</a>|</li>
    <li><a class="lang-select-li" href="javascript:void(0)" data-lang="en">English</a></li>
    
      |<li><a class="a_critical" href="https://static.account.xiaomi.com/html/faq/faqList.html" target="_blank"><em></em>常见问题</a></li>
    
  </ul>
  </div>
  <p class="nf-intro"><span>小米公司版权所有-京ICP备10046444-<a class="beianlink beian-record-link" target="_blank"><span></span>京公网安备11010802020134号</a>-京ICP证110507号</span></p>
</div>
<style type="text/css">
  

    
</style>
<script src="/home/reset/js/jquery-1.8.3.min.js"></script>
<script src="/home/reset/js/placeholder.js"></script>
<script >
    $('#submit_button').click(function(){
            var res = $('#user').val();

            var red = $('#code-captcha').val();
            console.log(red);

         

            var reg = /^[\u4e00-\u9fa50-9a-zA-Z_\-]{4,20}$/;

            if(!res){
                $('#dsf').css('color','red').show();

                return false;

            }else if(!reg.test(res)){

             $('#dsf').css('color','red').hide();
             $('#dsd').css('color','red').show();
             return false;

            }

             if(!red){
              $('#dsd').css('color','red').hide();
              $('#ico').css('color','red').show();

              return false;

            }

              // return false;
    })

</script>


<style>
  .btn-action-go{ display:none;}
</style>


</body>
</html>
<!-- <script src="/home/resetjs/modal_lite.js"></script>
<script 
  src="/home/resetjs/countrycode.js">
</script> -->

<iframe id="postee" name="postee" style="display:none;" src="about:blank"></iframe>

