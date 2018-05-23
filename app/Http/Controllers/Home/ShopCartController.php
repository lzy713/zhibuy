<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Cart;
use App\Model\Home\Address;
use App\Model\Admin\Order;

class ShopCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Cart::with('goods')->where('uid',1)->where('status',1)->get();
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
        $address = Address::where('uid',1)->where('status',1)->first();

        $tprice = Order::select('tprice')->where('number',$number)->first();
        
        return view('home.shopping.complete',[
            'title'   => '下单成功',
            'number'  => $number,
            'address' => $address,
            'tprice'  => $tprice->tprice
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $uid = $req->input('uid');
        $res = Cart::destroy($id);
        $arr = Cart::where('uid',$uid)->get()->count();
        return $arr;
    }

    /**
     * 确认订单
     * @return [type] [description]
     */
    public function order()
    {
        //商品信息
        $res = Cart::with('goods')->where('uid',1)->where('status','1')->get();
        $count = 0;
        $prices = 0;
        foreach ($res as $key => $value) {
            $count += $value->num;
            $prices += $value->prices;
        }

        //地址
        $address = Address::where('uid',1)->where('status',1)->first();
        return view('home.shopping.order',[
            'title'=>'填写订单信息',
            'address'=>$address,
            'res'=>$res,
            'count'=>$count,
            'prices'=>$prices
        ]);
    }

}
