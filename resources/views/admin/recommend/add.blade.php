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
  


<form class="layui-form layui-form-pane" action="/admin/recommend" method="post" enctype='multipart/form-data' id="sub_form">

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 10px;">
  <legend>{{$title}}</legend>
</fieldset>
 
		  	<div class="layui-form-item">
			    <label class="layui-form-label" >商品名</label>
				    <div class="layui-input-block">
				      <input type="text" name="gname"  placeholder="请输入商品名" class="layui-input">
				    </div>
		  	</div>

		  	<div class="layui-form-item">
			    <label class="layui-form-label" >商品价格</label>
				    <div class="layui-input-block">
				      <input type="text" name="price"  placeholder="请输入商品价格" class="layui-input">
				    </div>
		  	</div>

		  	
		  	 <div class="layui-form-item">
			    <label class="layui-form-label">商品路径</label>
			    <div class="layui-input-block">

			      <select name="path"  lay-filter="aihao" >
			      	<option value="0">请选择</option>
			        @foreach($ref as  $k => $v)
			       
			        <option value="{{$v->tid}}">{{$v->tname}}</option>
			        
			       @endforeach
			      </select>
			    </div>
			     
			  </div>

  	
			<div class="box1">
				<label class="layui-form-label">商品图片</label>
                <div class="controls need-img">
                    <button type="button"  class="layui-btn layui-btn-primary" id="upload_img_icon">上传图片</button>
                    <div class="upload-img-box">
                    </div>
                </div>
        	</div> 

  
		  <div class="layui-form-item">
			    <label class="layui-form-label">商品状态</label>
			    <div class="layui-input">
			       <input type="radio" name="status" value="1" checked="" ><label>启用</label>
			       <input type="radio" name="status" value="2" ><label>禁止</label>
			    </div>
		  </div>
		  
		  <blockquote class="layui-elem-quote layui-text"></blockquote>
		  
		  <div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn" lay-submit="" lay-filter="*" id="sub_button">立即提交</button>
			    </div>
		  </div>
</form>



@endsection


@section('js')
<script>
	//路由地址
	var SCOPE = {
	'save_url' : '/admin/recommend',
	'jump_url' : '/admin/recommend',
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
                $('.upload-img-box').append('<div class="upload-icon-img"><div class="upload-pre-item"><i onclick="deleteImg($(this))" class="layui-icon"></i><img src="' + res.data + '" class="img" width="100" height="100" ><input type="hidden" name="icon" value="' + res.data + '" /></div></div>');
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

