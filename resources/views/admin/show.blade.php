@extends('layout.admin')

@section('title',$title)

@section('content')


	<form class="layui-form" action="">
                    <div class="layui-row layui-col-space10">
                        
                        <div class="layui-col-md2">
                          <input type="text" name="xxx " autocomplete="off" class="layui-input" placeholder="请输入关键词" >
                        </div>
                        <div class="layui-col-md1">
                          <button class="layui-btn layui-btn-normal ss_css_but layui-icon" lay-submit lay-filter="*">&#xe615;</button>
                        </div>
                    </div>     
    </form>
    <hr class="layui-bg-gray">


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
                <th>#</th>
                <th>商品编号</th>
                <th>商品名称</th>
                <th>商品父类</th>
                <th>创建时间</th>
                <th>操作</th>
              </tr> 
            </thead>
            <tbody>
			
			@foreach($res as $k=>$v)
              <tr>
                <td><input type="checkbox" name="" lay-skin="primary"></td>
                <td>{{$v->cid}}</td>
                <td>{{$v->cname}}</td>
                <td>{{getname($v->pid)}}</td>
                <td>{{date('Y-m-d H:i:s', $v->ctime)}}</td>
                
                <td>
                	<a href="javascript:;" class="layui-btn layui-btn-xs">添加子栏目</a>
                	<a href="/admin/cates/edit/{{$v->cid}}" title="编辑" class="layui-btn layui-btn-xs layui-icon">&#xe642;</a>
                	<a href="/admin/cates/delete/{{$v->cid}}" title="删除" class="layui-btn layui-btn-xs layui-bg-red layui-icon">&#xe640;</a>
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




@endsection

@section('js')
<script>
//JavaScript代码区域
layui.use(['element', 'form'], function(){
  var element = layui.element;
  
});
</script>
@show