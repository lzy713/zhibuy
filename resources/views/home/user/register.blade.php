<!DOCTYPE>
<html >

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title>{{$title}}</title>
<link href="/home/register/images/timg.ioc" type="image/x-icon" rel="shortcut icon"/>

  

<link type="text/css" rel="stylesheet" href="/home/register/css/base_1.css">
<link type="text/css" rel="stylesheet" href="/home/register/css/common-button_1.css">


<link rel="icon" href="#" type="image/x-icon">
<link rel="stylesheet" href="/home/register/css/a9f9af2c9a75472e8f26a4eb5e0c17bd.css"/>


<link rel="stylesheet" type="text/css" href="/home/register/css/register-gome_1.css"/>

<link rel="stylesheet" type="text/css" href="/home/register/css/drag_1.css">
   
<style>

#ftr .footer-link{ position:static}
#ftr .segments{ position:static}
#ftr .gome-website{ position:static}
#ftr .ico{ position:static; float:left; margin:2px 10px 0 0}
</style>
<style type="text/css">
 #gome-foot,#gome-foot-box {border:none;background:#fff;}



 </style>
 <style>
 .h_logo {
        width: 200px;
        height: 98px;
        background: url('/home/register/images/milogo.png') no-repeat;
        margin-top:50px;
       
        margin: 0 auto;
        margin-top: 15px;
        margin-right: auto;
        margin-bottom: 0px;
        margin-left: auto; 


    }

    .title_big30 {
        font-size: 30px;
        font-weight: normal;
        color: #333;
        margin: 0;
        padding: 0;


    }
    .t_c{
          text-align: center;
           margin-right: 110px; 

        }
    .reg-cont{
              border: 1px solid #E6E6E6;
              padding-bottom: 21px;
              margin-top: 28px;
              position: relative;

    }

    #gome-foot{
            text-align: center;
            margin-right: 110px; 
    }

       

</style>

 <script src="/home/register/js/jquery-1.8.3.min.js"></script>
</head>


<!-- 返利的导航 -->
<!--头部end--><!--newads-->
<!--newads-->




<div class="wbox">

      <div  style="width: 100%; height: 80px;">
        <div class="h_logo">
              
        </div>
      </div>
</div>

    <div  style="width: 100%; height: 40px;">
    <div id="wenzi" class="title-item t_c">
        <h4 class="title_big30">注册小米帐号</h4>          
     
    </div>
    </div>
   
</div>
<!--gome_head -->
<!--head-->

  <div class="M">
    <div class="register">
      <div class="reg-cont" >
        <p class="login-info">我已经注册，现在就<a href="/login">登录</a></p>
       
        <div class="form-list">
        <span style="position:absolute;left:150px;top:10px;font-family:simsun" id="couponAd"></span>
        
          <form id="registerForm" action="/regist" method="post">
           
           <!-- 用户名 -->
            <div class="reg-items items-1" id="nameDiv">
              <span class="reg-label">
                <label for="J_Name">用户名：</label>
              </span>
              <input id="name" maxlength="25" name="username" value="" tabindex="1" class="i-text"  type="text" >
              <div class="msg-box" >
               
                  <div id="nameFocusTips"> 
                    4-20个字符，支持汉字、字母、数字及“-”、“_”组合
                  </div>
                </div>
              </div>
            <!-- 密码 -->

            <div class="reg-items items-2" id="passwordDiv">
              <span class="reg-label">
                <label for="J_Pwd">设置密码：</label>
              </span>

              <input id="password" maxlength="20" onpaste="return false" name="password" value="" tabindex="2" class="i-text"  type="password" />
              
              <div class="msg-box" >
               
                  <div id="passwordTips"> 
                   *请输入4~16位密码
                  </div>
              </div>
              
            </div>
            
            <!-- 确认密码 -->
            <div class="reg-items items-3" id="confirmPasswordDiv">
              <span class="reg-label">
                <label for="J_Repwd">确认密码：</label>
              </span>
              <input id="confirmPassword" maxlength="20" onpaste="return false" name="confirmPassword" value="" tabindex="3" class="i-text text confirmPasswrod"  type="password" />

              <div class="msg-box" >
               
                  <div id="confirmPasswordTips"> 
                   *请再次输入密码
                  </div>
              </div>

             <!--  <div class="msg-box" id="confirmPasswordMsgbox">
                <div class="msg-weak" id="confirmPasswordTips"></div>
              </div> -->
            </div>
            
            
           <!-- 手机号码 -->
            <div class="reg-items items-4" id="mobileDiv">

              <span class="reg-label">
                <label for="J_Mobile">手机号码：</label>
              </span>
              <input id="mobile"  maxlength="11" name="phone" tabindex="3" class="i-text"  type="text" isClick="true"/>
               <div class="check" style="position:relative;left:0">
                      <button class="check-phone" href="javascript:void(0);" id="getVerifyCode" style="padding:11px 10px 14px 10px;*line-height:50px;width: 120px;">获取短信验证码</button>
                  
                 
                </div>


              <div class="msg-box" >
               
                  <div id="checkMobile"> 
                   *请输入手机号
                  </div>
              </div>
            </div> 


            <!-- 短信验证 -->

            <div class="reg-items" id="verifyCodeDiv">
                <span class="reg-label">
                  <label for="J_Repwd">短信验证码：</label>
                </span>
                <input  name="verifyCode" maxlength="6" value="" tabindex="4" class="i-text i-short" type="text">
               

                <div class="msg-box" >
               
                      <div id="reverifyCode"> 
                       *请输入验证码
                      </div>
                </div>

              </div>
               {{csrf_field()}}
         
            <div class="reg-items-btn mt35 clearfix">
                <input class="reg-btn" id="registerNow" value="立即注册" type="submit"/>
            </div>
              
            
          </form>


        </div>
      </div>
    </div>
  </div>
  
