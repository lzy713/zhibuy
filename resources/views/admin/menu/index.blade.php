@extends('layout.admin')

@section('title',$title)

@section('content')
                
                <blockquote class="layui-elem-quote">
                    <!--面包屑-->
                     <span class="layui-breadcrumb m-right">
                      <a href="/admin/index">控制台</a>
                      <a href="/admin/menu">菜单管理</a>
                    </span>
                    <!--面包屑-->
                </blockquote>

                <!--搜索-->
                <form class="layui-form" action="/admin/menu" >
                        <div class="layui-row layui-col-space10">
                            <div class="layui-col-md2">
                              <input type="text" name="key" autocomplete="off" value="{{$key}}" class="layui-input" placeholder="请输入关键词" >
                            </div>
                            <div class="layui-col-md1">
                              <button class="layui-btn layui-btn-normal ss_css_but layui-icon" lay-submit lay-filter="*">&#xe615;</button>
                            </div>
                        </div>     
                </form>
                <!--搜索-->

                <!--返回 刷新 添加-->
                <hr class="layui-bg-gray">
                <a href="javascript:;" title="返回" onclick="javascript:window.history.go(-1)" class="layui-btn layui-btn-sm layui-btn-normal layui-icon">&#xe65c;</a>
                <a href="javascript:;" onclick="javascript:window.location.reload(true);" title="刷新" class="layui-btn layui-btn-sm layui-btn-normal layui-icon">&#x1002;</a>
                <a href="/admin/menu/create" class="layui-btn layui-btn-sm layui-btn-normal layui-icon">添加</a>
                <!--返回 刷新 添加-->

              <!--内容--> 
                 <form class="layui-form" action="" id="sub_form">  
                      <table class="layui-table">
                        <colgroup>
                          <col width="300">
                          <col width="300">
                          <col width="150">
                          <col>
                        </colgroup>
                        <thead>
                          <tr>
                            <th>菜单</th>
                            <th>URL</th>
                            <th>排序</th>
                            <th>操作</th>
                          </tr> 
                        </thead>
                        <tbody>
                          
                          @foreach ($res as $k => $v)
                          <tr>
                            <td>{{$v->title}}</td>
                            <td>{{$v->url}}</td>
                            <td>{{$v->listorder}}</td>
                            <td>
                           
                            <a href="/admin/menu/{{$v->id}}/edit" class="layui-btn layui-btn-xs">编辑</a>
                            <a href="javascript:;" del='delete' del_id='{{$v->id}}' del_method='DELETE' class="layui-btn layui-btn-xs layui-bg-red">删除</a>

                            @if ($v->pid == 0)
                            <a href="/admin/menu/create?id={{$v->id}}" class="layui-btn layui-btn-xs">添加子菜单</a>
                            @endif
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
  'delete_url' : '/admin/menu',
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
  
});
</script>
@show