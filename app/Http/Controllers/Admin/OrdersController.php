<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Model\Admin\Order;
use App\Model\Admin\Detail;

class OrdersController extends Controller
{
	/**
	 * 显示订单列表页
	 * @return [type] 视图
	 */
    public function orderList(Request $req)
    {	
    	//接收查询条件
    	$status = $req->input('status');
    	$number = $req->input('number');
    	
    	$res = (new Order)->orderList($status, $number);

    	return view('admin.orders.orderList',[
    		'title'=>'订单列表',
    		'res'=>$res,
    		'status'=>$status,
    		'number'=>$number
    	]);
    }

    /**
     * 添加订单页
     */
    public function addOrder()
    {	
    	return view('admin.orders.addOrder',['title'=>'添加订单']);
    }

    /**
     * 添加订单
     * @param [object] $req [请求对象]
     */
    public function add(Request $req)
    {
    	$data = $req->except('_token');

    	$res = (new Order)->add($data);

    	if (!$res) {
    		return back()->with('添加失败');
    	}

    	return redirect('/admin/users/orders');
    }

    /**
     * 订单详情页
     * @return [type] [description]
     */
    public function orderDetail($id)
    {
    	$res = (new Detail)->orderDetail($id);
    	return view('admin.orders.orderDetail',['res'=>$res,'title'=>'订单详情']);
    }


    public function editOrder()
    {
    	return view('admin.orders.editOrder',['title'=>'修改订单页']);
    }
}
