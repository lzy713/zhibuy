<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Goods;
use App\Model\Home\Collection;

class GoodsController extends Controller
{
    public function show($id)
    {

    	$res = Goods::where('cid',$id)->paginate(10);
    	return view('home.goods.goodslist',[
    		'title'=>'商品列表',
    		'res'=>$res

    	]);
    }


    public function goodsdetails($id)
    {
    	$res = Goods::where('gid',$id)->first();
        $gid = $res->gid;
        $collection = Collection::where('uid',session('homeMsg')->id)->
        where('gid',$gid)->
        first();

    	return view('home.goods.goodsdetail',[
    		'title'=>'详情',
    		'res'=>$res,
            'collection'=>$collection
    	]);
    }
}