<script type="text/javascript">

      var AV; 
      var BV;
      var CV;
      var DV;
      var EV;
  
        //获取用户名文本框
        $('input[name=username]').focus(function(){

          $(this).css('border',' solid 2px lightblue');


        })

        //失去用户名文本框焦点
        $('input[name=username]').blur(function(){
          //获取用户输入的值
          var tv = $(this).val();

        //正则 4-20个字符，支持汉字、字母、数字及“-”、“_”组合  \u4e00-\u9fa5表示匹配中文，0-9 a-zA-Z _ \-分别匹配数字、大小写字母、_、-，{4,20},4-20位

          var reg = /^[\u4e00-\u9fa50-9a-zA-Z_\-]{4,20}$/;


          if(!tv){

            $('#nameFocusTips').text(' *用户名不能为空').css('color','red');

            // AV = false;

          }else if(!reg.test(tv)){

            $('#nameFocusTips').text(' *用户名格式不正确').css('color','red');

            // return false;

          }else {

            //发送ajax
            $.get('/register/checkuser',{name:tv},function(data){

                // console.log(data);
                if(data == '1'){
                    $('#nameFocusTips').text(' *用户名已存在').css('color','red');
                }else {
                    $('#nameFocusTips').text(' √').css('color','green');

                     AV = true;
                }
            });

          }
          

        })


        //获取设置密码框
        $('#password').focus(function(){

          $(this).css('border',' solid 2px lightblue');
        })


        //设置密码失去焦点
        $('#password').blur(function(){

          //获取输入的密码
          var  pv = $(this).val();

           //正则
          var reg = /^\w{4,16}$/;


          if(!pv){
             $('#passwordTips').text(' *密码不能为空').css('color','red');

              // BV = false;
          }else if(!reg.test(pv)){

              $('#passwordTips').text(' *密码名格式不正确').css('color','red');
          }else{
              $('#passwordTips').text(' √').css('color','green');

              BV = true;
          }

        })



        //获取确认密码
        $('#confirmPassword').focus(function(){

          $(this).css('border',' solid 2px lightblue');
        })

        //失去焦点与设置密码对比输入值是否相同
        $('#confirmPassword').blur(function(){

          //获取输入值
          var fv= $(this).val();

          //获取输入密码的值
          var pv = $('input[name=password]').val()

          if(!fv){
             $('#confirmPasswordTips').text(' *确认密码不能为空').css('color','red');

              // CV = false;
          }else if(fv != pv){
            $('#confirmPasswordTips').text(' *两次输入密码值不一致').css('color','red');

          }else{
            $('#confirmPasswordTips').text(' √').css('color','green');
            CV = true;
          }

        })

        

        //获取手机号文本框
        $('input[name=phone]').focus(function(){

          $(this).css('border',' solid 2px lightblue');

        })

        //失去焦点
        $('input[name=phone]').blur(function(){

          //获取值
          var pm = $(this).val();


          //正则/^((1[3,5,8][0-9])|(14[5,7])|(17[0,6,7,8])|(19[7]))\d{8}$/
          var reg = /((1[3,5,8,6][0-9])|(14[5,7])|(17[0,6,7,8])|(19[7]))\d{8}$/;

          if(!pm){
            $('#checkMobile').text(' *手机号码不能为空').css('color','red');

            // DV = false;

          }else if(!reg.test(pm)){

            $('#checkMobile').text(' *手机号码格式有误，请重新输入').css('color','red');

          }else {

             $('#checkMobile').text(' √').css('color','green');

              DV = true;

          }

        })


        //发送验证码一个单击事件
        $('#getVerifyCode').click(function(){

          var one = $('input[name=phone]').val();

          if(!one){
            // console.log(one);
             $('#checkMobile').text(' *手机号码不能为空').css('color','red');
             return false;
            
          }else{
             var dd = 61;

       
             var Info = setInterval(function(){

               
               if(!dd<=0){

                $('#getVerifyCode').text(--dd);

               }else{

                $('#getVerifyCode').text('获取短信验证码');
                clearInterval(Info);

               }

             },1000);




            
          }

          $.get('/register/checkphone',{yzm:one},function(data){

              console.log(data);
          })

          return false;

        })


       
       

       // console.log(time);

         //验证码
         $('input[name=verifyCode]').focus(function(){

          $(this).css('border',' solid 2px lightblue');

         })

         //失去焦点
         $('input[name=verifyCode]').blur(function(){

                var code = $(this).val();

                //发送ajax比较session输入的值是否相同
                $.get('/register/code',{cd:code},function(data){

                  // console.log(data);

                  // alert($);
                  if(!code){

                     $('#reverifyCode').text(' 验证码不能为空').css('color','red');

                      
                  }else if(data == '0'){

                    $('#reverifyCode').text(' *验证码不正确').css('color','red');

                  }else{

                    $('#reverifyCode').text(' √').css('color','green');

                    EV = true;

                  }

                })

         })

          //提交事件
                $('#registerNow').click(function(){


                  // alert($);

                 if( AV && BV && CV && DV && EV ){

                  return true;

                 }
                 
                  return false;
                 

                })




