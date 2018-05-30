@extends('layout.home')
@section('title',$title)

@section('content')
	
	<div class="grzxbj">
		<div class="selfinfo center">
				 @include('layout.user')

				<div class="rtcont fr">
					<form class="layui-form" action="/login/self_auth" method="post" enctype="multipart/form-data" id="sub_form">
						<div class="box1" style="margin-top: 40px;width: 300px;">
							<label class="layui-form-label">我的头像</label>

			                <div class="controls need-img">
			                	<button type="button" class="layui-btn" id="upload_img_icon">
								  <i class="layui-icon">&#xe67c;</i>上传图片
								</button>
			               

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
							      <input type="text" name="name" placeholder="请输入标题" value="{{$res->name}}" autocomplete="off" class="layui-input">
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
							      <input type="text" name="phone" value="{{$res->phone}}" placeholder="请输入标题"  class="layui-input">
							    </div>
							  </div>
								
								{{csrf_field()}}
							  <div class="layui-form-item">
							    <div class="layui-input-block">
							      <button id="baocun" class="layui-btn" type="submit" >保存</button>
							     
							    </div>
							  </div>

							</form>


				</div>
	<div class="clear"></div>
		</div>
	</div>			
	@endsection	  
		
	@section('js')
				
				<script>
						// $(element).slideUp()
						 
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
					          $('.upload-img-box').html('<div class="upload-icon-img"><div class="upload-pre-item"><img src="' + res.data + '" class="img" width="100" height="100" ><input type="hidden" name="img" value="' + res.data + '" /></div></div>');
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
					@endsection


	</body>
</html>
