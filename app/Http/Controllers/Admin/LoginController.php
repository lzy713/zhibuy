<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Gregwar\Captcha\CaptchaBuilder;  
use Session;
use Hash;
use DB;
use App\Model\Admin\Admin;
use App\Model\Admin\Role;

class LoginController extends Controller
{
    //登录页
    public function login()
    {
    	if(session('adminFlag') == true && session('adminMsg')!=NULL){
    		return redirect('/admin/index');
    	}else{
    		return view('admin.login.index');
    	}
    }

    //登录
    public function doLogin(LoginRequest $request)
    {
    	$res = $request->all();
    	$code = session('code');

    	//判断验证码
    	if($res['code'] != $code)
    	{
    		return show(0,'验证码错误');
    	}

    	//获取用户信息
    	$data = Admin::where('name',$res['name'])->first();

    	if(!$data)
    	{
    		return show(0,'用户名或密码错误');
    	}

    	//验证密码
    	if (!Hash::check($res['pwd'], $data->pwd)) {
    		return show(0,'用户名或密码错误');
		}

		//判断状态
		if($data->getOriginal('status') == 0)
		{
			return show(0,'禁止登录');
		}
    	
		//获取权限栏目id
		$rids = DB::table('fd_role')->where('id',$data->rid)->first();

		//判断角色状态
		if($rids->status == 0)
		{
			return show(0,'禁止登录');
		}

		//获取url
		$menuUrl = DB::table('fd_menu')->whereIn('id',explode(',',$rids->mid))->pluck('url');
		//将url拼接成字符串
		$menuUrl = implode(',',json_decode(json_encode($menuUrl)));
    	

    	//记录session 登录标记       会员信息         栏目id集合             url字符串 
    	session(['adminFlag'=>true,'adminMsg'=>$data,'adminMid'=>$rids->mid,'menuUrl'=>$menuUrl]);

        //登录记录
        DB::table('fd_admin_log')->insert(['uid'=>$data->id,'ip'=>$_SERVER['REMOTE_ADDR'],'logintime'=>time()]);

    	return show(1,'登录成功');

    }


    //退出登录
    public function outLogin(Request $request)
    {
    	
    	//删除session
    	$request->session()->forget('adminFlag');
    	$request->session()->forget('adminMsg');
    	return redirect('/admin/login');

    }


    //生成验证码
    public function captcha()
    {
    	 //生成验证码图片的Builder对象，配置相应属性  
        $builder = new CaptchaBuilder(4);  
        //可以设置图片宽高及字体  
        $builder->build($width = 116, $height = 36, $font = null);  
        //获取验证码的内容  
        $phrase = $builder->getPhrase();
        //把内容存入session  
        session(['code'=>$phrase]);
        $builder->output();
    }

}
