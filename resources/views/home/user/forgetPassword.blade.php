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
                                小米账号安全验证
                            </h4>
                        </div>
                        <form action="/note" method="post" id="forgetpwd_form">
                            <div class="regbox">
                                <h5 class="n_tit_msg">
                                    为了保护账号安全,需要验证手机有效性
                                </h5>
                                <div class="inputbg">
                                    <div class="description">
                                        <p>
                                            <span class="send-ticket-tip">
                                                点击发送短信按钮，将会发送一条有验证码的短信至手机
                                            </span>
                                            <span class="ff6 verify-masked">
                                                135******95
                                            </span>
                                        </p>
                                        <p class="send-ticket-prompt">
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="err_tip error-tip-2">
                                <div class="dis_box">
                                    <em class="icon_error">
                                    </em>
                                    <span id="error-content-2">
                                    </span>
                                </div>
                            </div>
                            <div class="fixed_bot">
                                <input class="btn332 btn_reg_1" type="submit" id="submit" value="发送短信">
                            </div>
                            <div class="fixbottom">
                                <div class="t_c">
                                    <a href="javascript:void(0)" class="next_step verify-into-list" title="换用其他验证方式">
                                        换用其他验证方式
                                    </a>
                                </div>
                            </div>
                          {{csrf_field()}}    
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <style>
            .description { padding:10px 0 15px 0; padding-top: 10px; padding-right:
            0px; padding-bottom: 15px; padding-left: 0px; } .regbox{ padding-left:
            30px; } .fixbottom { width: 100%; padding-top: 20px; }
        </style>
        <script src="/home/reset/js/jquery-1.8.3.min.js">
        </script>
        <script src="/home/reset/js/placeholder.js">
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
<iframe id="postee" name="postee" style="display:none;" src="about:blank">
</iframe>