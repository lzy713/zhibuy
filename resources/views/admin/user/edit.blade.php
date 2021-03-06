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

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 10px;">
  <legend>{{$title}}</legend>
</fieldset>
 
<form class="layui-form" lay-filter="example" action="/admin/user/{{$res->id}}" method="post">
  <div class="layui-form-item">
    <label class="layui-form-label">用户名</label>
    <div class="layui-input-block">
      <input type="text" name="username" disabled lay-verify="required|username" placeholder="请输入用户名" value="{{$res->username}}" class="layui-input">
    </div>
  </div>

  
  <div class="layui-form-item">
    <label class="layui-form-label">手机号</label>
    <div class="layui-input-block">
      <input type="text"  name="phone"  autocomplete="off" placeholder="请输入手机号" value="{{$res->phone}}" class="layui-input">
    </div>
  </div>

  
  <div class="layui-form-item">
    <label class="layui-form-label">性别</label>
    <div class="layui-input-block" >
      <input   @if($res->sex == '男') checked  @endif  type="radio" name="sex" value="男" title="男" >
      <input   @if($res->sex == '女') checked  @endif  type="radio" name="sex" value="女" title="女">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">状态</label>
    <div class="layui-input-block">
       <input @if($res->status == '0') checked @endif type="radio" name="status" value="0"  ><label>启用</label>
       <input @if($res->status == '1') checked @endif type="radio" name="status" value="1" ><label>禁止</label>
    </div>
  </div>
  
  <blockquote class="layui-elem-quote layui-text"></blockquote>
  		

  		{{method_field('PUT')}}
  		
		  {{csrf_field()}}
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit="" lay-filter="demo1">修改</button>
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



