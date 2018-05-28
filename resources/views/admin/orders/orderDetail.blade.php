@extends('layout.admin')

@section('title',$title)

@section('content')

    <!-- 内容主体区域 -->
    <blockquote class="layui-elem-quote">
        <!--面包屑-->
        <span class="layui-breadcrumb m-right">
            <a href="">控制台</a>
            <a href="">产品</a>
            <a href="">列表 </a>
            <a><cite>详情</cite></a>
        </span>
        <!--面包屑-->
    </blockquote>
    <div>
        <i class="layui-icon layui-icon-form">&#xe63c;</i>
        <span>订单号：</span>
        <span style="color: #FF5722;">{{$order->number}}</span>
    </div>
    <div>
        <i class="layui-icon layui-icon-rmb"></i>
        <span>总金额：</span>
        <span style="color: #FF5722;">{{$order->tprice}}</span>
    </div>
    <hr class="layui-bg-gray">
<!--内容-->
<form class="layui-form" action="">
    <table class="layui-table">
        <colgroup>
            <col width="300">
            <col width="120">
            <col width="300">
            <col width="80">
            <col width="90">
        </colgroup>
        <thead>
            <tr>
                <th>商品名称</th>
                <th>商品单价</th>
                <th>商品图片</th>
                <th>购买数量</th>
                <th>小计</th>
            </tr>
        </thead>
        <tbody>
            @foreach($res as $k=>$v)
            <tr>
                <td>
                    {{$v->goods->gname}}
                </td>
                <td>
                    {{$v->price}}
                </td>
                <td>
                    <img src="{{$v->goods->img}}" alt="" width="100" height="100" style="margin-bottom:13px">
                </td>
                <td>
                    {{$v->num}}
                </td>
                <td>
                    {{$v->num * $v->price}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</form>
@if(empty($res[0]))
<div>
    <button class="layui-btn layui-btn-fluid layui-btn-disabled">
        没有更多内容
    </button>
</div>
@endif
<!--内容-->
<button class="layui-btn layui-btn-normal" onclick="javascript:window.history.go(-1)"
lay-submit lay-filter="*">
    返回
</button>
@endsection


@section('js')
<script>
	
//JavaScript代码区域
layui.use(['element', 'form'], function(){
  var element = layui.element;
  
});
</script>
@show