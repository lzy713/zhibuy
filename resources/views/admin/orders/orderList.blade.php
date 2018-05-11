@extends('layout.admin')

@section('title',$title)

@section('content')

    <!-- 内容主体区域 -->
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
            
            <form class="layui-form" action="">
                    <div class="layui-row layui-col-space10">
                        <div class="layui-col-md2">
                          <select name="interest-search" lay-filter="interest-search" lay-search lay-write>
                          	<option value=""></option>
                            <option value="0">未发货</option>
                            <option value="1">已发货</option>
                            <option value="2">交易完成</option>
                            </select>
                        </div>
                        <div class="layui-col-md2">
                          <input type="text" name="xxx " autocomplete="off" class="layui-input" placeholder="请输入订单号" >
                        </div>
                        <div class="layui-col-md1">
                          <button class="layui-btn layui-btn-normal ss_css_but layui-icon" lay-submit lay-filter="*">&#xe615;</button>
                        </div>
                    </div>     
            </form>
            <hr class="layui-bg-gray">
            <a href="/admin/users/order/addOrder" class="layui-btn normal layui-btn-sm layui-btn-normal layui-icon">&#xe654;</a>
            <button class="layui-btn layui-btn-sm  layui-bg-red layui-icon">&#xe640;</button>
          <!--内容--> 
          <form class="layui-form" action="">  
          <table class="layui-table">
            <colgroup>
              <col width="10">
              <col width="120">
              <col width="145">
              <col width="110">
              <col width="380">
              <col width="90">
              <col width="180">
              <col width="100">
              <col width="180">
            </colgroup>
            <thead>
              <tr>
                <th>#</th>
                <th>下单人</th>
                <th>订单号</th>
                <th>收货人电话</th>
                <th>收货地址</th>
                <th>订单金额</th>
                <th>生成时间</th>
                <th>状态</th>
                <th>操作</th>
              </tr> 
            </thead>
            <tbody>
			@foreach($res as $k=>$v)            
              <tr>
                <td><input type="checkbox" name="" lay-skin="primary"></td>
                <td>{{$v->user->username}}</td>
                <td>{{$v->number}}</td>
                <td>{{$v->phone}}</td>
                <td>{{$v->address}}</td>
                <td>{{$v->tprice}}</td>
                <td>{{date('Y-m-d H:i:s',$v->createtime)}}</td>
                <td >
					@if($res[$k]->status == 0)
					<button class="layui-btn layui-btn-radius layui-btn-sm">点击发货</button>
					@elseif($res[$k]->status == 1)
					<button class="layui-btn layui-btn-radius layui-btn-disabled layui-btn-sm" disabled>已发货</button>
					@elseif($res[$k]->status == 2)
					<button class="layui-btn layui-btn-radius layui-btn-disabled layui-btn-sm" disabled>交易完成</button>
					@endif
                </td>
                <td>
                <a href="javascript:;" class="layui-btn layui-btn-xs">订单详情</a>
                <a href="javascript:;" title="编辑" class="layui-btn layui-btn-xs layui-icon">&#xe642;</a>
                <a href="javascript:;" title="删除" class="layui-btn layui-btn-xs layui-bg-red layui-icon">&#xe640;</a>
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
      	{{$res->links()}}
@endsection


@section('js')
<script src="/js/jquery.min.js"></script>
<script>
	
//JavaScript代码区域
layui.use(['element', 'form'], function(){
  var element = layui.element;
  
});
</script>
@show