<!DOCTYPE html>
<!-- saved from url=(0041)https://item.mi.com/comment/10000097.html -->
<html lang="zh-CN" xml:lang="zh-CN">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="/js/jquery.min.js"></script>
        <script src="/layui/layui.js"></script>
        <script type="text/javascript" async="" src="/home/comments/mstr.js"></script>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <title>{{$title}}</title>
        <link rel="stylesheet" href="/layui/css/layui.css">
        <link rel="shortcut icon" href="https://s01.mifile.cn/favicon.ico" type="image/x-icon">
        <link rel="icon" href="https://s01.mifile.cn/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="/home/comments/base.min.css">
        <link rel="stylesheet" type="text/css" href="/home/comments/index.min.css">
        <script type="text/javascript" async="" src="/home/comments/xmst.js"></script>
		</head>
    
    <body>
        <div id="J_proHeader">
            <div class="xm-product-box nav-bar-hidden nav_fix" id="J_fixNarBar">
                <div class="nav-bar">
                    <div class="container J_navSwitch">
                        <h2 class="J_proName">{{$goods->gname}}</h2>
                        <div class="con">
                            <div class="right">
                                <a href="javascript:void(0);" class="cur" onclick="">用户评价</a>
                                <a href="/goodsdetails/{{$goods->gid}}" class="btn btn-small btn-primary" onclick="">立即购买</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-comment-wrap h-comment-wrap">
            @if($comments->isEmpty())
            <div class="container nocomment J_nocomment">该商品暂无评论</div>
            @else
            <div class="container J_commentWrap">
                <div class="row">
                    <div class="span13 h-comment-main  m-comment-main J_commentCon">
                        <div class="comment-top">
                            <h2 class="m-tit"></h2>
						</div>
                        <div class="m-comment-box J_commentList">
                            <ul class="m-comment-list J_listBody">

                                @foreach($comments as $k=>$v)
                                <li class="com-item J_resetImgCon J_canZoomBox">
                                    @if($v->users->img)
                                    <a class="user-img" href="" onclick="">
                                        <img src="{{$v->users->img}}" >
                                    </a>
                                    @else
                                    <a class="user-img" href="javascript:void(0)" onclick="">
                                        <img src="/home/comments/1.png">
                                    </a>
                                    @endif
                                    <div class="comment-info">
                                        <a class="user-name" href="" onclick="">{{$v->users->username}}</a>
                                        <p class="time">{{date('Y 年 m 月 d 日',$v->createtime)}}</p></div>
                                    <div class="comment-eval">
                                        <i class="iconfont"></i>超爱</div>
                                    <div class="comment-txt">{{$v->content}}</div>
                                    <div class="m-img-list clearfix h-img-list">
                                        @if($v->img)
                                        <div class="img-item img-item1 item-one showimg">
                                            <img class="J_resetImgItem J_canZoom" src="{{$v->img}}" style="width: 330px; margin-top: -128.333px;">
                                            <div class="loader loader-gray"></div>
                                        </div>
                                        @endif
                                        <div class="J_zoomImgList" style="display: none;">
                                            <span data-src="//i1.mifile.cn/a2/1526551940_6290091_s1080_1920wh.jpg"></span>
                                        </div>
                                    </div>
                                    <div class="comment-input">
                                        <input type="text" placeholder="回复楼主" class="J_commentAnswerInput">
                                        <a href="javascript:void(0);" class="btn  answer-btn J_commentAnswerBtn huifu" uid="{{$v->users->id}}" uname="{{$v->users->username}}" commentid="{{$v->id}}">回复</a>
                                    </div>
                                    <div class="comment-answer">
                                        @if(!empty($v->reply->content))
                                        <div class="answer-item">
                                            <img class="answer-img" src="/home/comments/logo.png">
                                            <div class="answer-content">
                                                <h3 class="official-name">官方回复</h3>
                                                <p>
                                                    {{$v->reply->content}}
                                                </p>
                                            </div>
                                        </div>
                                        @endif

                                        @foreach($v->ureply as $kk=>$vv)

                                        @if(!empty($vv->content))
                                        <div class="answer-item">

                                            @if($vv->users->img)
                                            <img class="answer-img" src="{{$vv->users->img}}">
                                            @else
                                            <img class="answer-img" src="/home/comments/1.png">
                                            @endif

                                            <div class="answer-content">
                                                <h3 class="official-name">{{$vv->users->username}}</h3>
                                                <p>
                                                    {{$vv->content}}
                                                </p>
                                            </div>
                                        </div>
                                        @endif

                                        @endforeach

                                    </div>
                                </li>
                                @endforeach
							</ul>
                        </div>
                    </div>
                    <div class="span7 h-comment-fr m-comment-spe">
                        <div class="m-comment-summary J_commentSummary">
                            <div class="num">
                                <p class="percent-num">
                                    <span class="m-num">266</span>人购买后满意</p></div>
                            <div class="m-percent-box">
                                <p class="percent" style="width:95.0%;">满意度 95.0%</p></div>
                        </div>
                        <h2 class="m-tit">最新评价</h2>
                        <ul class="m-spe-list J_speList">
                            @foreach($res as $k=>$v)
                            <li class="">
                                <div class="spe-top">
                                    <span class="time">{{date('Y 年 m 月 d 日 H 时',$v->createtime)}}</span>
                                    <a class="" href="javascript:void(0)" onclick="">- {{$v->users->username}}</a>
								</div>
                                <div class="txt">
                                    <a href="javascript:void(0)" target="_blank" onclick="">{{$v->content}}</a>
								</div>
                                <div class="comment-handler">
                                    <a href="javascript:void(0);" class="J_hasHelp" onclick="" cid="{{$v->id}}">
                                        <i class="iconfont"></i>&nbsp;
                                        <span class="amount">{{$v->num}}</span>
									</a>
                                </div>
                                <div class="comment-eval">
                                    <i class="iconfont"></i>超爱
								</div>
							</li>
                            @endforeach
						</ul>
                        
                    </div>
                </div>
            </div>
            @endif
        </div>

