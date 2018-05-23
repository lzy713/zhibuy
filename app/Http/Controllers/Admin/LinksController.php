<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class LinksController extends Controller
{
    public function add(Request $req)
    {

    	

    	return view('admin.friendlylinks.linksadd',[

    		'title'=>'友情链接添加'


    	]);
    }



    public function ins(Request $req)
    {
    	$res = $req->except('_token');

    	$res['ctime'] = time();

    	$data = DB::table('fd_friendlylinks')->insert($res);;

    	if($data){
    		return redirect('admin/links/addlinks');
    	} else {
    		return back();
    	}
    }



    public function show(Request $req)
    {
    	
    	$fname = '';
    	$con = [];
    	if( $fname = $req->input('fname') ){
    		$res = DB::table('fd_friendlylinks')->where('fname','like','%'.$fname.'%')->get();
    	} else {
    		$res = DB::table('fd_friendlylinks')->get();
    	}

    	//dd($res);
    	return view('admin.friendlylinks.show',[

    		'title'=>'友情链接',

    		'res'=>$res,
    		'fname'=>$fname

    	]);
    }

   

    public function edit($id)
    {
    	$info = DB::table('fd_friendlylinks')->where('id',$id)->first();

    	return view('admin.friendlylinks.edit',[

    		'title'=>'连接修改',
    		'info'=>$info
    	]);
    }



    public function update(Request $request, $id)
    {
    	$res = $request->except('_token');

    	$data = DB::table('fd_friendlylinks')->where('id',$id)->update($res);

    	if($data){
    		return redirect('admin/links/show');
    	} else {
    		return back();
    	}
    }



    public function delete($id)
    {
    	$data = DB::table('fd_friendlylinks')->where('id',$id)->delete();

    	if($data ){
    		return redirect('admin/links/show');
    	} else {
    		return back();
    	}
    }




}
