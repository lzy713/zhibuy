<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Goods;
use App\Model\Home\Users;
use App\Model\Home\Comments;
use App\Model\Home\Reply;
use App\Model\Home\Ureply;

class CommentsController extends Controller
{
    public function index($id)
    {
    	$goods = Goods::select('gid','gname')->where('gid',$id)->first();

    	$comments = Comments::with(['users','ureply.users',
            'ureply'=>function($query){
                $query->orderby('createtime','asc');
            },
            'reply'=>function($query){
                $query->orderby('createtime','asc');
            }])->
        where('gid',$id)->
        orderby('createtime','desc')->
        get();
        
    	$res = Comments::with('users')->where('gid',$id)->orderby('createtime','desc')->limit(5)->get();
        $uname = Users::select('username','img')->where('id',session('homeMsg')->id)->first();
    	return view('home.user.comments',[
    		'title'=>'用户评价',
    		'goods'=>$goods,
    		'comments'=>$comments,
    		'res'=>$res,
            'uname'=>$uname
    	]);
    }

    /**
     * 添加评论
     * @param Request $req [description]
     */
    public function addComments(Request $req)
    {
    	$data = [];
    	$data['uid'] = session('homeMsg')->id;
    	$data['content'] = $req->input('text');
    	$data['createtime'] = time();
    	$data['gid'] = $req->input('gid');
    	$res = Comments::create($data);

    	return response()->json($res);
    }

    /**
     * 回复评论
     * @param Request $req [description]
     */
    public function addUreply(Request $req)
    {
    	$data = [];
        $data['content'] = $req->input('text');
    	$data['uid'] = session('homeMsg')->id;
    	$data['createtime'] = time();
    	$data['cid'] = $req->input('cid');
    	$res = Ureply::create($data);

    	return response()->json($res);
    }

    /**
     * 评论点赞
     * @param  Request $req [description]
     * @param  [type]  $id  [description]
     * @return [type]       [description]
     */
    public function addnum(Request $req,$id)
    {
    	$num = $req->input('num');
    	Comments::where('id',$id)->update(['num'=>$num]);
    }
}
