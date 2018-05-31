<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CepingController extends Controller
{

    //测评
    public function evalua()
    {
        $res = DB::table('fd_evaluat')->paginate(15);
    	return view('home.ceping.evalua',['title'=>'智buy测评','res'=>$res]);
    }
    //测评详情页
    public function details($id)
    {
    	
    	$rek = DB::table('fd_evaluat')->where('nid',$id)->first();
    	// dd($rek);
    	return view('home.ceping.details',['title'=>'评测详情页面','rek'=>$rek]);
    }

    //公告详细介绍页
    public function detail($id)
    {
        $res = DB::table('fd_notice')->where('nid',$id)->first();

        // dd($res);

        return view('home.user.detail',['title'=>'公告详情页面','res'=>$res]);

    }
}
