<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Model\Admin\Menu;
use App\Model\Admin\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Role::get();
        return view('admin.role.index',['title'=>'角色管理','res'=>$res]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $menu = Menu::getOrderMenusNav();
        return view('admin.role.create',['title'=>'添加角色','menu'=>$menu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        //
        $res = $request->all();
        $res['mid'] = implode(',',$res['mid']);
        try{
            Role::create($res);
        }catch(\Exception $e){
            return show(0,'添加失败',$res);
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
        //栏目
        $menu = Menu::getOrderMenusNav();

        //根据id获取
        $role = Role::where('id',$id)->first();

        //mid数组
        $menuarr = explode(',',$role->mid);

        return view('admin.role.edit',['title'=>'修改角色','menu'=>$menu,'role'=>$role,'menuarr'=>$menuarr]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        //
        $res = $request->except('_token','_method');
        $res['mid'] = implode(',',$res['mid']);
        try{
            Role::where('id',$id)->update($res);    
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
        //
        try{
            Role::where('id',$id)->delete();
        }catch(\Exception $e){
            return show(0,'删除失败');
        }
            return show(1,'删除成功');
    }
}
