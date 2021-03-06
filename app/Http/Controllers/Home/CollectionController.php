<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Collection;

class CollectionController extends Controller
{
    public function index()
    {
    	$res = Collection::with(['goods'=>function($query){
    		$query->select('gid','gdesc','gname','img','gprice');
    	}])->where('uid',session('homeMsg')->id)->get();
    	return view('home.user.myCollection',['title'=>'我的收藏','res'=>$res]);
    }

    /**
     * 添加收藏
     * @param [type] $id [description]
     */
    public function add($id)
    {
    	$data = [];
    	$data['uid'] = session('homeMsg')->id;
    	$data['gid'] = $id;
    	$data['createtime'] = time();
    	$res = Collection::create($data);
    	return response()->json($res);
    }

    /**
     * 删除收藏
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id)
    {
    	$res = Collection::where('uid',session('homeMsg')->id)->
        where('id',$id)->delete();

    	return response()->json($res);
    }

}
