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
  


<form class="layui-form layui-form-pane" action="/admin/notice" method="post">
  <div class="layui-form-item">

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 10px;">
  <legend>{{$title}}</legend>
</fieldset>
 
<form action=""  class="layui-form" action="" lay-filter="example">
  <div class="layui-form-item">
    <label class="layui-form-label" >公告名</label>
    <div class="layui-input-block">
      <input type="text" name="nname"  placeholder="请输入公告名" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">父级分类</label>
     <div class="layui-input-block">
          <select name="npid" lay-filter="aihao">
            <option value="0">请选择</option>
            @foreach($res as $k=>$v)
            <option value="{{$v->nid}}">{{$v->nname}}</option>
           @endforeach
          </select>
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
