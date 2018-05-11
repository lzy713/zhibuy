@extends('layout.admin')

@section('title',$title)

@section('content')

<!-- 内容主体区域 -->
    <div style="padding: 15px;">
	    <blockquote class="layui-elem-quote">
	        <!--面包屑-->
	        <span class="layui-breadcrumb m-right">
	            <a href="">
	                控制台
	            </a>
	            <a href="">
	                产品
	            </a>
	            <a>
	                <cite>
	                    添加
	                </cite>
	            </a>
	        </span>
	        <!--面包屑-->
	    </blockquote>
	    <!--内容-->
	    <form class="layui-form" action="/admin/users/order/add" method="post">
	        <div class="layui-inline" style="width:100%;">
	            <div class="layui-tab layui-tab-card">
	                <ul class="layui-tab-title">
	                    <li class="layui-this">
	                        信息
	                    </li>
	                </ul>
	                <div class="layui-tab-content">
	                    <!--tab1-->
	                    <div class="layui-tab-item layui-show">
	                        <div class="layui-form-item">
	                            <label class="layui-form-label">
	                                发货人
	                            </label>
                                <input type="text" name="uid" lay-verify="required|uid" required placeholder="发货人"
	                                autocomplete="off" class="layui-input layui_inp_widht300">
	                        </div>
	                        <div class="layui-form-item">
	                            <label class="layui-form-label">
	                                收货人
	                            </label>
                                <input type="text" name="consignee" lay-verify="required|address" required placeholder="收货人"
	                                autocomplete="off" class="layui-input layui_inp_widht300">
	                        </div>
	                        <div class="layui-form-item">
	                            <label class="layui-form-label">
	                                收货地址
	                            </label>
                                <input type="text" name="address" lay-verify="required|address" required placeholder="收获地址"
	                                autocomplete="off" class="layui-input layui_inp_widht300">
	                        </div>
	                        <div class="layui-form-item">
	                            <label class="layui-form-label">
	                                联系方式
	                            </label>
                                <input type="text" name="phone" lay-verify="required|address" required placeholder="联系方式"
	                                autocomplete="off" class="layui-input layui_inp_widht300">
	                        </div>
	                        <div class="layui-form-item">
	                            <label class="layui-form-label">
	                                订单号
	                            </label>
                                <input type="text" name="number" lay-verify="required|address" required placeholder="订单号"
	                                autocomplete="off" class="layui-input layui_inp_widht300">
	                        </div>
	                        <div class="layui-form-item">
	                            <label class="layui-form-label">
	                                总金额
	                            </label>
	                            <div class="layui-input-block">
	                                <input type="text" name="tprice" lay-verify="required|title" required placeholder="总金额"
	                                autocomplete="off" class="layui-input layui_inp_widht300">
	                            </div>
	                        </div>

	                        <div class="layui-form-item" pane>
	                            <label class="layui-form-label">
	                                状态
	                            </label>
	                            <div class="layui-input-block">
	                                <input type="radio" name="status" value="0" title="未发货" checked>
	                                <input type="radio" name="status" value="1" title="已发货">
	                                <input type="radio" name="status" value="2" title="交易完成">
	                            </div>
	                        </div>
	                        <div class="layui-form-item">
	                            <div class="layui-input-block">
	                                <button class="layui-btn layui-btn-normal" lay-submit lay-filter="*">
	                                	{{csrf_field()}}
	                                    添加
	                                </button>
	                            </div>
	                        </div>
	                    </div>
	                    <!--tab1-->
	                </div>
	            </div>
	        </div>
	    </form>
	</div>
</div>
  <!-- 内容主体区域 -->

@endsection


@section('js')
<script>
//JavaScript代码区域
layui.use(['element', 'form'], function(){
  var element = layui.element;
  
});
</script>
@show