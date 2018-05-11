<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Model\Admin\Order;

class OrdersController extends Controller
{
	/**
	 * 显示订单列表页
	 * @return [type] 视图
	 */
    public function orderList()
    {
    	// $res = Order::paginate(10);
    	$res = Order::with('user')->paginate(10);
    	return view('admin.orders.orderList',['title'=>'订单列表','res'=>$res]);
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
     * @param Request $req 请求对象
     */
    public function add(Request $req)
    {
    	$data = $req->except('_token');
    	$data['createtime'] = time();
    	$res = Order::create($data);

    	if (!$res) {
    		return back()->with('添加失败');
    	}

    	return redirect('/admin/users/orders');
    }
}
