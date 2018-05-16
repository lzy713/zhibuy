<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminOrderRequest;
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
    public function add(AdminOrderRequest $req)
    {
    	$data = $req->except('_token');

    	$res = (new Order)->add($data);

    	if (!$res) {
    		return show(0,'添加失败');
    	}

    	return show(1,'添加成功');
    }

    /**
     * 订单详情页
     * @return [type] [description]
     */
    public function orderDetail($id)
    {
    	$res = (new Detail)->orderDetail($id);
    	$order = (new Order)->orderInfo($id);

    	return view('admin.orders.orderDetail',['res'=>$res,'order'=>$order,'title'=>'订单详情']);
    }

    /**
     * 订单修改页
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function editOrder($id)
    {
    	$res = (new Order)->orderEdit($id);
    	return view('admin.orders.editOrder',['res'=>$res,'title'=>'修改订单页']);
    }

    /**
     * 修改订单
     * @param  AdminOrderRequest $req [验证参数]
     * @param  [type]            $id  [description]
     * @return [type]                 [description]
     */
    public function updateOrder(AdminOrderRequest $req, $id)
    {
    	$data = $req->except('_token');
    	$res  = (new Order)->updateOrder($id,$data);
    	if ($res) {
    		return show(1,'修改成功');
    	}
		return show(0,'修改失败');
    }
}
