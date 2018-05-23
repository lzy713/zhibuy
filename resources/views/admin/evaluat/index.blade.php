@extends('layout.admin')


@section('title',$title)


@section('content')
<form action="/admin/evaluat" method="get">
<div class="demoTable">
  搜索评测名称：
  <div class="layui-inline">
    <input class="layui-input" name="search" id="demoReload" value="">
  </div>
  <button class="layui-btn" data-type="reload">搜索</button>
</div>
</form>


 
<table class="layui-table" >
  <thead>
    <tr>
      
      <th lay-data="{field:'id', width:80, sort: true, fixed: true}">ID</th>
      <th lay-data="{field:'username', width:80}">评测产品名称</th>
      <th lay-data="{field:'name', width:80, sort: true}">父级id号</th>
      <th lay-data="{field:'sex', width:80}">分类路径</th>
      <th lay-data="{field:'status', width:160}">状态</th>
      <th lay-data="{fixed: 'right', width:178, align:'center', toolbar: '#barDemo'}">操作</th>
      
    </tr>
  </thead>
     <tbody>
     
      <tr>
      <td></td>
      <td></td>

      <td></td>

      <td></td>
  	  <td></td>
  	  <td>
  	  	<div class="layui-table-cell laytable-cell-1-9"> 
          <a href = "/admin/evaluat/create"  class="layui-btn layui-btn-xs" lay-event="edit">添加子分类</a>
					
				   <a href = "/admin/evaluat/edit"  class="layui-btn layui-btn-xs" lay-event="edit">修改</a>


					<form action="/admin/evaluat/" method="post" style="display: inline">
            {{csrf_field()}}

            {{method_field('DELETE')}}
						<button class='layui-btn layui-btn-danger layui-btn-xs'>删除</button>
          </form>
					


				  
			</div>


  	  </td>
       </tr>
     

		</tbody>
  

</table>






@endsection



