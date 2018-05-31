@extends('layout.admin')


@section('title',$title)


@section('content')
<form action="/admin/user" method="get">
<div class="demoTable">
  搜索公告名称：
  <div class="layui-inline">
    <input class="layui-input" name="search" id="demoReload" value="@if(!empty($search)) {{$search}} @endif">
  </div>
  <button class="layui-btn" data-type="reload">搜索</button>
</div>
</form>

 

 
<table class="layui-table" >
  <thead>
    <tr>
      
      <th lay-data="{field:'id', width:80, sort: true, fixed: true}">ID</th>
      <th lay-data="{field:'username', width:80}">用户名</th>
      <th lay-data="{field:'name', width:80, sort: true}">真实姓名</th>
      <th lay-data="{field:'sex', width:80}">性别</th>
      <th lay-data="{field:'status', width:160}">状态</th>
      <th lay-data="{field:'phone', width:80, sort: true}">电话</th>
      
      <th lay-data="{fixed: 'right', width:178, align:'center', toolbar: '#barDemo'}">操作</th>
      
      
    </tr>
  </thead>

  		@foreach($res as $k=>$v)

  		<tr class="odd">
		<td data-field="id">
			<div class="layui-table-cell laytable-cell-1-id">{{$v->id}}</div>
		</td>
		<td data-field="username">
			<div class="layui-table-cell laytable-cell-1-username">{{$v->username}}</div>
		</td>
		<td data-field="name">
			<div class="layui-table-cell laytable-cell-1-name">{{$v->name}}</div>
		</td>
		<td data-field="sex"><div class="layui-table-cell laytable-cell-1-sex">{{$v->sex}}</div>
		</td>
		<td data-field="status">
			<div class="layui-table-cell laytable-cell-1-status">
				@if($v->status == 1)
					启用
				@else
					禁止

				@endif
			</div>
		</td>
		<td data-field="phone">
			<div class="layui-table-cell laytable-cell-1-phone">{{$v->phone}}</div>
		</td>



		<td>
			<div class="layui-table-cell laytable-cell-1-9"> 
					<a href = "#" class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a> 
				   <a href = "/admin/user/{{$v->id}}/edit"  class="layui-btn layui-btn-xs" lay-event="edit">修改</a>

					<form action="/admin/user/{{$v->id}}" method='post' style='display:inline'>
						{{csrf_field()}}

						{{method_field('DELETE')}}

						<button class='layui-btn layui-btn-danger layui-btn-xs'>删除</button>

					</form>



				  
			</div>
		</td>
		</tr>

		@endforeach


</table>

{{ $res->links()}}




@endsection


