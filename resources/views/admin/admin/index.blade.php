@extends('layout.admin')

@section('title',$title)

@section('content')
                
                <blockquote class="layui-elem-quote">
                    <!--面包屑-->
                     <span class="layui-breadcrumb m-right">
                      <a href="/admin/index">控制台</a>
                      <a href="/admin/admin">管理员管理</a>
                    </span>
                    <!--面包屑-->
                </blockquote>
              
                <!--返回 刷新 添加-->
                <hr class="layui-bg-gray">
                <a href="javascript:;" title="返回" onclick="javascript:window.history.go(-1)" class="layui-btn layui-btn-sm layui-btn-normal layui-icon">&#xe65c;</a>
                <a href="javascript:;" onclick="javascript:window.location.reload(true);" title="刷新" class="layui-btn layui-btn-sm layui-btn-normal layui-icon">&#x1002;</a>
                <a href="/admin/admin/create" class="layui-btn layui-btn-sm layui-btn-normal layui-icon">添加</a>
                <!--返回 刷新 添加-->

              <!--内容--> 
                 <form class="layui-form" action="" id="sub_form">  
                      <table class="layui-table">
                        <colgroup>
                          <col width="200">
                          <col width="200">
                          <col width="200">
                          <col width="200">
                          <col width="200">
                        </colgroup>
                        <thead>
                          <tr>
                            <th>用户名</th>
                            <th>角色</th>
                            <th>E-mail</th>
                            <th>状态</th>
                            <th>操作</th>
                          </tr> 
                        </thead>
                        <tbody>
                          
                          @foreach ($admins as $k=>$v)
                          <tr>
                            <td>{{$v->name}}</td>
                            <td>{{$v->role->name}}</td>
                            <td>{{$v->email}}</td>
                            <td>
                              <input type="checkbox" name="zzz" lay-skin="switch" lay-filter="switchTest" lay-text="有效|无效" value="{{$v->id}}" @if($v->getOriginal('status')==1) checked @endif >
                            </td>
                            <td>
                            <a href="/admin/admin/pass/{{$v->id}}" class="layui-btn layui-btn-xs">修改密码</a>
                            <a href="/admin/admin/{{$v->id}}/edit" class="layui-btn layui-btn-xs">编辑</a>
                            <a href="javascript:;" del='delete' del_id='{{$v->id}}' del_method='DELETE' class="layui-btn layui-btn-xs layui-bg-red">删除</a>
                            </td>
                          </tr>
                          @endforeach
                          

                        </tbody>
                      </table>
                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td>
                          <div id="demo2" style="margin:0 auto;"></div>
                        </td>
                        </tr>
                    </table>

                  </form>   

                  
              <!--内容-->
              

@endsection


@section('js')
<script>

//路由地址
var SCOPE = {
  'delete_url' : '/admin/admin',
  'jump_url' : '/admin/admin',
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

  form.on('switch(switchTest)', function(data){
    if(data.elem.checked===true){
       $.post('/admin/admin/status',{id:data.value,status:1},function(data){
          if(data.status==1){
            layer.msg(data.message);
          }
          else{
            layer.msg(data.message);
          }
       });
       
    }
    else{
      $.post('/admin/admin/status',{id:data.value,status:0},function(data){
       if(data.status==1){
            layer.msg(data.message);
          }
          else{
            layer.msg(data.message);
          }
       });
    }
  }); 
  
});
</script>
@show