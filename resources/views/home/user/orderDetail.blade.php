@extends('layout.user')
@section('title',$title)
<link rel="stylesheet" type="text/css" href="/home/detail/main.css">
<link rel="stylesheet" type="text/css" href="/home/detail/base.css">
<link rel="stylesheet" type="text/css" href="/home/detail/view.css">
<style>
	.layui-laypage .layui-laypage-curr .layui-laypage-em {
    background-color: #ff6700 !important;
}
	.grzxbj{
		min-height: 1150px !important;
	}

</style>
<!-- self_info -->
@section('content')
	<div class="rtcont fr">
		        <div class="page-main user-main">
            <div class="container">
                <div class="row">
                    <div class="span16">
                        <div class="uc-box uc-main-box">
                            <div class="uc-content-box order-view-box">
                                <div class="box-hd">
                                    <h1 class="title">订单详情
                                        <small>请谨防钓鱼链接或诈骗电话，</small></h1>
                                    <div class="more clearfix">
                                        <h2 class="subtitle">订单号：{{$number}}
                                            <span class="tag tag-subsidy"></span></h2>
                                        <div class="actions">
                                            <!-- <a id="J_cancelOrder" class="btn btn-small btn-line-gray" title="取消订单" href="javascript:;" onclick="">取消订单</a> -->
                                            <a id="J_payOrder" class="btn btn-small btn-primary" onclick="javascript:window.history.go(-1)">我的订单</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-bd">
                                    <div class="uc-order-item uc-order-item-pay">
                                        <div class="order-detail">
                                            <div class="order-summary">
                                                <div class="order-status">订单商品</div>
                                            </div>
                                            <table class="order-items-table">
                                                <tbody>
                                                	@foreach($goods as $k=>$v)
                                                    <tr>
                                                        <td class="col col-thumb">
                                                            <div class="figure figure-thumb">
                                                                <a target="_blank" href="/goodsdetails/{{$v->gid}}" data-stat-id="5d03002e51cc92e0" onclick="">
                                                                    <img src="{{$v->goods->img}}" width="60" height="60"></a>
                                                            </div>
                                                        </td>
                                                        <td class="col col-name">
                                                            <p class="name">
                                                                <a target="_blank" href="/goodsdetails/{{$v->gid}}" data-stat-id="1aaf2a1424bce050" onclick="">{{$v->goods->gname}}</a></p>
                                                        </td>
                                                        <td class="col col-price">
                                                            <p class="price">{{$v->price}}元 × {{$v->num}}</p></td>
                                                        <td class="col col-actions">
                                                        @if($order->status == 2)
                                                            <button class="btn btn-small btn-primary pingjia" style="border: 0px" gid="{{$v->gid}}">
                                                                立即评价
                                                            </button>
                                                        @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div id="editAddr" class="order-detail-info">
                                            <h3>收货信息</h3>
                                            <table class="info-table">
                                                <tbody>
                                                    <tr>
                                                        <th>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</th>
                                                        <td>{{$order->consignee}}</td></tr>
                                                    <tr>
                                                        <th>联系电话：</th>
                                                        <td>{{$order->phone}}</td></tr>
                                                    <tr>
                                                        <th>收货地址：</th>
                                                        <td>{{$order->address}}</td></tr>
                                                </tbody>
                                            </table>
                                            <div class="actions">
                                                <!-- <a class="btn btn-small btn-line-gray J_editAddr" href="" onclick="">修改</a> -->
                                            </div>
                                        </div>
                                        <div id="editTime" class="order-detail-info">
                                            <h3>支付方式及送货时间</h3>
                                            <table class="info-table">
                                                <tbody>
                                                    <tr>
                                                        <th>支付方式：</th>
                                                        <td>在线支付</td></tr>
                                                    <tr>
                                                        <th>送货时间：</th>
                                                        <td>不限送货时间</td></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="order-detail-info">
                                            <h3>发票信息</h3>
                                            <table class="info-table">
                                                <tbody>
                                                    <tr>
                                                        <th>发票类型：</th>
                                                        <td>电子发票</td></tr>
                                                    <tr>
                                                        <th>发票内容：</th>
                                                        <td>购买商品明细</td></tr>
                                                    <tr>
                                                        <th>发票抬头：</th>
                                                        <td>个人</td></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="order-detail-total">
                                            <table class="total-table">
                                                <tbody>
                                                    <tr>
                                                        <th>商品总价：</th>
                                                        <td>
                                                            <span class="num">{{$order->tprice}}</span>元</td></tr>
                                                    <tr>
                                                        <th>运费：</th>
                                                        <td>
                                                            <span class="num">0</span>元</td></tr>
                                                    <tr>
                                                        <th class="total">应付金额：</th>
                                                        <td class="total">
                                                            <span class="num">{{$order->tprice}}</span>元</td></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
			</div>
		</div>
	</div>
	<div class="clear"></div>
	</div>
@endsection

@section('js')
<script>
    var content = `
        <form class="layui-form" action="">
            <div class="layui-form-item layui-form-text" style="margin:30px auto;">
                <label class="layui-form-label">评价内容</label>
                <div class="layui-input-block" style="width:350px;">
                    <textarea name="desc" id="content" placeholder="请输入内容" class="layui-textarea"></textarea>
                </div>
            </div>
        </form>
    `;
</script>
<script>

 var _token = '{{csrf_token()}}';
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': _token
    }
});

    layui.use(['form','layer','upload'], function(){
        var form = layui.form
        ,layer = layui.layer
        ,upload= layui.upload;
          
        $('.pingjia').click(function(){
            var gid = $(this).attr('gid');
            layer.open({
                type: 1,
                anim: 1,
                title:'填写评价',
                offset: '180px',
                skin: 'layui-layer-rim', //加上边框
                btn:['提交','取消'],
                area: ['500px', '300px'], //宽高
                content: content,
                yes:function(index,layero){
                    var text = $('#content').val();
                    $.post('/addComments', {gid:gid,text:text}, function(data){
                        layer.close(index);
                        layer.alert('评论成功', {
                              skin: 'layui-ext-moon' //样式类名
                              ,closeBtn: 0
                              ,time:1500
                              ,offset: '180px'
                            });
                    });
                },
            });
        });

        form.on('submit(formDemo)', function(data){
            layer.msg(JSON.stringify(data.field));
            return false;
        });

    });
    
</script>
@endsection

