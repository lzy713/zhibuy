@extends('layout.admin')

@section('title',$title)

@section('content')



	<form class="layui-form" action="/admin/goods/show">
     <div class="layui-row layui-col-space10">
                        
         <div class="layui-col-md2">
           <input type="text" name="gname" autocomplete="off" class="layui-input" placeholder="请输入关键词" value="{{$gname}}">
		  </div>
         <div class="layui-col-md1">
           <button class="layui-btn layui-btn-normal ss_css_but layui-icon" lay-submit lay-filter="*">&#xe615;</button>
         </div>
     </div>     
    </form>
    <hr class="layui-bg-gray">
                <a href="javascript:;" title="返回" onclick="javascript:window.history.go(-1)" class="layui-btn layui-btn-sm layui-btn-normal layui-icon">&#xe65c;</a>
                <a href="javascript:;" onclick="javascript:window.location.reload(true);" title="刷新" class="layui-btn layui-btn-sm layui-btn-normal layui-icon">&#x1002;</a>
                <a href="/admin/goods/add" class="layui-btn layui-btn-sm layui-btn-normal layui-icon">添加</a>


	<form class="layui-form" action="">  
          <table class="layui-table">
            <colgroup>
              <col width="20">
              <col width="60">
              <col width="110">
              <col width="90">
              <col width="110">
              <col width="90">
              <col width="60">
              <col width="90">
              <col width="110">
              <col width="60">
              <col>
            </colgroup>
            <thead>
              <tr>
                <th>#</th>
                <th>编号</th>
                <th>商品名称</th>
                <th>商品颜色</th>
                <th>商品版本</th>
                <th>价格</th>
                <th>库存</th>
                <th>商品图片</th>
                <th>商品描述</th>
                <th>状态</th>
                <th>推荐</th>
                <th>销量</th>
                <th>操作</th>
              </tr> 
            </thead>
            <tbody>
			
			
              	<tr>
	           	@foreach($res as $k=>$v)
	                <td><input type="checkbox" name="" lay-skin="primary"></td>
	                <td>{{$v->gid}}</td>
                  <td>{{$v->gname}}</td>
                  <td>{{$v->yanse}}</td>
	                <td>{{$v->banben}}</td>
	                <td>{{$v->gprice}}</td>
                  <td>{{$v->gstock}}</td>
	                <td><img src="{{$v->img}}" alt="" style="width:40px;height:40px;"></td>
	               <!--  <td>
                   @foreach($img as $k1=>$v1)
                             @if($v1->gid == $v->gid)
                   <img src="{{$v1->img}}" alt="">
                             @endif
                   @endforeach
                 </td>
                 <td>图片</td> -->
	                <td>{{$v->gdesc}}</td>
	                <td>
                    @if($v->gstatus == 1)
                    新品
                    @elseif($v->gstatus == 2)
                    在售
                    @elseif($v->gstatus == 3)
                    下架
                    @endif
                  </td>
	                <td>
                    @if($v->isrecom == 1)
                    是
                    @else($v->salenum == 2)
                    否
                    @endif
                  </td>
	                <td>{{$v->salenum}}</td>
	                <td>
	                	<!-- <a href="javascript:;" class="layui-btn layui-btn-xs">添加子栏目</a> -->
	                	<a href="/admin/goods/goodsedit/{{$v->gid}}" title="编辑" class="layui-btn layui-btn-xs layui-icon">&#xe642;</a>
	                	<a href="/admin/goods/goodsdel/{{$v->gid}}" title="删除" class="layui-btn layui-btn-xs layui-bg-red layui-icon">&#xe640;</a>
	                </td>
              	</tr>
			   	@endforeach

            </tbody>
          </table>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td>
              <div id="demo2" style="margin:0 auto;"></div>
              <div style="text-align: center;">{{$res->appends(['gname' => $gname])->links()}}</div>
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