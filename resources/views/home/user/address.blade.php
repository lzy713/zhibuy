@extends('layout.user')
@section('title',$title)
<link rel="stylesheet" type="text/css" href="/home/order/main.min.css">
<link rel="stylesheet" type="text/css" href="/home/order/base.min.css">
<link rel="stylesheet" type="text/css" href="/layui/css/layui.css">

<style>
	.iconfont {
	    font-family: "iconfont" !important;
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
                            <div class="uc-content-box">
                                <div class="box-hd">
                                    <h1 class="title">收货地址</h1>
                                </div>
                                <div class="box-bd">
                                    <div class="user-address-list J_addressList clearfix">
                                        <div class="address-item address-item-new" id="J_newAddress">
                                            <i class="iconfont"></i>添加新地址
                                        </div>
                                        @foreach($address as $k=>$v)
                                        <div class="address-item J_addressItem" status="{{$v->status}}">
                                            <dl>
                                                <dt>
                                                    <em class="uname">{{$v->name}}</em>
                                                </dt>
                                                <dd class="utel">{{$v->phone}}</dd>
                                                <dd class="uaddress">
                                                	{{$v->province}}&nbsp;&nbsp;{{$v->city}}&nbsp;&nbsp;@if( $v->area ){{$v->area}}&nbsp;&nbsp;@endif<br />
                                                	{{$v->street}}
                                                </dd>
                                            </dl>
                                            <div class="actions">
                                                <a class="modify J_addressDel" id="{{$v->id}}">删除</a>
                                            </div>
                                        </div>
                                        @endforeach
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
<script src="/layui/layui.js"></script>
<script src="/home/layer/layer.js"></script>
<script>

	$('#J_newAddress').on('click', function(){
        var index = layer.open({
            type: 2,
            shift:1,
            offset: '150px',
            title: '添加新地址',
            fixed: true,
            shadeClose: true,
            maxmin: true,
            area: ['700px', '500px'],
            content: '/address/create',
            });
    });

    $('.J_addressItem').each(function(){

        if ($(this).attr('status') == 1) {
            $(this).css('border','1px solid #ff6700');
        }

    });


        

       
    

    layui.use('form', function(){
        var form = layui.form
        ,layer = layui.layer;

        //点击删除
        $('.J_addressDel').click(function(){
            var id  = $(this).attr('id');
            var del = $(this);
            var res = confirm('你确定要删除地址吗？');
            if (!res) return;
            $.get('/delAjax/'+id, {}, function(data){

                if (data == '1') {
                    layer.msg('删除成功!',{time: 1500, icon:6});
                    del.parent().parent().remove();
                }

            });
        });
    });
</script>
@endsection

