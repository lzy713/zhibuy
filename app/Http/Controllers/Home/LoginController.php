<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //

     public function login()
    {
    	return view('home.user.login',['title'=>'前台的登录页面']);	
    }

}
