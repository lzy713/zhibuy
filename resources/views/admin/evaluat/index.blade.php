@extends('layout.admin')


@section('title',$title)


@section('content')
<form action="" method="get">
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
     
      <th lay-data="{field:'name', width:80, sort: true}">产品图片</th>
     
      
      <th lay-data="{field:'username', width:80}">产品描述</th>
      <th lay-data="{field:'status', width:160}">状态</th>
      
      <th lay-data="{fixed: 'right', width:178, align:'center', toolbar: '#barDemo'}">操作</th>
      
    </tr>
  </thead>
     <tbody>
      @foreach($rew as $k=>$v)
      <tr>
      <td>{{$v->nid}}</td>
      <td>{{$v->nname}}</td>
      <td><img src="{{$v->imgs}}"></td>
       <td>{{$v->desc}}</td>
    
      <td>{{$v->status}}</td>
  	 
  	  <td>
  	  	<div class="layui-table-cell laytable-cell-1-9"> 
					
				   <a href = "/admin/evaluation/{{$v->nid}}/edit"  class="layui-btn layui-btn-xs" lay-event="edit">修改</a>


					<form action="/admin/evaluation/{{$v->nid}}" method="post" style="display: inline">
            {{csrf_field()}}

            {{method_field('DELETE')}}
						<button class='layui-btn layui-btn-danger layui-btn-xs'>删除</button>
          </form>
					


				  
			</div>


  	  </td>
       </tr>
     
    @endforeach
		</tbody>
  

</table>


{{$rew->links()}}



@endsection



