<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CatesController extends Controller
{

	
    public function cates()
    {
    	
    	$res = DB::table('fd_cates')->select(DB::raw('*,concat(path,cid) as paths'))->orderBy('paths')->get();

    	foreach ($res as $k => $v) {
    		$foo = explode(',', $v->path);
    		$level = count($foo)-1;
    		$v->cname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $level).'|--'.$v->cname;
    	}

    	return view('admin.cates',[
            'title'=>'分类列表页面',
            'res'=>$res
        ]);
    }

    //添加商品分类
    public function add(Request $request)
    {
    	$res = $request->except('_token');



    	if($res['pid'] == '0'){
    		$res['path'] = '0,';
    	} else {
    		$data = DB::table('fd_cates')->where('cid',$res['pid'])->first();
    		$res['path']=$data->path.$data->cid.',';

    		
    	}

    	$res['ctime'] = time();
    	$data = DB::table('fd_cates')->insert($res);


    	if($data){
    		return redirect('admin/cates/index');
    	} else {
    		return back();
    	}
    }


    public function show()
    {

    	$res = DB::table('fd_cates')->select(DB::raw('*,concat(path,cid) as paths'))->orderBy('paths')->get();

    	foreach ($res as $k => $v) {
    		$foo = explode(',', $v->path);
    		$level = count($foo)-1;
    		$v->cname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $level).'|--'.$v->cname;
    	}

    	return view('admin.show',[
            'title'=>'分类页面',
            'res'=>$res
        ]);
    }


    public function edit($cid)
    {

    	$info = DB::table('fd_cates')->where('cid',$cid)->first();

    	$res = DB::table('fd_cates')->select(DB::raw('*,concat(path,cid) as paths'))->orderBy('paths')->get();



    	foreach ($res as $k => $v) {
    		$foo = explode(',', $v->path);
    		$level = count($foo)-1;
    		$v->cname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $level).'|--'.$v->cname;
    	}

    	return view('admin.edit',[
            'title'=>'分类修改',
            'info'=>$info,
            'res'=>$res
            
        ]);
    }



    public function update(Request $request, $cid)
    {
    	$res = $request->except('_token');

    	$data = DB::table('fd_cates')->where('cid',$cid)->update($res);

    	if($res){
    		return redirect('admin/cates/show');
    	} else {
    		return back();
    	}


    }





    public function delete($id)
    {



    	$res = DB::table('fd_cates')->
    	where('path','like','%,'.$id.',%')->
    	delete();

    	
    	$data = DB::table('fd_cates')->where('cid',$id)->delete();

    	if($data){
    		return redirect('/admin/cates/show');
    	} else {
    		return back();
    	}
    }
}
