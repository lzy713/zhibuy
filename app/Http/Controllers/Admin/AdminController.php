<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\Role;
use App\Http\Requests\AdminRequest;
use Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //一对一关联角色表
        $admins = Admin::with('role')->get();
        return view('admin.admin.index',['title'=>'管理员管理','admins'=>$admins]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //读取角色信息
        $roles = Role::orderBy('id')->get();
        return view('admin.admin.create',['title'=>'管理员添加','roles'=>$roles]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        //剔除确认密码，并对密码进行哈希加密
        $res = $request->except(['repwd']);
        $res['pwd'] = Hash::make($res['pwd']);
        
        try{
            Admin::create($res);
        }catch(\Exception $e){
            return show(0,'添加失败');
        }
            return show(1,'添加成功');

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

        //获取管理员信息
        $admins = Admin::where('id',$id)->first();
        
        //读取角色信息
        $roles = Role::orderBy('id')->get();    

        return view('admin.admin.edit',['title'=>'修改管理员','admins'=>$admins,'roles'=>$roles]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {

        $res = $request->except(['_method']);
        try{
            Admin::where('id',$id)->update($res);
        }catch(\Exception $e){
            return show(0,'修改失败');
        }
            return show(1,'修改成功');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try{
            Admin::where('id',$id)->delete();
        }catch(\Exception $e){
            return show(0,'删除失败');
        }
            return show(1,'删除成功');

    }


    public function adminPass()
    {
        return view('admin.admin.passup',['title'=>'修改密码']);
    }

}
