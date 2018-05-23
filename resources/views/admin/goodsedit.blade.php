@extends('layout.admin')

@section('title',$title)

@section('content')




 <style type="text/css">

        .upload-icon-img{
            position: relative;
        }
        .upload-pre-item .img{
            margin-top: 5px;
            width: 116px;
            height: 76px;
        }
        .upload-pre-item i {
            position: absolute;
            cursor: pointer;
            top: 9px;
            right: 0px;
            background: #2F4056;
            padding: 2px;
            line-height: 15px;
            text-align: center;
            color: #fff;
            margin-left: 1px;
            /* float: left; */
            filter: alpha(opacity=80);
            -moz-opacity: .8;
            -khtml-opacity: .8;
            opacity: .8;
            transition: 1s;
        }
        .upload-pre-item i:hover{transform:rotate(360deg);}
        .upload-icon-img{ float: left; margin:5px 10px;}

    </style>

<div style="padding: 15px;">
      
        

           
            <!--内容-->
             <form class="layui-form" action="/admin/goods/goodsupdate/{{$into->gid}}" method="post" enctype="multipart/form-data">  
                 <div class="layui-inline" style="width:100%;">
                      <div class="layui-tab layui-tab-card">
                        
                        <ul class="layui-tab-title">
                          <li class="layui-this">信息</li>
                        </ul>
                        
                        <div class="layui-tab-content">
                          <!--tab1-->
                          <div class="layui-tab-item layui-show">
                            
                            <div class="layui-form-item">
                                <label class="layui-form-label">商品分类</label>
                                <div class="layui-input-inline">
                                  <select name="cid"  lay-filter="interest-search" lay-verify="required">
                                      <option value="0">请选择</option>

                                      @foreach($res as $k=>$v)
                                        <option value="{{$v->cid}}" @if($into->cid == $v->cid) selected @endif >{{$v->cname}}</option>
                                      @endforeach
                                        
                                    </select>
                                </div>
                            </div>

              <div class="layui-form-item">
                                <label class="layui-form-label">商品名称</label>
                                <div class="layui-input-block">
                                  <input type="text" name="gname" lay-verify="required|title" autocomplete="off" class="layui-input layui_inp_widht300" value="{{$into->gname}}">
                                </div>
                            </div>

                            
                            
                            
                            <div class="layui-form-item">
                                <label class="layui-form-label">商品价格</label>
                                <div class="layui-input-block">
                                  <input type="text" name="gprice" lay-verify="required|title" required placeholder="请输入标题" autocomplete="off" class="layui-input layui_inp_widht300" value="{{$into->gprice}}">
                                </div>
                            </div>

                            <div class="layui-form-item">
                                <label class="layui-form-label">商品库存</label>
                                <div class="layui-input-block">
                                  <input type="text" name="gstock" lay-verify="required|title" required placeholder="请输入标题" autocomplete="off" class="layui-input layui_inp_widht300" value="{{$into->gstock}}">
                                </div>
                            </div>

                            <div class="box1">
                              <label class="layui-form-label">商品图片</label>
                                <div class="controls need-img">
                                    <button type="button" class="layui-btn layui-btn-primary" id="upload_img">上传图片</button>
                                    <br>

                                      

                                      <div class="upload-img">
                                              
                                              <div class="upload-icon-img">
                                                <div class="upload-pre-item">
                                                  <i onclick="deleteImg($(this))" class="layui-icon" id="img1"></i>
                                                  <img src="{{$into->img}}" class="img" width="100" height="100"> 
                                                 <input type="hidden" name="img" value="{{$into->img}}">
                                                </div>
                                              </div>



                                      </div>
                                    </div>  
                                </div>
                            <br><hr>

                           

              <div class="box1">
                <label class="layui-form-label">商品组图</label>
                                <div class="controls need-img">
                                    <button type="button" class="layui-btn layui-btn-primary" id="upload_img_icon">上传图片</button> <br>
                            @foreach($img as $k=>$v)
                                    <div class="upload-icon-img" imgid='{{$v->id}}'>
                                      <div class="upload-pre-item">
                                          <i onclick="deleteImg($(this))" class="layui-icon"></i>
                                       
                                            <img src="{{$v->img}}" class="img" width="100" height="100"> 
                                        
                                            
                                      </div>
                                    </div>

                            @endforeach          
                                    <div class="upload-img-box">
                                    </div>
                                </div>
                            </div> 
                            
                            <br />
                
                              <!-- <div class="layui-form-item">
                               <label class="layui-form-label">商品图片</label>
                               <div class="layui-input-block">
                                 <input type="file" name="img[]" lay-verify="required|title" required placeholder="请输入标题" autocomplete="off" class="layui-input layui_inp_widht300" multiple>
                               </div>
                                                            </div>   -->

                              <div class="layui-form-item">
                                <label class="layui-form-label">详情图片</label>
                                <div class="layui-input-block">
                                  
                            <script id="content"  type="text/plain" name='content'  style="width:700px;height:500px;">{!!$into->content!!}</script> 
                                    
                                </div>
                            </div>

                            <div class="layui-form-item">
                                <label class="layui-form-label">商品描述</label>
                                <div class="layui-input-block">
                                  <input type="text" name="gdesc" lay-verify="required|title" required placeholder="请输入标题" autocomplete="off" class="layui-input layui_inp_widht300" value="{{$into->gdesc}}">
                                </div>
                            </div>

                            <div class="layui-form-item" pane>
                                <label class="layui-form-label">商品状态</label>
                                <div class="layui-input-block">

                                  <input type="radio" name="gstatus" value="1" title="新品" @if($into->gstatus == '1') checked @endif>
                                  <input type="radio" name="gstatus" value="2" title="在售" @if($into->gstatus == '2') checked @endif>
                                  <input type="radio" name="gstatus" value="3" title="下架" @if($into->gstatus == '3') checked @endif>

                            </div>
                                    
                            <div class="layui-form-item" pane>
                                <label class="layui-form-label">是否推荐</label>
                                <div class="layui-input-block">
                                  
                                <input type="radio" name="isrecom" value="1" title="是" @if($into->isrecom == '1') checked @endif>
                                <input type="radio" name="isrecom" value="2" title="否" @if($into->isrecom == '2') checked @endif>

                            </div>

                            <div class="layui-form-item">
                                <label class="layui-form-label">商品销量</label>
                                <div class="layui-input-block">
                                  <input type="text" name="salenum" lay-verify="required|title" required placeholder="请输入标题" autocomplete="off" class="layui-input layui_inp_widht300" value="{{$into->salenum}}">
                                </div>
                            </div>

                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                  {{csrf_field()}}
                                  <button class="layui-btn layui-btn-normal" lay-submit lay-filter="*">提交</button>
                                  <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                </div>
                            </div>
                          </div>
                          <!--tab1-->                          
                          
                        </div>
                      </div>
                    </div>
                    
                    
                </form>
        
        
        
    </div>



