<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class NavsController extends Controller
{
    public function index()
    {
    	return view('admin.navs.index',[

    		'title'=>'添加导航'
    	]);
    }



    public function add(Request $req)
    {
    	$res = $req->except('_token');

    	$res['ctime'] = time();

    	$data = DB::table('fd_navs')->insert($res);

    	if($data){
    		return redirect('admin/navs/index');
    	} else {
    		return back();
    	}
    }


    public function show(Request $req)
    {

    	$ntitle = '';
    	$con = [];
    	if($ntitle = $req->input('ntitle')){
    		$res = DB::table('fd_navs')->where('ntitle','like','%'.$ntitle.'%')->get();
    	} else {
    		$res = DB::table('fd_navs')->get();
    	}

    	

    	return view('admin.navs.show',[

    		'title'=>'友情链接',

    		'res'=>$res,
    		'ntitle'=>$ntitle
    	]);
    }


    public function edit($id)
    {
    	$info = DB::table('fd_navs')->where('id',$id)->first();

    	return view('admin.navs.edit',[
    		'title'=>'修改',
    		'info'=>$info
    	]);
    }

    public function update(Request $request, $id)
    {
    	$res = $request->except('_token');

    	$data = DB::table('fd_navs')->where('id',$id)->update($res);

    	if($data){
    		return redirect('admin/navs/show');
    	} else {
    		return back();
    	}

    	//dd($res);
    }

    public function delete($id)
    {
    	$data = DB::table('fd_navs')->where('id',$id)->delete();

    	if($data){
    		return redirect('admin/navs/show');
    	} else {
    		return back();
    	}
    }
}