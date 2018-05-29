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
        
        /**
         * 判断用户ID 与 商品ID 是否在收藏表里
         * @var [type]
         */
        $flag = false;
        if ( !empty( session('homeMsg')->id ) ) {

            $collection = Collection::select('uid','gid')->get();

            $uid = session('homeMsg')->id;
            
            foreach ($collection as $k => $v) {

                if ( $uid == $v->uid && $id == $v->gid ) {
                    $flag = true;
                }
            }
        }

    	return view('home.goods.goodsdetail',[
    		'title'=>'详情',
    		'res'=>$res,
            'flag'=>$flag
    	]);
    }
}


