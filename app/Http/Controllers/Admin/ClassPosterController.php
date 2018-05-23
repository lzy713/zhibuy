<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassPosterRequest;
use App\Model\Admin\ClassPoster;

class ClassPosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = ClassPoster::orderBy('listorder')->paginate(10);
        return view('admin.classposter.index',['title'=>'广告分类管理','res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //排序序号
        $order = ClassPoster::getListOrder();
        return view('admin.classposter.create',['title'=>'广告分类添加','order'=>$order]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassPosterRequest $request)
    {
        $res = $request->all();
        try{
            ClassPoster::create($res);
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
        $class = ClassPoster::where('id',$id)->first();
        return view('admin.classposter.edit',['title'=>'广告分类修改','class'=>$class]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClassPosterRequest $request, $id)
    {
        $res = $request->except('_token','_method');
        //dd($res);
        try{
            ClassPoster::where('id',$id)->update($res);
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
            //删除自身
            ClassPoster::where('id',$id)->delete();
        }catch(\Exception $e){
            return show(0,'删除失败');
        }
            return show(1,'删除成功');
    }
}
