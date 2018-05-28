<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Comments;
use App\Model\Home\Reply;
use App\Model\Home\Users;


class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        

        $condition = [];
        if (!empty($username = $req->input('username'))) {
            $uid = Users::select('id')->where('username',$username)->first();
            $condition['uid'] = $uid->id;
        }

        if ($condition) {
            $comments = Comments::with('users','goods','reply')->
            where(function($query) use($condition){
                $query->where($condition);
            })->
            orderby('createtime','desc')->
            paginate(10);
        } else {
            $comments = Comments::with('users','goods','reply')->orderby('createtime','desc')->paginate(10);
        }
        return view('admin.orders.comments',['title'=>'评论列表','comments'=>$comments,'username'=>$username]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = $request->except('_token');
        $data = [];
        $data['cid'] = $content['id'];
        $data['content'] = $content['text'];
        $data['createtime'] = time();

        Reply::create($data);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $content = $request->input('val');
        Reply::where('id',$id)->update(['content'=>$content]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除被关联的数据
        $detail = Comments::find($id)->reply()->delete();
        //删除当前记录
        $res = Comments::where('id',$id)->delete();

        if ($res) {
            return show(1,'删除成功');
        }
            
          return show(0,'删除失败');
    }
}
