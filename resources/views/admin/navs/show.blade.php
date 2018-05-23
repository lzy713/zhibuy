@extends('layout.admin')

@section('title',$title)

@section('content')




 <div style="padding: 15px;">
    	
            <blockquote class="layui-elem-quote">
                <!--面包屑-->
                 <span class="layui-breadcrumb m-right">
                  <a href="">控制台</a>
                  <a href="">产品</a>
                  <a><cite>列表</cite></a>
                </span>
                <!--面包屑-->
            </blockquote>
           
            <form class="layui-form" action="/admin/navs/show" method="get">
                <div class="layui-row layui-col-space10">
                    
                    <div class="layui-col-md2">
                      <input type="text" name="ntitle" autocomplete="off" class="layui-input" placeholder="请输入关键词" value="{{$ntitle}}">
                    </div>
                    <div class="layui-col-md1">
                      
                      <button class="layui-btn layui-btn-normal ss_css_but layui-icon" lay-submit lay-filter="*">&#xe615;</button>
                    </div>
                </div>
            </form>
            <hr class="layui-bg-gray">
            <a href="index.html" class="layui-btn normal layui-btn-sm layui-btn-normal layui-icon">&#xe654;</a>
            <button class="layui-btn layui-btn-sm  layui-bg-red layui-icon">&#xe640;</button>
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
                <td><input type="checkbox" name="" lay-skin="primary"></td>
                <th>栏目名称</th>
                <th>栏目地址</th>
                <th>创建时间</th>
                <th>操作</th>
              </tr> 
            </thead>
            <tbody>
            		@foreach($res as $k=>$v)
              <tr>
              
                <td><input type="checkbox" name="" lay-skin="primary"></td>
               	<td>{{$v->ntitle}}</td>
               	<td>{{$v->nurl}}</td>
               	<td>{{date('Y-m-d H:i:s', $v->ctime)}}</td>
                <td>	
                <a href="/admin/navs/edit/{{$v->id}}" title="编辑" class="layui-btn layui-btn-xs layui-icon">&#xe642;</a>
                <a href="/admin/navs/del/{{$v->id}}" title="删除" class="layui-btn layui-btn-xs layui-bg-red layui-icon">&#xe640;</a>
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
        
        
        
    </div>







@endsection

@section('js')
<script>
//JavaScript代码区域
layui.use(['element', 'form'], function(){
  var element = layui.element;
  
});
</script>
@show