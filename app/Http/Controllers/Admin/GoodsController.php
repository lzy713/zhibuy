<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodsController extends Controller
{
    
	public function add()
	{

		$res = DB::table('fd_cates')->select(DB::raw('*,concat(path,cid) as paths'))->orderBy('paths')->get();



    	foreach ($res as $k => $v) {
    		$foo = explode(',', $v->path);
    		$level = count($foo)-1;
    		$v->cname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $level).'|--'.$v->cname;
    	}

		return view('admin.goods',[
            'title'=>'添加商品',
            'res'=>$res
        ]);
	}


	public function create(Request $request)
	{
		//   多图上传
		$res = $request->except('_token','icon');
		$gid = DB::table('fd_goods')->insertGetId($res);
		if($request->input('icon')){
			$img = $request->input('icon');
			$imgs = [];
			foreach ($img as $k => $v) {
				$gm = [];				
                $gm['gid'] = $gid;
                $gm['img'] = $v;
                $imgs[] = $gm;
			}
		}
		$data = DB::table('fd_goodsimg')->insert($imgs);
		if($data){
            return redirect('admin/goods/add');
        } else {
            return back();
        }

       
       

      

      
	}

	




    ///显示商品啊 啊啊
    public function show()
    {	

    	
    	$res = DB::table('fd_goods')->get();

    	//dd($res);

    	$img = DB::table('fd_goodsimg')->get();



    	return view('admin.goodshow',[
            'title'=>'查看商品',
            'res'=>$res,
            'img'=>$img
        ]);
    }



    //修改
    public function edit($id)
    {
    	$res = DB::table('fd_cates')->select(DB::raw('*,concat(path,cid) as paths'))->orderBy('paths')->get();
    	$into = DB::table('fd_goods')->where('gid',$id)->first();
    	$img = DB::table('fd_goodsimg')->where('gid',$id)->get();

    	//dd($into);

    	//dd($img);

    	foreach ($res as $k => $v) {
    		$foo = explode(',', $v->path);
    		$level = count($foo)-1;
    		$v->cname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $level).'|--'.$v->cname;
    	}

    	//dd($res);
    	return view('admin.goodsedit',[
            'title'=>'修改商品',
            'res'=>$res,
            'into'=>$into,
            'img'=>$img
           
        ]);
    }



    //修改更新
    public function update(Request $request, $id)
    {
    	$res = $request->except('_token','icon');

    	//dd($res);
    	$gid = DB::table('fd_goods')->where('gid',$id)->update($res);


		if($request->input('icon')){
			$img = $request->input('icon');
			$imgs = [];
			foreach ($img as $k => $v) {
				$gm = [];				
                $gm['gid'] = $id;
                $gm['img'] = $v;
                $imgs[] = $gm;
			}

			$into = DB::table('fd_goodsimg')->where('gid',$id)->insert($imgs);
		}


    		 return redirect('admin/goods/show');
    }



    ///删除
    public function delete($id)
    {
    	
    	$goods = DB::table('fd_goods')->where('gid',$id)->delete();
    	$img = DB::table('fd_goodsimg')->where('gid',$id)->delete();

    	if($img){
    		return redirect('admin.goodshow');
    	} else {
    		return back();
    	}
    }




   //删除组图
    public function delimg(Request $request)
    {
    	//dd($request->get('id'));
    	DB::table('fd_goodsimg')->where('id',$request->get('id'))->delete();
    }
}



