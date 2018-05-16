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



		$res = $request->except('_token','icon');

		//dd($res);

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
		//dd($imgs);
		$data = DB::table('fd_goodsimg')->insert($imgs);



		if($data){

            return redirect('admin/goods/add');
        } else {

            return back();
        }
	}

	//上传接口
     public function upimg(Request $request)
    {


        //return $request->file('file');
         //处理图片


                $gimg = $request->file('file');
                $name = rand(1111,9999).time();
                $suffix = $gimg->getClientOriginalExtension();
                $info = $gimg->move('./uploads',$name.'.'.$suffix);


                //$gm['gimgs'] = '/uploads/'.$name.'.'.$suffix;
                


                if ($info) {
                    $data = [
                        'status' => 1,
                        'data' =>  '/uploads/'.$name.'.'.$suffix,
                    ];
                    echo exit(json_encode($data));
                } else {
                    echo exit(json_encode($file->getError()));
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

}
