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
  


<form class="layui-form layui-form-pane" action="/admin/evaluation" method="post" enctype='multipart/form-data' id="sub_form">

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 10px;">
  <legend>{{$title}}</legend>
</fieldset>
 
		  	<div class="layui-form-item">
			    <label class="layui-form-label" >测评产品名</label>
				    <div class="layui-input-block">
				      <input type="text" name="nname"  placeholder="请输入商品名" class="layui-input">
				    </div>
		  	</div>
		


			<div class="layui-form-item">
				<label class="layui-form-label">产品图片</label>
                <div class="controls need-img">
                    <button type="button" name="imgs" class="layui-btn layui-btn-primary" id="upload_img_icon">上传图片</button>
                    <div class="upload-img-box">
                    </div>
                </div>
        	</div> 

		  	
		  	 <div class="layui-form-item">
			    <label class="layui-form-label">测评描述</label>
			     <div class="layui-input-block">
				      <input type="text" name="desc"  placeholder="请输入描述信息" class="layui-input">
				 </div>
			     
			  </div>

  	
  
		  <div class="layui-form-item">
			    <label class="layui-form-label">产品状态</label>
			    <div class="layui-input">
			       <input type="radio" name="status" value="1" checked="" ><label>启用</label>
			       <input type="radio" name="status" value="2" ><label>禁止</label>
			    </div>
		  </div>
		  
		  <blockquote class="layui-elem-quote layui-text"></blockquote>
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
                $('.upload-img-box').append('<div class="upload-icon-img"><div class="upload-pre-item"><i onclick="deleteImg($(this))" class="layui-icon"></i><img src="' + res.data + '" class="img" width="100" height="100" ><input type="hidden" name="imgs" value="' + res.data + '" /></div></div>');
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

