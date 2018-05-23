<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequests;
use App\Model\Admin\Menu;
use DB;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$res = Menu::select(DB::raw('*,concat(path,id) as paths'))->orderBy('paths')->orderBy('listorder')->where('title','like','%'.$request->input('key').'%')->get(); 
        
        foreach ($res as $k => $v) {
            //获取path路径
            $foo = explode(',',$v->path);
            $leval = count($foo)-2;
            $v->title = str_repeat('&nbsp;&nbsp;&nbsp;',$leval).'|--'.$v->title;
        }*/   

        // /获取栏目信息
        $res = Menu::getOrderMenus($request->input('key'));

        return view('admin.menu.index',['title'=>'菜单管理','res'=>$res,'key'=>$request->input('key')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

       /* $res = Menu::select(DB::raw('id,path,title,concat(path,id) as paths'))->orderBy('paths')->orderBy('listorder','desc')->where('pid','0')->get();
        foreach ($res as $k=>$v)
        {
            $foo = explode(',',$v->path);
            $leval = count($foo)-2;
            $v->title = str_repeat('&nbsp;&nbsp;&nbsp;',$leval).'|--'.$v->title;
        }*/

        // /获取栏目信息
        $res = Menu::getOrderMenus();

        //排序序号
        $order = Menu::getListOrder();
        return view('admin.menu.create',['title'=>'添加菜单','res'=>$res,'order'=>$order,'id'=>$request->input('id')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequests $request)
    {
      
        $res = $request->all();
        $res['path'] = Menu::getPath($res['pid']);
        try{
            Menu::create($res);
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
        /*//
        $res = Menu::select(DB::raw('id,path,title,concat(path,id) as paths'))->orderBy('paths')->orderBy('listorder','desc')->where('pid','0')->get();
        foreach ($res as $k=>$v)
        {
            $foo = explode(',',$v->path);
            $leval = count($foo)-2;
            $v->title = str_repeat('&nbsp;&nbsp;&nbsp;',$leval).'|--'.$v->title;
        }*/

        // /获取栏目信息
        $res = Menu::getOrderMenus();

        $menu = Menu::where('id',$id)->first();
        return view('admin.menu.edit',['title'=>'修改菜单','id'=>$id,'res'=>$res,'menu'=>$menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequests $request, $id)
    {
        //
        $res = $request->except('_token','_method');
        $res['path'] = Menu::getPath($res['pid']);
        try{
            Menu::where('id',$id)->update($res);
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
            //删除子菜单
            Menu::where('path','like','%,'.$id.'%,')->delete();

            //删除自身
            Menu::where('id',$id)->delete();
        }catch(\Exception $e){
            return show(0,'删除失败');
        }
            return show(1,'删除成功');
    }




    //多图上传测试
    public function createup(Request $request)
    {
         return view('admin.menu.createup',['title'=>'添加菜单']);
    }





}