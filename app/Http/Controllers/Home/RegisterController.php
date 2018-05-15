<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    //
     public function register()
    {
    	return view('home.user.register',['title'=>'小米账号-注册']);	
    }

}
