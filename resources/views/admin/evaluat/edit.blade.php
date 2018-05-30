@extends('layout.admin')



@section('title',$title)



@section('content')
<blockquote class="layui-elem-quote layui-text" target="_blank">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</blockquote>
  


<form class="layui-form layui-form-pane" action="/admin/evaluation/{{$ref->nid}}" method="post" enctype='multipart/form-data' id="sub_form">

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 10px;">
  <legend>{{$title}}</legend>
</fieldset>
   
        <div class="layui-form-item">
          <label class="layui-form-label" >测评产品名</label>
            <div class="layui-input-block">
              <input type="text" name="nname" value="{{$ref->nname}}"  placeholder="请输入商品名" class="layui-input">
            </div>
        </div>

      

       <div class="upload-img-box" style="margin-top: 20px;width: 300px;margin-left: 120px;">
                      @if($ref->imgs)
                      <div class="upload-icon-img"><div><img src="{{$ref->imgs}}" class="icon" width="100" height="100" ><input type="hidden" name="imgs" value="{{$ref->imgs}}" /></div></div>
                      @endif

      </div>


      <div class="layui-form-item">
        <label class="layui-form-label">产品图片</label>
                <div class="controls need-img">
                    <button type="button" name="imgs" class="layui-btn layui-btn-primary" id="upload_img_icon">上传图片</button><hr/>

                </div>
                   
             <div class="layui-form-item">
                  <label class="layui-form-label">详情图片</label>
                    <div class="layui-input-block">            
                    <script id="content"  type="text/plain" name='content'  style="width:700px;height:500px;">{!!$ref->content!!}</script> 

                                    
                </div>
          </div> 

  
         <div class="layui-form-item">
          <label class="layui-form-label">商品描述</label>
           <div class="layui-input-block">
              <input type="text" name="desc" value="{{$ref->desc}}"  placeholder="请输入商品信息" class="layui-input">
         </div>
           
        </div>

    
  
      <div class="layui-form-item">
          <label class="layui-form-label">产品状态</label>
          <div class="layui-input">
             <input type="radio" name="status" value="1"  @if($ref->status == '1')  checked @endif ><label>启用</label>
             <input type="radio" name="status" value="2"  @if($ref->status == '2')  checked @endif ><label>禁止</label>
          </div>
      </div>
      
      <blockquote class="layui-elem-quote layui-text"></blockquote>
          {{method_field('PUT')}}
          {{csrf_field()}}
      <div class="layui-form-item">
          <div class="layui-input-block">
            <button class="layui-btn" type="sbumit">立即提交</button>
          </div>
      </div>

</form>


@endsection


@section('js')
<script>
  //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('content');


  //路由地址
  var SCOPE = {
  'save_url' : '/admin/evaluation',
  'jump_url' : '/admin/evaluation',
  }


  //ajax提交token
  var _token = '{{csrf_token()}}';
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': _token
      }
  });

  //JavaScript代码区域
  layui.use(['element', 'form','upload','layer'], function(){
    var element = layui.element;
    var form = layui.form;
    var upload = layui.upload;
    var layer = layui.layer;

    form.on('submit(*)', function(data){
      return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
    });

    //单图上传
    upload.render({ //上传图片
            elem: '#upload_img_icon',
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
                $('.upload-img-box').html('<div class="upload-icon-img"><div class="upload-pre-item"><i onclick="deleteImg($(this))" class="layui-icon"></i><img src="' + res.data + '" class="img" width="100" height="100" ><input type="hidden" name="imgs" value="' + res.data + '" /></div></div>');
            }
            ,error: function(){
                layer.msg('上传错误！');
            }
        });

  });



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


  function deleteImg(obj,id){
        id = obj.parent().parent('.upload-icon-img').attr('imgid');
        obj.parent().parent('.upload-icon-img').remove();


    }


</script>

@show

