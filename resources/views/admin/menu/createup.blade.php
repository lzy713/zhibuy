@extends('layout.admin')

@section('title',$title)

@section('content')
                
                <blockquote class="layui-elem-quote">
                    <!--面包屑-->
                     <span class="layui-breadcrumb m-right">
                      <a href="/admin/index">控制台</a>
                      <a href="/admin/menu">菜单管理</a>
                      <a><cite>添加</cite></a>
                    </span>
                    <!--面包屑-->
                </blockquote>
                
                
                <!--返回 刷新 添加-->
                <hr class="layui-bg-gray">
                <a href="javascript:;" title="返回" onclick="javascript:window.history.go(-1)" class="layui-btn layui-btn-sm layui-btn-normal layui-icon">&#xe65c;</a>
                <a href="javascript:;" onclick="javascript:window.location.reload(true);" title="刷新" class="layui-btn layui-btn-sm layui-btn-normal layui-icon">&#x1002;</a>
                <!--返回 刷新 添加-->

              <!--内容--> 
                 <form class="layui-form" action="/admin/menu" method="post" id="sub_form">  
                 <div class="layui-inline" style="width:100%;">
                      <div class="layui-tab layui-tab-card">
                        
                        <ul class="layui-tab-title">
                          <li class="layui-this">信息</li>
                        </ul>
                        
                        <div class="layui-tab-content">
                          <!--tab1-->
                          <div class="layui-tab-item layui-show">
                            
                             <div class="box1">
                                <div class="controls need-img">
                                    <button type="button" class="layui-btn layui-btn-primary" id="upload_img_icon">上传图片</button>
                                    <div class="upload-img-box">
                                    </div>
                                </div>
                            </div> 
                                 
                            

                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                	  
                                  <button class="layui-btn layui-btn-normal" lay-submit lay-filter="*" id="sub_button">提交</button>
                                  <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                </div>
                            </div>
                          </div>
                          <!--tab1-->                          
                          
                        </div>
                      </div>
                    </div>
                    
                    
                </form> 
              <!--内容-->


@endsection


@section('js')
<script>

//路由地址
var SCOPE = {
	'save_url' : '/admin/menu',
	'jump_url' : '/admin/menu',
	}


//ajax提交token
 var _token = '{{csrf_token()}}';
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': _token
    }
});


//JavaScript代码区域
layui.use(['element', 'form', 'upload', 'layer'], function(){
  var element = layui.element;
  var form = layui.form;
  var upload = layui.upload;
  var layer = layui.layer;


  upload.render({ //上传图片
            elem: '#upload_img_icon',
            url: '/admin/upload/upimg',
            multiple: true, //是否允许多文件上传。设置 true即可开启。不支持ie8/9
            before: function(obj) {
                layer.msg('图片上传中...', {
                    icon: 16,
                    shade: 0.01,
                    time: 0
                })
            },
            done: function(res) {
                layer.close(layer.msg());
                $('.upload-img-box').append('<div class="upload-icon-img"><div class="upload-pre-item"><i onclick="deleteImg($(this))" class="layui-icon"></i><img src="' + res.data + '" class="img" width="100" height="100" ><input type="hidden" name="icon[]" value="' + res.data + '" /></div></div>');
            }
            ,error: function(){
                layer.msg('上传错误！');
            }
        });
  




});

    function deleteImg(obj){
        obj.parent().parent('.upload-icon-img').remove();
    }
</script>
@show