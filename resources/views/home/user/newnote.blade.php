<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
        <title>
            小米帐号 -重置密码
        </title>
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
                        <div class="external_logo_area">
                            <a class="milogo" href="javascript:void(0)">
                            </a>
                        </div>
                        <div class="title-item t_c">
                            <h4 class="title_big30">
                                重置密码
                            </h4>
                        </div>
                    
                        <form action="passwordsucce" method="post">
						   <div id="regbox">
                              <div class="step3">
							    <dl style="margin-left: 228px;">
							        <dt>
							            <h4>
							                请重设您的帐号密码
							            </h4>
							        </dt>
							        <dd>
							            <div class="inputbg">
							                <!-- 错误添加class为err_label -->
							                <label class="labelbox" for="">
							                    <input id="pwd" name="newpwd" type="password" placeholder="请输入新密码" value="">
							                </label>

							                <p style="display: none;" id="mxd">请输入正确的密码</p>
							            </div>

							        </dd>
							        <dd>
							            <div class="inputbg">
							                <label class="labelbox">
							                    <input type="password" id="repwd" name="dsword" placeholder="请输入确认密码">
							                </label>
							                  <p style="display: none;" id="sdf">两次密码不一致</p>
							            </div>

							        </dd>
							    </dl>
							    
							    <div class="err_tip pwd_tip" id="pwd_tips" style="display:block;">
							        <div class="dis_box">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
							            <em class="icon_error">
							            </em>
							            <span style="margin-left: 228px;">
							                密码长度4~16位，数字、字母、字符至少包含两种
							            </span>
							        </div>
							    </div>
							    <div class="fixed_bot mar_phone_dis3">
							    	<button id="tjtj" class="btn332 btn_reg_1" type="submit">提交</button>
							        <!-- <input class="btn332 btn_reg_1" type="submit" value="提交"> -->
							    </div>
							</div>

							 <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                         </div>
                        </div>  
                      </form>
					
                    </div>
                </div>
            </div>
        </div>
        </div>

         <style>

        	.regbox{
			    width: 332px;
			    padding: 30px 0;
			    line-height: 20px;
			    margin-right: 120px;
			}

			.regbox {
			    margin: 0 auto;
			}


        </style>
        <script src="/home/reset/js/jquery-1.8.3.min.js"></script>
       <script>

       		$('#tjtj').click(function(){

       			var one = $('input[name=newpwd]').val();

       			var two = $('input[name=dsword]').val();

       			// console.log(one);

       			var reg = /^\w{4,16}$/;

       			if(!one){

       				  $('#mxd').css('color','red').show();

       				  return false;
       			}else if(!reg.test(one)){

       				   $('#mxd').css('color','red').show();

       				   return false;

       			}else if(one != two){

       					$('#sdf').css('color','red').show();
                
       					return false;

       			}

       			
       				

       			
       		})

       		

       </script>
       
        <style>
            .btn-action-go{ display:none;}
        </style>

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

    </body>

</html>
<!-- <script src="/home/resetjs/modal_lite.js"></script>
<script 
src="/home/resetjs/countrycode.js">
</script> -->
<iframe id="postee" name="postee" style="display:none;" src="about:blank">
</iframe>
