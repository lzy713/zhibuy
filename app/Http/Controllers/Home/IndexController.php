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
        
        // dd($this->a);
        $res = Cates::with('goods')->get();

        

    	return view('layout.home',['res'=>$res]);
    }

}
