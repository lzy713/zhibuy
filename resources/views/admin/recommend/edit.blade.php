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
  

<form action="/admin/recommend/{{$req->id}}" method="post"  class="layui-form layui-form-pane" lay-filter="example">

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
    <label class="layui-form-label" >商品价格</label>
    <div class="layui-input-block">
      <input type="text" name="price" value="{{$req->price}}" placeholder="请输入推荐商品名" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">商品路径</label>
    <div class="layui-input-block">

      <select name="path"  lay-filter="aihao">
        @foreach($rec as  $k => $v)
       
        <option value="{{$v->tid}}">"{{$v->tname}}"</option>
        
       @endforeach
      </select>
    </div>
     
  </div>


  <div class="layui-form-item">
    <label class="layui-form-label" >商品图片</label>
    <div class="layui-input-block">
      <input type="text" name="icon" value="{{$req->icon}}" placeholder="请输入推荐商品名" class="layui-input">
    </div>
  </div>

  
  <div class="layui-form-item">
    <label class="layui-form-label" >状态</label>
    <div class="layui-input">
       <input type="radio" name="status" @if($req->status == '1') checked  @endif ) value="1"  ><label>启用</label>
       <input type="radio" name="status" @if($req->status == '2') checked  @endif ) value="2" ><label>禁止</label>
       
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



//JavaScript代码区域
layui.use(['element', 'form'], function(){
  var element = layui.element;
  
});



</script>
@show
