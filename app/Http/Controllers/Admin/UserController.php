<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //获取数据
        $arr = $request->input('search');
        

        $res = DB::table('fd_users')->
        where('username','like','%'.$arr.'%')->

        paginate(10);
       
        
        return  view('admin.user.index',['title'=>'用户的列表页面','res'=>$res,'search'=>$arr]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  view('admin.user.add',['title'=>'用户的添加页面']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dump($request->all());
        $this->validate($request, [
                'username' => 'required|unique:fd_users|regex:/^\w{6,12}$/',
                "password" => 'required|regex:/^\S{8,16}$/',
                'repass'=>'same:password',
                'phone'=>'required|regex:/^1[345678]\d{9}$/' 
        ],[

                'username.regex'=>'用户名格式不正确',
                'password.required'=>'密码不能为空',
                'password.regex'=>'密码格式不正确',
                'repass.same'=>'两次密码不一致',
                'phone.required'=>'手机号不能为空',
                'phone.regex'=>'手机号码格式不正确'

        ]);

        $res = $request->except('_token','repass');

        //对密码进行哈希加密
        $res['password'] = Hash::make($request->input('password'));

        $data = DB::table('fd_users')->insert($res);

        if($data){

            return  redirect('/admin/user');

        }else{

            return  back();
        }


        // dd($res);

        // echo 1234;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $res = DB::table('fd_users')->where('id',$id)->first();

        // dd($res);

        return view('admin.user.edit',[
            'title'=>'用户的修改页面',
            'res'=>$res

    ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //接收数据

        //$res = DB::table('fd_users')->where('id',$id)->first();

        $res = $request->except('_token','_method');
        $data = DB::table('fd_users')->where('id',$id)->update($res);
        if($data){
            return redirect('/admin/user')->with('msg','修改成功');
        }else{
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        
        $res = DB::table('fd_users')->where('id',$id)->delete();

       
        if ($res) {

            return redirect('/admin/user')->with('msg','删除成功');
         } else {
            return back(); 
        }
          

            
            
    }

    
}