@endsection


@section('js')
<script>

  console.log($('#content'));

	//实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('content');


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


        //多图
        upload.render({ //上传图片
            elem: '#upload_img_icon',
            url: '/admin/upload/upimg',
            multiple: true, //是否允许多文件上传。设置 true即可开启。不支持ie8/9
            number:10,
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


       //单图
        upload.render({ //上传图片
            elem: '#upload_img',
            url: '/admin/upload/upimg',
            multiple: false, //是否允许多文件上传。设置 true即可开启。不支持ie8/9
            before: function(obj) {
                layer.msg('图片上传中...', {
                    icon: 16,
                    shade: 0.01,
                    time: 0
                })
            },  
            done: function(res) {
                layer.close(layer.msg());
                $('.upload-img').html('<div class="upload-icon-img"><div class="upload-pre-item"><i onclick="deleteImg($(this))" class="layui-icon"></i><img src="' + res.data + '" class="img" width="100" height="100" ><input type="hidden" name="img" value="' + res.data + '" /></div></div>');
            }
            ,error: function(){
                layer.msg('上传错误！');
            }
        });


}); 




    function deleteImg(obj,id){
        id = obj.parent().parent('.upload-icon-img').attr('imgid');
        obj.parent().parent('.upload-icon-img').remove();
        

        $.get("/admin/goods/delimg", { id: id} ); 

    }
</script>
@show