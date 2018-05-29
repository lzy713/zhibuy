<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Cates;

class IndexController extends Controller
{
   

    public function cateslist()
    {

    	return view('layout.home');
    }


    public function goodsfind(Request $req)
    {
        $gname = $req->input('gname');
        $res = DB::table('fd_goods')->where('gname','like','%'.$gname.'%')->paginate(10);
        // dd($find); 
        return view('home.goods.goodslist',['title'=>'商品列表页','res'=>$res,'data'=>'']);
    }
}
