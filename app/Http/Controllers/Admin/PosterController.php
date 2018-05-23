<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Poster;
use App\Model\Admin\ClassPoster;
use App\Http\Requests\PosterRequest;


class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cid = $request->input('cid');
       

        $classPoster = ClassPoster::orderBy('listorder')->get();

        if(empty($cid)){
            $res = Poster::with('ClassPoster')->orderBy('listorder','desc')->paginate(20);
        }else
        {
          $res = Poster::with('ClassPoster')->where('cid',$cid)->orderBy('listorder','desc')->paginate(20);  
        }
        
        
        return view('admin.poster.index',['title'=>'广告内容管理','res'=>$res,'classPoster'=>$classPoster,'cid'=>$cid]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //分类
        $classPoster = ClassPoster::orderBy('listorder')->get();
        //排序
        $order = Poster::getListOrder();
        return view('admin.poster.create',['title'=>'添加广告内容','order'=>$order,'classPoster'=>$classPoster]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PosterRequest $request)
    {
        $res = $request->all();
        try{
            Poster::create($res);
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
        //分类
        $classPoster = ClassPoster::orderBy('listorder')->get();

        $posters = Poster::where('id',$id)->first();
        return view('admin.poster.edit',['title'=>'修改内容','posters'=>$posters,'classPoster'=>$classPoster]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PosterRequest $request, $id)
    {
        $res = $request->except('_method');
        //dd($res);
        try{
            Poster::where('id',$id)->update($res);
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
            Poster::where('id',$id)->delete();
        }catch(\Exception $e){
            return show(0,'删除失败');
        }
            return show(1,'删除成功');
    }
}
