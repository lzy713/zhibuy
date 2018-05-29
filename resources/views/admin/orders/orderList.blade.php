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
            
            <form class="layui-form" action="/admin/orders" method="get">
                <div class="layui-row layui-col-space10">
                    <div class="layui-col-md2">
                      <select name="status" lay-filter="interest-search" lay-search lay-write>
                      	<option value="">所有订单</option>
                        <option value="0" @if($status == '0') selected @endif>未发货</option>
                        <option value="1" @if($status == '1') selected @endif>已发货</option>
                        <option value="2" @if($status == '2') selected @endif>交易完成</option>
                        </select>
                    </div>
                    <div class="layui-col-md2">
                      <input type="text" name="number" value="@if($number) {{$number}} @endif" class="layui-input" placeholder="请输入订单号" >
                    </div>
                    <div class="layui-col-md1">
                      <button class="layui-btn layui-btn-normal ss_css_but layui-icon">&#xe615;</button>
                    </div>
                </div>     
            </form>
            <hr class="layui-bg-gray">
            
          <!--内容--> 
          <form class="layui-form" >  
	          <table class="layui-table">
	            <colgroup>
	              <col width="5">
	              <col width="88">
	              <col width="110">     
	              <col width="88">
	              <col width="95">
	              <col width="380">
	              <col width="90">
	              <col width="220">
	              <col width="100">
	              <col width="220">
	            </colgroup>
	            <thead>
	              <tr>
	                <th>#</th>
	                <th>下单人</th>
	                <th>订单号</th>
	                <th>收货人</th>
	                <th>收货人电话</th>
	                <th>收货地址</th>
	                <th>总金额</th>
	                <th>生成时间</th>
	                <th>状态</th>
	                <th>操作</th>
	              </tr> 
	            </thead>
	            <tbody>
				@foreach($res as $k=>$v)
	              <tr>
	                <td><input type="checkbox" name="" lay-skin="primary"></td>
	                <td>{{$v->uname}}</td>
	                <td>{{$v->number}}</td>
	                <td>{{$v->consignee}}</td>
	                <td>{{$v->phone}}</td>
	                <td>{{$v->address}}</td>
	                <td>{{$v->tprice}}</td>
	                <td>{{date('Y-m-d H:i:s',$v->createtime)}}</td>
	                <td>
						@if($v->status == 0)
						<button class="layui-btn layui-btn-radius layui-btn-sm statusAjax" num="{{$v->id}}" lay-submit lay-filter="*">点击发货</button>
						@elseif($v->status == 1)
						<button class="layui-btn layui-btn-radius layui-btn-disabled layui-btn-sm">已发货</button>
						@elseif($v->status == 2)
						<button class="layui-btn layui-btn-radius layui-btn-disabled layui-btn-sm">交易完成</button>
						@endif
	                </td>
	                <td>
	                <a href="/admin/order/orderDetail/{{$v->id}}" class="layui-btn layui-btn-xs">订单详情</a>
	                <a href="/admin/order/editOrder/{{$v->id}}" title="编辑" class="layui-btn layui-btn-xs layui-icon edit" num="{{$v->id}}">&#xe642;</a>
	                <button title="删除" class="layui-btn layui-btn-xs layui-bg-red layui-icon deleteAjax" num="{{$v->id}}" lay-submit lay-filter="*">&#xe640;</button>
	                </td>
	              </tr>
	            @endforeach
	            </tbody>
	          </table>
	      </form>
      
	      @if(empty($res[0]))
	      <div>
	      	<button class="layui-btn layui-btn-fluid layui-btn-disabled">没有更多内容</button>  
	      </div>
	      @endif
	      <!--内容-->
	      {{$res->appends(['status'=>$status, 'number'=>$number])->links()}}
@endsection


@section('js')
<script>

	/* 点击发货修改状态 */
	$('.statusAjax').click(function(){
		var id = $(this).attr('num');
		var btn = $(this);
		$.get('/admin/order/statusAjax',{id:id},function($data){
			if ($data == '1') {
				btn.attr('class','layui-btn layui-btn-radius layui-btn-disabled layui-btn-sm');
				btn.text('已发货');
			}
		});

	});


	/* 点击删除订单 */
	$('.deleteAjax').click(function(){
		var id = $(this).attr('num');
		
		$.get('/admin/order/deleteAjax',{id:id},function($data){
			if($data.status == '1'){
				return dialog.success($data.message,'');
			}else{
				return dialog.error($data.message);
			}
		});
	});

	/* 点击编辑订单 */
	$('.edit').click(function(){
		var id  = $(this).attr('num');
		var urls = $(this).attr('href');
		$.get('/admin/order/editAjax',{id:id},function($data){
			if ($data['status'] != 0) {
				return dialog.error('该订单无法被修改');
			} else {
				location.href = urls;
			}
		});
		return false;
	});

//layui JS代码区域
layui.use(['element', 'form', 'layer'], function(){
  var element = layui.element;
  var layer = layui.layer;
  var form = layui.form;

    form.on('submit(*)', function(data){
	  return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
	});


});
</script>
@endsection