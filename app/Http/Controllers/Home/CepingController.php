<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CepingController extends Controller
{
    //

    public function evalua()
    {
    	return view('home.ceping.evalua');
    }

    public function details($id)
    {
    	
    	$rek = DB::table('fd_evaluat')->where('nid',$id)->first();

    	// dd($rek);



    	return view('home.ceping.details',['title'=>'评测详情页面','rek'=>$rek]);
    }
}
