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
  


<form class="layui-form layui-form-pane" action="/admin/user" method="post">
  <div class="layui-form-item">

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 10px;">
  <legend>{{$title}}</legend>
</fieldset>
 
<form action=""  class="layui-form" action="" lay-filter="example">
  <div class="layui-form-item" >
    <label class="layui-form-label" class="layui-input">用户名</label>
    <div class="layui-input-block">
      <input type="text" name="username" lay-verify="required|username" placeholder="请输入用户名" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">密码</label>
    <div class="layui-input-block">
      <input type="password" name="password" placeholder="请输入密码" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">确认密码</label>
    <div class="layui-input-block">
      <input type="password" name="repass" placeholder="请确认密码" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">手机号</label>
    <div class="layui-input-block">
      <input type="text"  name="phone"  autocomplete="off" placeholder="请输入手机号" class="layui-input">
    </div>
  </div>


  <div class="layui-form-item">
    <label class="layui-form-label">性别</label>
    <div  class="layui-input">
      <input type="radio" name="sex" value="男" title="男" >
      <input type="radio" name="sex" value="女" title="女" >
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">状态</label>
    <div class="layui-input">
       <input type="radio" name="status" value="0" checked="" ><label>启用</label>
       <input type="radio" name="status" value="1" ><label>禁止</label>
    </div>
  </div>
  
  <blockquote class="layui-elem-quote layui-text"></blockquote>
  
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
//JavaScript代码区域
layui.use(['element', 'form'], function(){
  var element = layui.element;
  
});
</script>
@show
