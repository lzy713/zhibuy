@extends('layout.home')
@section('title',$title)
<link rel="stylesheet" type="text/css" href="/home/css/style.css">
<link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
<script src="/layui/layui.js"></script>
<style>
#buts{margin:43px auto auto 85px;}
#danjia{margin-left:70px;}
#xiaoji{margin-left:83px;}
#caozuo{margin-left:138px;}
#tupian{margin-left:0;}
#mingcheng{margin-left:100px;}
.cart-empty{
	height: 98px;
    padding: 80px 0 120px;
    color: #333;
}
.cart-empty .message{
	height: 98px;
    padding-left: 341px;
    background: url(/uploads/no-login-icon.png) 250px 22px no-repeat;
}

.cart-empty .message .txt {font-size: 14px;}
.cart-empty .message li {line-height: 38px;}
ol, ul {list-style: outside none none;}
.ftx-05, .ftx05 {color: #005ea7;}
</style>

@section('header')
	<!-- start banner_x -->
	<div class="banner_x center">
		<a href="./index.html" target="_blank"><div class="logo fl"></div></a>
		
		<div class="wdgwc fl ml40">我的购物车</div>
		<div class="wxts fl ml20">温馨提示：产品是否购买成功，以最终下单为准哦，请尽快结算</div>
		<div class="dlzc fr">
			<span class="user">
                <a rel="nofollow" class="user-name" href="/login/self_auth">
                    <span class="name">
                        {{session('homeMsg')->username}}
                    </span>
                </a>
            </span>
            <span class="sep">
                |
            </span>
            <a rel="nofollow" class="link link-order" href="/myorder"
            target="_blank">
                我的订单
            </a>
		</div>
		<div class="clear"></div>
	</div>
	<div class="xiantiao"></div>
@endsection

@section('content')
	@if($count)
	<div class="gwcxqbj">
		<!-- 购物车内的商品 -->
		<div class="gwcxd center">
			<div class="top2 center">
				<div class="sub_top fl">
					<a href="javascript:void(0)" id="quanxuan">全选</a>
				</div>
				<div class="sub_top fl" id="tupian">商品图片</div>
				<div class="sub_top fl" id="mingcheng">商品名称</div>
				<div class="sub_top fl" style="margin-left: 190px;">单价</div>
				<div class="sub_top fl" style="margin-left: 70px;">数量</div>
				<div class="sub_top fl" style="margin-left: 57px;">小计</div>
				<div class="sub_top fr" style="margin-left: 0px;">操作</div>
				<div class="clear"></div>
			</div>

			@foreach($res as $k=>$v)
			<div class="content2 center">
				<div class="sub_content fl ">
					<input type="checkbox" value="quanxuan" class="quan" cid="{{$v->id}}" checked="checked"  style="margin-top:50px"/>
				</div>
				<div class="sub_content fl"><img src="{{$v->goods->img}}" style="width: 80px;height: 80px;margin-top:20px"></div>
				<div class="sub_content fl ft20" style="text-align: center;">{{$v->goods->gname}}</div>
				<div class="sub_content fl " id="danjia">{{$v->goods->gprice}}</div>
				<div id="buts" class="layui-btn-group fl">
					<button class="layui-btn layui-btn-primary layui-btn-sm jian" cid="{{$v->id}}">
						<i class="layui-icon">-</i>
					</button>
					<input style="width:40px;" type="text" class="layui-btn layui-btn-primary layui-btn-sm" value="{{$v->num}}" min="1" disabled>
					<button class="layui-btn layui-btn-primary layui-btn-sm jia" cid="{{$v->id}}">
						<i class="layui-icon">+</i>
					</button>
				</div>
				<div class="sub_content fl" id="xiaoji">{{$v->prices}}</div>
				<div class="sub_content fl" id="caozuo"><a href="javascript:void(0)" title="移除" class="remove" cid="{{$v->id}}" uid="{{$v->uid}}">×</a></div>
				<div class="clear"></div>
			</div>
			@endforeach

		</div>
		<!-- 购物车内的商品 -->


		<div class="jiesuandan mt20 center">
			<div class="tishi fl ml20">
				<ul>
					<li><a href="./liebiao.html">继续购物</a></li>
					<li>|</li>
					<li>共<span id="nums">{{$count}}</span>件商品，已选择<span id="yixuan">0</span>件</li>
					<div class="clear"></div>
				</ul>
			</div>
			<div class="jiesuan fr">
				<div class="jiesuanjiage fl">合计（不含运费）：<span id="zong">0.00</span></div>
				<div class="jsanniu fr"><input class="jsan" type="submit" name="jiesuan" onclick="location.href='/order'"  value="去结算"/></div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>	
	</div>
	@else
	<div class="cart-empty">
	    <div class="message">
	        <ul>
	            <li class="txt">
	                购物车空空的哦~，去看看心仪的商品吧~
	            </li>
	            <li class="mt10">
	                <a href="/" class="ftx-05">
	                    去购物&gt;
	                </a>
	            </li>
	            
	        </ul>
	    </div>
	</div>
	@endif
@endsection


@section('js')
<script type="text/javascript">
	//商品数量 
	var nums = $('#nums').text();

	//点击加商品
	$('.jia').click(function(){
		var num = $(this).prev().val();
		num++;
		$(this).prev().val(num);

		//获取单价
		var price = $('#danjia').text();
		$(this).parent().next().text(accMul(price,num));

		//获取小计
		var xiaoji = $(this).parent().next().text();
		prices();

		nums++;
		$('#nums').text(nums);
		$(this).parent().siblings().eq(0).children().eq(0).is(':checked');

		if ( $(this).parent().siblings().eq(0).children().eq(0).is(':checked') ) {
			yixuan++;
			$('#yixuan').text(yixuan);
		}
		//获取cid
		var cid = $(this).attr('cid');
		$.post('/shopCart/'+cid,{'num':num,'prices':xiaoji,'_token':'{{csrf_token()}}','_method':'PUT'},function(data){
		});
	});


	//点击减商品
	$('.jian').click(function(){
		var num = $(this).next().val();
		num--;
		if(num < 1){ return false; }
		$(this).next().val(num);

		//获取单价
		var price = $('#danjia').text();
		$(this).parent().next().text(accMul(price,num));

		//获取小计
		var xiaoji = $(this).parent().next().text();
		prices();

		//商品总件数
		nums--;
		$('#nums').text(nums);

		// 商品已选中
		if ( $(this).parent().siblings().eq(0).children().eq(0).is(':checked') ) {
			yixuan--;
			$('#yixuan').text(yixuan);
		}

		//获取cid
		var cid = $(this).attr('cid');
		$.post('/shopCart/'+cid,{'num':num,'prices':xiaoji,'_token':'{{csrf_token()}}','_method':'PUT'},function(data){
		});
	});

	var yixuan = 0;
	//让总计发生改变
	$(':checkbox').each(function(){
		if ($(this).is(':checked')) {
			yixuan = parseInt(yixuan) + parseInt($(this).parent().siblings().eq(3).children().eq(1).val());
			$('#yixuan').text(yixuan);
			prices();

			//修改状态
			var cid = $(this).attr('cid');
			$.post('/shopCart/'+cid,{'status':'1','_token':'{{csrf_token()}}','_method':'PUT'},function(data){
			});
		}
	});
	$(':checkbox').click(function(){
		
		//判断如果选中了就加  没选中就减 (已选中项)
		if ($(this).is(':checked')) {
			yixuan = parseInt(yixuan) + parseInt($(this).parent().siblings().eq(3).children().eq(1).val());
			$('#yixuan').text(yixuan);
			prices();

			//修改状态
			var cid = $(this).attr('cid');
			$.post('/shopCart/'+cid,{'status':'1','_token':'{{csrf_token()}}','_method':'PUT'},function(data){
			});
		} else {
			yixuan = parseInt(yixuan) - parseInt($(this).parent().siblings().eq(3).children().eq(1).val());
			$('#yixuan').text(yixuan);
			prices();

			//修改状态
			var cid = $(this).attr('cid');
			$.post('/shopCart/'+cid,{'status':'0','_token':'{{csrf_token()}}','_method':'PUT'},function(data){
			});
		}

	})

	//全选
	$('#quanxuan').click(function(){
		$(':checkbox').each(function(){
			if (!$(this).is(':checked')) { 
				this.checked = true;
				yixuan = parseInt(yixuan) + parseInt($(this).parent().siblings().eq(3).children().eq(1).val());
				$('#yixuan').text(yixuan);

				//修改状态
				var cid = $(this).attr('cid');
				$.post('/shopCart/'+cid,{'status':'1','_token':'{{csrf_token()}}','_method':'PUT'},function(data){
				});
			}
		})

		prices();
	})

	//删除商品
	$('.remove').click(function(){
		var res = confirm('你确定要删除吗？');
		if ( !res ) { return; }

		var xiaoji = $(this).parent().prev().text();
		// 找到循环的商品
		var div = $(this).parent().parent();

		//ID
		var cid = $(this).attr('cid');
		var uid = $(this).attr('uid');

		//发送Ajax删除
		$.post('/shopCart/'+cid,{'_method':'delete','_token':"{{csrf_token()}}",'uid':uid},function(data){
			if (data != '0') {
				//删除当前条
				div.remove();				
				var shuliang = div.children().eq(4).children().eq(1).val();

				//删除已选中的
				if (yixuan > 0) { yixuan = parseInt(yixuan) - parseInt(shuliang); }
				$('#yixuan').text(yixuan);

				//删除总件数
				nums = nums - shuliang;
				$('#nums').text(nums);

				//判断被删除的商品如果选中 需要重填总价格
				if ( div.children().eq(0).children().eq(0).is(':checked') ) {
					var zong = $('#zong').text();
					$('#zong').text(zong-xiaoji);
				}
			} else {
				$('.gwcxqbj').html(`<div class="cart-empty">
					    <div class="message">
					        <ul>
					            <li class="txt">
					                购物车空空的哦~，去看看心仪的商品吧~
					            </li>
					            <li class="mt10">
					                <a href="/" class="ftx-05">
					                    去购物&gt;
					                </a>
					            </li>
					            
					        </ul>
					    </div>
					</div>`);
			}
		});

	});



	//加或减改变数据库
	function ajaxCart(cid, num, xiaoji)
	{
		$.post('/shopCart/'+cid,{'num':num,'prices':xiaoji,'_token':'{{csrf_token()}}','_method':'PUT'},function(data){
		});
	}



	//被选中时填入总价格
	function prices()
	{
		var num = 0;
		$(':checkbox:checked').each(function(){
			var xiaoji = $(this).parent().siblings().eq(4).text();
			// alert(num+'===='+xiaoji);
			$('#zong').text(num = accAdd(num,xiaoji));
		});

		if (!$(':checkbox').is(':checked')) {
			$('#zong').text(num);
		}
	}


	// 乘法
	function accMul(arg1, arg2) {
        var m = 0, s1 = arg1.toString(), s2 = arg2.toString();
        try { m += s1.split(".")[1].length } catch (e) { }
        try { m += s2.split(".")[1].length } catch (e) { }
        return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)
    }

    //加法
    function accAdd(arg1,arg2){  
	    var r1,r2,m;  
	    try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}  
	    try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}  
	    m=Math.pow(10,Math.max(r1,r2))  
	    return (arg1*m+arg2*m)/m  
	}
</script>
@endsection