<script>
    var content = `
        <form class="layui-form" action="">
            <div class="layui-form-item layui-form-text" style="margin:30px auto;">
                <label class="layui-form-label">评价内容</label>
                <div class="layui-input-block" style="width:350px;">
                    <textarea name="desc" id="content" placeholder="请输入内容" class="layui-textarea"></textarea>
                </div>
            </div>
        </form>
    `;
</script>
<script>

 var _token = '{{csrf_token()}}';
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': _token
    }
});

    layui.use(['form','layer','upload'], function(){
        var form = layui.form
        ,layer = layui.layer
        ,upload= layui.upload;
          
        $('.huifu').click(function(){
            var text = $(this).prev().val();
            if (text == '') return;

            var cid = $(this).attr('commentid');
            var uid = $(this).attr('uid');
            var uname = $(this).attr('uname');
            var btn = $(this);

            $.post('/addUreply', {cid:cid,text:text,uid:uid}, function(data){
                if( typeof(data) == 'string'){
                    location.href = '/login';
                } else {
                    layer.alert('回复成功', {
                        skin: 'layui-ext-moon' //样式类名
                        ,closeBtn: 0
                        ,time:1500
                        ,offset: '180px'
                    });

                    btn.parent().next().append('<div class="answer-item"><img class="answer-img" src="/home/comments/1.png"><div class="answer-content"><h3 class="official-name">'+uname+'</h3><p>'+data['content']+'</p></div></div>');
                }

            });
             
        });

        form.on('submit(formDemo)', function(data){
            layer.msg(JSON.stringify(data.field));
            return false;
        });

    });

    $('.J_hasHelp').click(function(){
        var num = $(this).children().eq(1).text();
        num++;
        var cid = $(this).attr('cid');
        $(this).children().eq(1).text(num);

        $.post('/addnum/'+cid, {num:num}, function(data){

        });
    });
    
</script>

    </body>

</html>