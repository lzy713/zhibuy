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
  

<form action="/admin/recommend/{{$req->id}}" method="post"  class="layui-form layui-form-pane" lay-filter="example" enctype="multipart/form-data">

  <div class="layui-form-item">

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 10px;">
  <legend>{{$title}}</legend>
</fieldset>
 

  <div class="layui-form-item">
    <label class="layui-form-label" >商品名称</label>
    <div class="layui-input-block">
      <input type="text" name="gname" value="{{$req->gname}}" placeholder="请输入推荐商品名" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label" >商品URL</label>
    <div class="layui-input-block">
      <input type="text" name="gurl" value="{{$req->gurl}}" placeholder="请输入推荐商品url" class="layui-input">
    </div>
  </div>

   <div class="layui-form-item">
    <label class="layui-form-label" >商品价格</label>
    <div class="layui-input-block">
      <input type="text" name="price" value="{{$req->price}}" placeholder="请输入推荐商品价格" class="layui-input">
    </div>
  </div>



  <div class="layui-form-item">
    <label class="layui-form-label">商品路径</label>
    <div class="layui-input-block">
 
      <select name="path"  lay-filter="aihao">
        @foreach($rec as  $k => $v)
       
        <option value="{{$v->tid}}">{{$v->tname}}</option>
        
       @endforeach
      </select>
    </div>
  
     
  </div>
   <div class="upload-img-box" style="margin-top: 20px;width: 300px;margin-left: 120px;">
                      @if($req->icon)
                      <div class="upload-icon-img"><div class="upload-pre-item"><img src="{{$req->icon}}" class="icon" width="100" height="100" ><input type="hidden" name="icon" value="{{$req->icon}}" /></div></div>
                       @endif  
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label" >商品图片</label>
    <div class="layui-input-block">
         <div class="controls need-img">
                  <button type="button" class="layui-btn" id="upload_img_icon">
                  <i class="layui-icon">&#xe67c;</i>上传图片
                  </button>
                 
           </div>
    </div>
  </div>

  
  <div class="layui-form-item">
    <label class="layui-form-label" >状态</label>
    <div class="layui-input">
       <input type="radio" name="status" value="1" @if($req->status == '1') checked  @endif   ><label>启用</label>
       <input type="radio" name="status" value="2" @if($req->status == '2') checked  @endif  ><label>禁止</label>
       
    </div>
  </div>
  
  <blockquote class="layui-elem-quote layui-text"></blockquote>
  
    {{method_field('PUT')}}
    {{csrf_field()}}

  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
    </div>
  </div>
</form>

  

@endsection


@section('js')


<script>

       
            //ajax提交token
             var _token = '{{csrf_token()}}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': _token
                }
            });

            layui.use(['element', 'form', 'upload', 'layer'], function(){
              var element = layui.element;
              var form = layui.form;
              var upload = layui.upload;
              var layer = layui.layer;
               
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
                    $('.upload-img-box').html('<div class="upload-icon-img"><div class="upload-pre-item"><img src="' + res.data + '" class="icon" width="100" height="100" ><input type="hidden" name="icon" value="' + res.data + '" /></div></div>');
                }
                ,error: function(){
                    layer.msg('上传错误！');
                }
            });


               //监听提交
              form.on('submit(formDemo)', function(data){
                layer.msg(JSON.stringify(data.field));
                return false;
              });

              @if(session('success')) 

              layer.msg('修改成功');
              
              @endif


            });


            
        

          </script>




@show
