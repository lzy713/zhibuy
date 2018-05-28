<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Cart;
use App\Model\Home\Address;
use App\Model\Admin\Order;
use App\Model\Admin\Goods;

class ShopCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Cart::with('goods')->where('uid',session('homeMsg')->id)->where('status',1)->get();
        $count = 0;
        $prices = 0;
        foreach ($res as $key => $value) {
            $count += $value->num;
            $prices += $value->prices;
        }
        return view('home.shopping.cart',[
            'title'=>'购物车',
            'res'=>$res,
            'count'=>$count,
            'prices'=>$prices
        ]);
    }

    /**
     * 添加订单
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //返回订单号
        $number = (new Order)->add();

        //收货信息
        $address = Address::where('uid', session('homeMsg')->id)->where('status',1)->first();

        $tprice = Order::select('tprice')->where('number',$number)->first();
        
        return view('home.shopping.complete',[
            'title'   => '下单成功',
            'number'  => $number,
            'address' => $address,
            'tprice'  => $tprice->tprice
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $res  = $request->except('_token','_method');
        $info = Cart::where('id',$id)->update($res);
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req,$id)
    {
        $res = Cart::destroy($id);
        $arr = Cart::where('uid', session('homeMsg')->id)->get()->count();
        return $arr;
    }

    /**
     * 确认订单
     * @return [type] [description]
     */
    public function order()
    {
        //商品信息
        $res = Cart::with('goods')->where('uid', session('homeMsg')->id)->where('status','1')->get();
        $count = 0;
        $prices = 0;
        foreach ($res as $key => $value) {
            $count += $value->num;
            $prices += $value->prices;
        }

        //地址
        $address = Address::where('uid', session('homeMsg')->id)->where('status',1)->first();
        return view('home.shopping.order',[
            'title'=>'填写订单信息',
            'address'=>$address,
            'res'=>$res,
            'count'=>$count,
            'prices'=>$prices
        ]);
    }

    
    /**
     * 加入购物车
     * @param [type] $id [description]
     */
    public function addCart($id)
    {
        $res = Cart::addCart($id);
        return response()->json($res);
    }

    /**
     * 加入购物车成功页
     * @return [type] [description]
     */
    public function successCart()
    {
        $goods = Goods::limit(5)->get();

        return view('home.user.successCart',['title'=>'成功加入购物车','goods'=>$goods]);
    }
}
