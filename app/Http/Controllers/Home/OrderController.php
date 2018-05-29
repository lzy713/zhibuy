<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Order;
use App\Model\Admin\Detail;

class OrderController extends Controller
{
	/**
	 * 前台我的订单展示页
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
    public function orderList(Request $request)
    {
    	
    	$number = $request->input('number');
    
    	$res = Order::homeOrder($number);

    	return view('home.user.myorder',['title'=>'我的订单','res'=>$res,'number'=>$number]);
    }

    /**
     * 前台点击确认收货 修改状态
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function statusAjax($id)
    {
    	Order::where('id',$id)->update(['status'=>'2']);
    }

    /**
     * 前台订单详情页
     * @param  [type] $number [description]
     * @return [type]         [description]
     */
    public function orderDetail($number)
    {
        //查询订单表
        $order = Order::select('id','consignee','address','phone','tprice','status')->
        where('number',$number)->
        first();
        //查询详情商品
        $goods = Detail::with(['goods'=>function($query){
            $query->select('gid','gname','img');
        }])->where('onumber',$number)->get();

        return view('home.user.orderDetail',[
            'title'=>'订单详情',
            'number'=>$number,
            'order'=>$order,
            'goods'=>$goods
        ]);
    }
}
