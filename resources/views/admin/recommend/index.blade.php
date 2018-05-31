@extends('layout.admin')


@section('title',$title)


@section('content')






	 @if(session('msg'))
        <li style='color:red;font-size:17px;list-style:none'>{{session('msg')}}</li>
   	 @endif

		<form action="/admin/recommend" method="get">
				<div class="demoTable">
				  搜索商品名称：
				  <div class="layui-inline">
				      <input class="layui-input" name="search" id="demoReload" value="@if(!empty($search)) {{$search}} @endif">
				  </div>
				      <button class="layui-btn" data-type="reload">搜索</button>
				</div>
		</form>

		   <!--返回 刷新 添加-->
                <hr class="layui-bg-gray">
                <a href="javascript:;" title="返回" onclick="javascript:window.history.go(-1)" class="layui-btn layui-btn-sm layui-btn-normal layui-icon">&#xe65c;</a>
                <a href="javascript:;" onclick="javascript:window.location.reload(true);" title="刷新" class="layui-btn layui-btn-sm layui-btn-normal layui-icon">&#x1002;</a>
                <a href="/admin/recommend/create" class="layui-btn layui-btn-sm layui-btn-normal layui-icon">添加</a>


 
		<table class="layui-table" >
		  <thead>
		    <tr>
		      
		      <th lay-data="{field:'id', width:80, sort: true, fixed: true}">ID</th>
		      <th lay-data="{field:'username', width:80}">推荐商品名称</th>
		      <th lay-data="{field:'username', width:80}">推荐商品url</th>
		      <th lay-data="{field:'username', width:80}">推荐商品价格</th>
		      <th lay-data="{field:'name', width:80, sort: true}">商品路径</th>
		      <th lay-data="{field:'sex', width:80}">商品图片</th>
		      
		      <th lay-data="{field:'status', width:160}">商品状态</th>
		      
		      
		      <th lay-data="{fixed: 'right', width:178, align:'center', toolbar: '#barDemo'}">操作</th>
		      
		      
		    </tr>
		  </thead>
	     <tbody>
	     @foreach ($req as $k => $v)
	      <tr>
	      	  <td>{{$v->id}}</td>
		      <td>{{$v->gname}}</td>
		      <td>{{$v->gurl}}</td>
		      <td>{{$v->price}}</td>
		      <td>{{$v->tname}}</td>
		     
		  	  <td style="text-align:center;"><img src="{{$v->icon}}" style="width: 100px;height: 100px;"></td>
		  	   <td>{{foo($v->status)}}</td>
		  	  <td>
		  	  	<div class="layui-table-cell laytable-cell-1-9"> 
		         
					   <a href = "/admin/recommend/{{$v->id}}/edit"  class="layui-btn layui-btn-xs" lay-event="edit">修改</a>
						<form action="/admin/recommend/{{$v->id}}" method="post" style="display: inline">
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



{{$req->appends(['search' => $search])->links()}}



@endsection