</script>

    
    
    
    
<div id="gome-foot">
    <div >
        <ul class="foot_small_zdy_w" style="margin-left: 180px;">
            <li><a data-code="1000043124-0" href="http://igome.com/" target="_blank" rel="nofollow" >小米集团</a></li>
            <li><a data-code="1000043124-1" href="//www.gomegj.com/" target="_blank" >小米管家</a></li>
            <li><a data-code="1000043124-2" href="//help.gome.com.cn/about/company.html" target="_blank" >关于小米</a></li>
            <li><a data-code="1000043124-3" href="//zp.gome.com.cn" target="_blank" >加入我们</a></li><li>|</li>
            <li><a data-code="1000043124-4" href="//brand.gome.com.cn/" target="_blank" >品牌大全</a></li>
            <li><a data-code="1000043124-5" href="//www.gome.com.cn/topic/" target="_blank" >商品专题</a></li>
            <li><a data-code="1000043124-6" href="//www.gome.com.cn/pifa/" target="_blank" >批发大全</a></li>
            <li><a data-code="1000043124-7" href="//www.gome.com.cn/hotwords/" target="_blank" >热词搜索</a></li>
            <li><a data-code="1000043124-8" href="//www.gome.com.cn/links/" target="_blank" >友情链接</a></li>
            <li><a data-code="1000043124-9" href="//news.gome.com.cn/4-8ef49f4b-1-8.html" target="_blank" >风险监测</a></li><li>|</li>
            <li><a data-code="1000043124-10" href="//cps.gome.com.cn/" target="_blank" >销售联盟</a></li>
            <li><a data-code="1000043124-11" href="//www.gome.com.cn/join/" target="_blank" >商家入驻</a></li>
            <li><a data-code="1000043124-12" href="//amp.gome.com.cn" target="_blank" >广告营销</a></li>
        </ul>
    <p>本公司游戏产品适合18岁以上成年人使用&nbsp;&nbsp;违法和不良信息举报电话：021-60766055&nbsp;&nbsp;<a class="interDrug" href="//gfs13.gomein.net.cn/T1cPYvBmYT1RCvBVdK.jpg" target="_blank">互联网药品信息服务资格证编号（京）-经营性-2013-0011</a></p>
    <p>小米在线电子商务有限公司&nbsp;&nbsp;办公地址:上海市嘉定区沪宜公路3163-3199号一楼A区&nbsp;&nbsp;客服电话:4008708708&nbsp;&nbsp;<a class="interDrug" href="//gfs10.gomein.net.cn/T1vZd_BTDv1RCvBVdK.jpg" target="_blank">经营证照</a></p>
        <p>©2000-2018&nbsp;&nbsp;小米在线电子商务有限公司版权所有&nbsp;&nbsp;京公安网备11010502027062&nbsp;&nbsp;沪ICP备11009419号&nbsp;&nbsp;沪B2-20120004号</p>
        <div class="gome-foot-credit" style="margin-left: 180px;">
            <a class="credit-baxx" href="https://www.sgs.gov.cn/lz/licenseLink.do?method=licenceView&entyId=dov73ne26zbqpugb8ivnfez35upwknav4n" target="_blank" rel="nofollow"><i></i><b>经营性网站备案信息</b></a>
            <a class="credit-xypj" href="https://ss.knet.cn/verifyseal.dll?sn=2011071100100011373&comefrom=trust" target="_blank" rel="nofollow"><i></i><b>可信网站信用评价</b></a>
            <a class="credit-cxwz" href="http://search.cxwz.org/cert/l/CX20111018000607000618" target="_blank" rel="nofollow"><i></i><b>诚信网站</b></a>
            <a class="credit-hdjc" href="http://www.bj.cyberpolice.cn/index.do" target="_blank" rel="nofollow"><i></i><b>朝阳网络警察</b></a>
            <a class="credit-wgdj" href="http://shwg.dianping.com/index.html" target="_blank" rel="nofollow"><i></i><b>网购大家评</b></a>
            <a class="credit-report" href="http://www.shjbzx.cn/" target="_blank" rel="nofollow"><i></i><b>上海市互联网违法和不良信息举报中心</b></a>
        </div>
        <em class="turst-gome"></em>
    </div>
</div>
<!--foot-->

<!--footerMinEnd-->
</body></html>