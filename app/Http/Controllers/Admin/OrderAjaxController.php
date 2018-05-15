<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Order;

class OrderAjaxController extends Controller
{
	/**
	 * 点击发货
	 * @param  Request $req [description]
	 * @return [type]       [description]
	 */
    public function statusAjax(Request $req)
    {
    	$id  = $req->input('id');
    	$res = Order::where('id',$id)->update(['status'=>1]);
    	return  $res;
    }

    /**
     * 点击删除订单
     * @param  Request $req [description]
     * @return [type]       [description]
     */
    public function deleteAjax(Request $req)
    {
    	$id = $req->input('id');
    	//删除被关联的数据
    	$detail = Order::find($id)->detail()->delete();
		if ($detail) {
			//删除当前记录
			Order::where('id',$id)->delete();
			return show(1,'删除成功');
		}			

			return show(0,'删除失败');
    }

    public function editAjax(Request $req)
    {
    	$id  = $req->input('id');
    	$res = Order::select('status')->where('id',$id)->first(); 

    	return $res;
    }
}
