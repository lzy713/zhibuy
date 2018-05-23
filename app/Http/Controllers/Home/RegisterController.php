<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;
use DB;
use Ucpaas;
use Hash;

class RegisterController extends Controller
{
    
     public function register()
    {
    	return view('home.user.register',['title'=>'小米账号-注册']);	
    }
    
    //匹配用户名
    public function checkuser(Request $req)
    {

    	// echo $_GET['name'];

    	$name = $req->get('name');
    	// echo $name;

    	$res = DB::table('fd_users')->where('username',$name)->first();

    	 // var_dump($res);
    	if($res){
    		echo 1;
    	}else{
    		echo 0;
    	}

    	
    }

    //获取手机号  检测验证码
    public function checkphone(Request $req)
    {

    	// echo $_GET['mobile'];

    	// $res = $req->get('number');

    	// echo $res;

    	
        //载入ucpass类
        require_once('./home/register/lib/Ucpaas.class.php');

        //初始化必填
        $options['accountsid']='863b17f6a3846c92edd0a837088db3b5';
        $options['token']='2eb1f6c22332de9eb5ccaf64f157baa8';


        //初始化 $options必填
        $ucpass = new Ucpaas($options);


        //开发者账号信息查询默认为json或xml

        $ucpass->getDevinfo('xml');





        $code = rand(111111,999999);

        $toNumber = $req->get('number');

        // $_SESSION['code'] = $code;
      
        //tp框架中这样存数据
        // session('code',$code);

        //laravel框架是这样存数据
        session(['code'=>$code]);

        $appId = "985fddd141454a978d48cf9dd4cccfd5";
        // $to = "13911373063";
        $templateId = "30047";
        $param=$code;

        $ucpass->templateSMS($appId,$toNumber,$templateId,$param);

        echo $code;

    }

    public function code(Request $req)
    {

        $cd = $req->get('cd');
        //session 存数据
        $res = session('code');

        if($cd != $res){

            echo '0';

        }else{

            echo '1';
        }
    }




   
    public function regist(Request $req)
    {
       //获取数据
        $arr = $req->except('_token','verifyCode','confirmPassword');
        $arr['status'] =1;
      //对密码进行hash加密

        $arr['password']= Hash::make($req->post('password'));
        // dd($arr);

        //添加到数据库
        $res = DB::table('fd_users')->insert($arr);

        if($res){
            return redirect('/login');
        }else{
            return back();
        }


       // return  123;
    }

}
