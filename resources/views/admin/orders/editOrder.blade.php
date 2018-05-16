@extends('layout.admin')
@section('title',$title)
@section('content')

    <!-- 内容主体区域 -->
	    <blockquote class="layui-elem-quote">
	        <!--面包屑-->
	        <span class="layui-breadcrumb m-right">
	            <a href=""> 控制台 </a>
	            <a href=""> 产品</a>
	            <a><cite> 添加 </cite></a>
	        </span>
	        <!--面包屑-->
	    </blockquote>
	    <!--内容-->
	    <form class="layui-form" action="/admin/order/updateOrder/{{$res->id}}" method="post" id="sub_form">
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
	                                收货人
	                            </label>
                                <input type="text" name="consignee" required placeholder="收货人"
	                                autocomplete="off" class="layui-input layui_inp_widht300" value="{{$res->consignee}}">
	                        </div>
	                        <div class="layui-form-item">
	                            <label class="layui-form-label">
	                                收货地址
	                            </label>
                                <input type="text" name="address" required placeholder="收获地址"
	                                autocomplete="off" class="layui-input layui_inp_widht300" value="{{$res->address}}">
	                        </div>
	                        <div class="layui-form-item">
	                            <label class="layui-form-label">
	                                联系方式
	                            </label>
                                <input type="text" name="phone" required placeholder="联系方式"
	                                autocomplete="off" class="layui-input layui_inp_widht300" value="{{$res->phone}}">
	                        </div>
	                        <div class="layui-form-item">
	                            <div class="layui-input-block">
	                                <button class="layui-btn layui-btn-warm" lay-submit lay-filter="*" id="sub_button">
	                                	{{csrf_field()}}
	                                    修改
	                                </button>
	                                <button class="layui-btn layui-btn-normal"  lay-submit lay-filter="*" onclick="javascript:window.history.go(-1)">
	                                    返回
	                                </button>
	                            </div>
	                        </div>
	                    </div>
	                    <!--tab1-->
	                </div>
	            </div>
	        </div>
	    </form>
  <!-- 内容主体区域 -->
@endsection


@section('js')
<script>

//路由地址
var SCOPE = {
	'save_url' : '/admin/order/updateOrder/{{$res->id}}',
	'jump_url' : '/admin/orders',
	}


//ajax提交token
 var _token = '{{csrf_token()}}';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': _token
        }
    });	

//JavaScript代码区域
layui.use(['element', 'form'], function(){
  var element = layui.element;
  var form = layui.form;
  
  form.on('submit(*)', function(data){
	  return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
	});

});
</script>
@show