@extends('layout.admin')

@section('title',$title)

@section('content')
                
                <blockquote class="layui-elem-quote">
                    <!--面包屑-->
                     <span class="layui-breadcrumb m-right">
                      <a href="/admin/index">控制台</a>
                      <a href="/admin/menu">菜单管理</a>
                      <a><cite>添加</cite></a>
                    </span>
                    <!--面包屑-->
                </blockquote>
                
                
                <!--返回 刷新 添加-->
                <hr class="layui-bg-gray">
                <a href="javascript:;" title="返回" onclick="javascript:window.history.go(-1)" class="layui-btn layui-btn-sm layui-btn-normal layui-icon">&#xe65c;</a>
                <a href="javascript:;" onclick="javascript:window.location.reload(true);" title="刷新" class="layui-btn layui-btn-sm layui-btn-normal layui-icon">&#x1002;</a>
                <!--返回 刷新 添加-->

              <!--内容--> 
                 <form class="layui-form" action="/admin/menu" method="post" id="sub_form">  
                 <div class="layui-inline" style="width:100%;">
                      <div class="layui-tab layui-tab-card">
                        
                        <ul class="layui-tab-title">
                          <li class="layui-this">信息</li>
                        </ul>
                        
                        <div class="layui-tab-content">
                          <!--tab1-->
                          <div class="layui-tab-item layui-show">
                            
                            
                            
                            <div class="layui-form-item">
                                <label class="layui-form-label">所属菜单</label>
                                <div class="layui-input-inline layui_inp_widht300">
                                  <select name="pid" lay-verify="required">
                                      <option value="0">根菜单</option>
                                      @foreach ($res as $k=>$v)
                                      @if($v->pid == 0)
                                      <option value="{{$v->id}}" @if ($v->id==$id) selected @endif>|--{{$v->title}}</option>
                                      @endif
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="layui-form-item">
                                <label class="layui-form-label">菜单名</label>
                                <div class="layui-input-block">
                                  <input type="text" name="title" placeholder="请输入栏目名称" autocomplete="off" class="layui-input layui_inp_widht300">
                                </div>
                            </div>

                            <div class="layui-form-item">
                                <label class="layui-form-label">路由地址</label>
                                <div class="layui-input-block">
                                  <input type="text" name="url" placeholder="请输入URL" autocomplete="off" class="layui-input layui_inp_widht300">
                                </div>
                            </div>
                            
                          	<div class="layui-form-item">
                                <label class="layui-form-label">排序</label>
                                <div class="layui-input-block">
                                  <input type="text" name="listorder" autocomplete="off" value="{{$order}}" class="layui-input layui_inp_widht300">
                                </div>
                            </div>

                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                	
                                  <button class="layui-btn layui-btn-normal" lay-submit lay-filter="*" id="sub_button">提交</button>
                                  <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                </div>
                            </div>
                          </div>
                          <!--tab1-->                          
                          
                        </div>
                      </div>
                    </div>
                    
                    
                </form> 
              <!--内容-->


@endsection


@section('js')
<script>

//路由地址
var SCOPE = {
	'save_url' : '/admin/menu',
	'jump_url' : '/admin/menu',
	}


//ajax提交token
 var _token = '{{csrf_token()}}';
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': _token
    }
});


//JavaScript代码区域
layui.use(['element', 'form'], function(){
  var element = layui.element;
  var form = layui.form;
  

  form.on('submit(*)', function(data){
	  return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
	});



});
</script>
@show