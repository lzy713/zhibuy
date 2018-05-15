@extends('layout.admin')

@section('title',$title)

@section('content')
                
                <blockquote class="layui-elem-quote">
                    <!--面包屑-->
                     <span class="layui-breadcrumb m-right">
                      <a href="/admin/index">控制台</a>
                    </span>
                    <!--面包屑-->
                </blockquote>
                
                

                <!--搜索-->
                <form class="layui-form" action="">
                        <div class="layui-row layui-col-space10">
                            <div class="layui-col-md2">
                              <select name="interest-search" lay-filter="interest-search" lay-search lay-write>
                                <option value=""></option>
                                <option value="0">写作</option>
                                <option value="1">阅读</option>
                                <option value="2">游戏</option>
                                <option value="3">音乐</option>
                                <option value="4">旅行</option>
                                <option value="5">读书</option>
                                </select>
                            </div>
                            <div class="layui-col-md2">
                              <input type="text" name="xxx " autocomplete="off" class="layui-input" placeholder="请输入关键词" >
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
                <a href="/menu/create" class="layui-btn layui-btn-sm layui-btn-normal layui-icon">添加</a>
                <!--返回 刷新 添加-->

              <!--内容--> 
                 <form class="layui-form" action="">  
                      <table class="layui-table">
                        <colgroup>
                          <col width="50">
                          <col width="150">
                          <col width="150">
                          <col width="200">
                          <col>
                        </colgroup>
                        <thead>
                          <tr>
                            
                            <th>用户名</th>
                            <th>真实姓名</th>
                            <th>密码</th>
                            <th>头像</th>
                            <th>性别</th>
                            <th>手机号</th>
                            <th>邮箱</th>
                            <th>状态</th>
                            <th>注册时间</th>
                            <th>备注</th>
                          </tr> 
                        </thead>
                        <tbody>
                          <tr>
                            <td>afsd</td>
                            <td>张三</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td> 
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                            <a href="javascript:;" class="layui-btn layui-btn-xs">修改</a>
                            <a href="javascript:;" class="layui-btn layui-btn-xs layui-bg-red">删除</a>
                            </td>
                          </tr>
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
//JavaScript代码区域
layui.use(['element', 'form'], function(){
  var element = layui.element;
  
});
</script>
@show