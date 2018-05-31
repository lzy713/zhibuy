<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;  
use Session;
use Hash;
use DB;
use Ucpaas;
use App\Http\Requests\UppasswordRequest;

class LoginController extends Controller
{
    //

     public function login(Request $request)
    {
       if(session('homeFlag')){
            return redirect('/login/self_auth');
        }

        
        if(!empty($_SERVER['HTTP_REFERER']))
        {
          session(['pathInfo'=>$_SERVER['HTTP_REFERER']]);
        }
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


    	if (!Hash::check($name['pwd'], $res->password)) {

		    return show(0,'密码错误');
		  }


        //存储session 用户名
        session(['homeFlag'=>true,'homeMsg'=>$res]);

        //dd(session('pathInfo'));
		    if ( !empty(session('pathInfo')) ) {
            $path = session('pathInfo');
            session()->forget('pathInfo');
            return show(1,$path);
        } else {
            return show(1,'/login/self_auth');
        }

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


    //修改保存个人信息
    public  function  save(Request $request,$id)
    {
        $ret = $request->except('_token');
        //dd($ret);


       try{
            DB::table('fd_users')->where('id',$id)->update($ret);

        }catch(\Exception $e){

          return  redirect('/login/self_auth')->with('success','修改成功');
       }

          return  redirect('/login/self_auth')->with('success','修改成功');


    }

    //修改账号密码
    public function safe()
    {
         return view('home.user.safe',['title'=>'更改密码页面']);

    }




    //个人中心的账号安全
     public function changePass(Request $request)
    {
       
        //获取旧密码
        $pass = $request->input('ypass');

        // dd($pass);
        // $poo = Hash::make($pass);
      

        $res = DB::table('fd_users')->where('id',session('homeMsg')->id)->first();

        // dd($res);

        //哈希
        if(!Hash::check($pass,$res->password)){

            return back()->with('msg','输入的旧密码错误'); 
            
        }
          //$foo 是字符串时 数据库内的字段password 以数组方式update存入 $foo
          $foo['password'] = Hash::make($request->input('xpass'));
          // dd($request->input('xpass'));
          // dd($foo);



           $data = DB::table('fd_users')->where('id',session('homeMsg')->id)->update($foo);
           // dd($data);
            if($data){
                return redirect('/login/self_auth');
            }
            

    }


    public function reset()
    {

        return view('home.user.reset',['title'=>'忘记密码页面']);
    }


    public function forget(Request $request)
    {

        $rer = $request->except('_token');

       //dd($rer);
       if($rer['icode']!==session('code'))
       {
        return redirect('/login/reset')->with('msg','验证码错误');
       }

        $rep = DB::table('fd_users')->where('username',$rer['username'])->first();
        
        if(empty($rep))
           {
            return redirect('/login/reset')->with('msgyhm','用户名格式不正确');
           }

       return view('home.user.forgetPassword',['title'=>'安全验证页面','rep'=>$rep]);
    }

   
    //发送短信验证码
    public function note(Request $request)
    {

       $toNumber = $request->input('phone');

       //dd($toNumber);
       // var_dump($toNumber);

         //载入ucpass类
        require_once('./home/register/lib/Ucpaas.class.php');

        //初始化必填
        $options['accountsid']='2ca066293b2b64e88a25bc41576a2b0e';
        $options['token']='b53218feb96a4294b6a85b5b2c23db06';

        //初始化 $options必填
        $ucpass = new Ucpaas($options);


        //开发者账号信息查询默认为json或xml

        $ucpass->getDevinfo('xml');

        $code = rand(111111,999999);

        // $toNumber = $_GET['yzm'];
        // var_dump($toNumber);

        // $_SESSION['code'] = $code;
      
        //tp框架中这样存数据
        // session('code',$code);

        //laravel框架是这样存数据
        session(['notecode'=>$code]);

        $appId = "8fbb4e36c5f141d39f4140e38fa640f8";
        // $to = "13911373063";
        $templateId = "327177";
        $param=$code;

        $ucpass->templateSMS($appId,$toNumber,$templateId,$param);

        echo $code;


        return view('home.user.note',['title'=>'获取短信验证页面','toNumber'=>$toNumber]);

    }

    public function newnote(Request  $request)
    {

      $rew = $request->input('notecode');
      // dd($rew);

      $ree = session('notecode');
      // dd($ree);
      // dd($ree);

      // dd($rew);
      if($rew != $ree){

            return back();

    }else{
            return view('home.user.newnote',['title'=>'新的密码验证页']);
       
    }
        
    }

    public function resetword(Request $request)
    {
       

        // dd($request->all());

        // $pnm = session('pname');
       $rec =Hash::make($request->input('newpwd'));
       // dd($rec);

       $rqc['password']=$rec;

       // dd($rqc);

       // dd(session('homeMsg'));

      $rev = DB::table('fd_users')->where('id',session('homeMsg')->id)->update($rqc);

      // dd($rev);


      if(!$rev){

          return back();

      }else{

         return redirect('/passwordsucce');
      }
     
   
      }


      public  function succe()
      {
        return view('home.user.succe');
      }
  



}
