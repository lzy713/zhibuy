<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;  
use Session;
use Hash;
use DB;

class LoginController extends Controller
{
    //

     public function login()
    {
    	return view('home.user.login',['title'=>'前台的登录页面']);	
    }

    //匹配用户名
    public  function loguser(Request $req)
    {

    	$name = $req->except('_token');

    	if(session('code') != $name['pcode']){
    		return show(0,'验证码错误');
    	}
        

    	$res = DB::table('fd_users')->where('username',$name['user'])->first();

       
    	if(!$res){
    		return show(0,'用户名错误');
    	}


  //   	if (!Hash::check($name['pwd'], $res->password)) {

		//     return show(0,'密码错误');
		// }

        //存储session 用户名
        session(['homeFlag'=>true,'homeMsg'=>$res]);

		 return show(1,'登录成功');

    }

        public function loginout(Request $request)
        {
            $request->session()->forget('homeFlag');

            return redirect('/');
        }




	public function captcha()
    {
    	//生成验证码图片的Builder对象,配置相应属性
    	$builder = new CaptchaBuilder(4);

    	//可以设置图片的宽和高
    	$builder->build($width = 120,$height = 50, $font = null);

    	//获取验证码的内容
    	$phrase = $builder->getPhrase();

    	//把内容存入session
    	session(['code'=>$phrase]);

    	//生成图片
    	header("Cache-Control: no-cache, must-revalidate");  
        header('Content-Type: image/jpeg');  
        $builder->output();

    }

    // public function skip()
    // {
    // 	return redirect('/');
    // }

    //个人中心
    public function self(Request $req)
    {
        // return 1234;
        // dd(session('homeMsg')->id);
        //从数据库拿数据
        $res = DB::table('fd_users')->where('id',session('homeMsg')->id)->first();
        // dd($res);


        

        return view('home.user.self_auth',['title'=>'个人中心页面','res'=>$res]);
    }

    public function reset()
    {


        return view('home.user.reset',['title'=>'忘记密码页面']);
    }


    public function forget()
    {
       return view('home.user.forgetPassword',['title'=>'安全验证页面']);
    }

    public function note()
    {
        return view('home.user.note',['title'=>'获取短信验证页面']);
    }
  



}
