@extends('layout.home')
@section('title',$title)

	@section('content')
	<div class="grzxbj">
		<div class="selfinfo center">
				 @include('layout.user')

		<div class="rtcont fr">

		@if (count($errors) > 0)
    		<div class="mws-form-message error">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li style='color:blue;font-size:17px;list-style:none'>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

		<form class="layui-form" action="/login/safe_auth" id="sub_form">
  				<div class="layui-form-item" style="margin-top: 10px;width: 400px;">
				    <label class="layui-form-label">修改密码</label>
				    <div class="layui-input-block">
				   </div>
				  </div>
				  <div class="layui-form-item" style="margin-top: 10px;width: 400px;">
				    <label class="layui-form-label">原密码</label>
				    <div class="layui-input-block">
				      <input type="password" name="ypass" placeholder="输入原密码" value="" autocomplete="off" class="layui-input">
				    </div>

				    <p id="tishi" style="color: red;margin-left: 110px;">{{session('msg')}}</p>


				  </div>
				   <div class="layui-form-item" style="margin-top: 10px;width: 400px;">
				    <label class="layui-form-label">新密码</label>
				    <div class="layui-input-block">
				      <input id="xpassword"  type="password" name="xpass" value="" placeholder="输入新密码"  class="layui-input">
				    </div>
				    <span style="display: none;margin-left: 110px;"  id="mxd">新密码不能为空</span>
				    <span style="display: none;margin-left: 110px;"  id="sdf">请输入正确的密码格式</span>
				  

				    <div class="layui-form-item" style="margin-top: 10px;width: 400px;">
				     <div class="layui-input-block">
				      <input id="cf" type="password" name="repass" value="" placeholder="重复新密码"  class="layui-input">

						<span style="margin-top: 10px;">密码长度4~16位，数字、字母、下划线_</span>
				    </div>
				    <span style="display: none;margin-left: 110px;"  id="mmm">两次密码不一致</span><br>
				       
				  

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
		<script >
					

       		$('#baocun').click(function(){

       			// var ypass = $('input[name=ypass]').val();	

       			var xpass = $('input[name=xpass]').val();

       			var repass = $('input[name=repass]').val();

       			// console.log(xpass,repass);

       			var reg = /^\w{4,16}$/;

       			if(!xpass){

       				  $('#mxd').css('color','red').show();

       				  return false;
       			}else if(!reg.test(xpass)){

       				// alert($);

       					$('#mxd').css('color','red').hide();

       				   $('#sdf').css('color','red').show();

       				   return false;

       			}

       			if(xpass != repass){
       					$('#mmm').css('color','red').show();
       					// alert($);

       					return false;

       			}

       			
       				
       			//return false;
       			
       		})

					

					
					
				</script>
				
				@endsection
				

	</body>
</html>

