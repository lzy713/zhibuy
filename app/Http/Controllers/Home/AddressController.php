<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Address;

class AddressController extends Controller
{
    /**
     * 个人中心地址页
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //收货信息
        $address = Address::where('uid', session('homeMsg')->id)->orderby('status','asc')->get();
        return view('home.user.address',['title'=>'收货地址','address'=>$address]);
    }

    /**
     * 修改地址页
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
        $address = Address::where('id',$id)->first();
        return view('home.layout.updateAddress',['address'=>$address]);
    }

    /**
     * 修改地址
     * @return [type] [description]
     */
    public function update($data)
    {

    }

    /**
     * 购物车添加地址页
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.shopping.address');
    }

    /**
     * 购物车添加地址
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $res = Address::addAddress($data);
        // return $res;
    }


    public function delAjax($id)
    {
        $res = Address::destroy($id);
        return response()->json($res);
    }

}
