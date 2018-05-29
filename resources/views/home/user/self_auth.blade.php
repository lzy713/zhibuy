@extends('layout.user')
@section('title',$title)

@section('content')
	<div class="rtcont fr">
		<form class="layui-form" action="/login/self_auth" method="post" enctype="multipart/form-data" id="sub_form">
			<div class="box1" style="margin-top: 40px;width: 300px;">
				<label class="layui-form-label">我的头像</label>
	            <div class="controls need-img">
	            	<button type="button" class="layui-btn" id="test1">
					  <i class="layui-icon">&#xe67c;</i>上传图片
					</button>
	              
	                <div class="upload-img-box">
	                </div>
	            </div>
	    	</div> 
			<div class="layui-form-item" style="margin-top: 10px;width: 400px;">
			    <label class="layui-form-label">*昵称</label>
			    <div class="layui-input-block">
			    	<!-- required  lay-verify="required" -->
			     {{$res->username}}
			    </div>
			</div>
			<div class="layui-form-item" style="margin-top: 10px;width: 400px;">
			    <label class="layui-form-label">真实姓名</label>
			    <div class="layui-input-block">
			      <input type="text" name="title" placeholder="请输入标题" value="{{$res->name}}" autocomplete="off" class="layui-input">
			    </div>
			  </div>
			 
			<div class="layui-form-item">
			    <label class="layui-form-label">单选框</label>
			    <div class="layui-input-block">
			      <input type="radio"   name="sex" value="男" title="男" @if($res->sex =='男') checked @endif />
			      <input type="radio"  name="sex" value="女" title="女" @if($res->sex =='女') checked @endif />
			    </div>
			</div>
			 
			<div class="layui-form-item" style="margin-top: 10px;width: 400px;">
			    <label class="layui-form-label">电话号码</label>
			    <div class="layui-input-block">
			      <input type="text" name="title" value="{{$res->phone}}" placeholder="请输入标题"  class="layui-input">
			    </div>
			</div>
				
			{{csrf_field()}}
			<div class="layui-form-item">
			    <div class="layui-input-block">
			      <button id="baocun" class="layui-btn" lay-submit lay-filter="*"  lay-filter="formDemo">保存</button>
			    </div>
			</div>
		</form>
	</div>
	<div class="clear"></div>
@endsection

@section('js')
	<script>
		layui.use('upload', function(){
		  var upload = layui.upload;
		   
		  //执行实例
		  var uploadInst = upload.render({
		    elem: '#test1' //绑定元素
		    ,url: '/uploads/' //上传接口
		    ,done: function(res){
		      //上传完毕回调
		    }
		    ,error: function(){
		      //请求异常回调
		    }
		  });
		});


		//Demo
		layui.use('form', function(){
		  var form = layui.form;
		  
		  //监听提交
		  form.on('submit(formDemo)', function(data){
		    layer.msg(JSON.stringify(data.field));
		    return false;
		  });
		});

	</script>
@endsection

