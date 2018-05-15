@extends('layout.admin')

@section('title',$title)

@section('content')
                
                <blockquote class="layui-elem-quote">
                    <!--面包屑-->
                     <span class="layui-breadcrumb m-right">
                      <a href="/admin/index">控制台</a>
                      <a href="/admin/role">角色管理</a>
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
                 <form class="layui-form" action="/admin/role" method="post" id="sub_form">  
                 <div class="layui-inline" style="width:100%;">
                      <div class="layui-tab layui-tab-card">
                        
                        <ul class="layui-tab-title">
                          <li class="layui-this">信息</li>
                        </ul>
                        
                        <div class="layui-tab-content">
                          <!--tab1-->
                          <div class="layui-tab-item layui-show">
                            
                            <div class="layui-form-item">
                                <label class="layui-form-label">角色名称</label>
                                <div class="layui-input-block">
                                  <input type="text" name="name" placeholder="请输入角色名称" autocomplete="off" class="layui-input layui_inp_widht300">
                                </div>
                            </div>

                            <div class="layui-form-item" pane>
                                <label class="layui-form-label">状态</label>
                                <div class="layui-input-block">
                                  <input type="radio" name="status" value="1" title="有效" checked>
                                  <input type="radio" name="status" value="0" title="无效" >
                                </div>
                            </div>


                            <div class="layui-form-item" pane="">
                            <label class="layui-form-label">栏目</label>
                            <div class="layui-input-block">
                              <input type="checkbox" name="like1[write]" lay-skin="primary" title="写作" checked="">
                              <input type="checkbox" name="like1[read]" lay-skin="primary" title="阅读">
                              <input type="checkbox" name="like1[game]" lay-skin="primary" title="游戏" disabled="">
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
  'save_url' : '/admin/role',
  'jump_url' : '/admin/role',
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