<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index(){
    	return view('admin.index',['title'=>'智buy商城管理中心']);
	}

	  public function add(){
    	return 123;
	 }


	 
}
