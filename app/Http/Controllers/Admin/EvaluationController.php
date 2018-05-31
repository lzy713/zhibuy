<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search =  $request->input('search');

        $rew = DB::table('fd_evaluat')->where('nname','like','%'.$search.'%')->paginate(10);
        // dd($rew);

     


        return  view('admin.evaluat.index',['title'=>'评测列表页面','rew'=>$rew,'search'=>$search]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return  view('admin.evaluat.add',['title'=>'评测添加页面']);

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收数据
        $res = $request->except('_token');
        // dd($res);
        //存入数据库
       $ret = DB::table('fd_evaluat')->insert($res);

       if($ret){
        return redirect('/admin/evaluation');
       }else{
        return back();
       }
      
      
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
        $ref = DB::table('fd_evaluat')->where('nid',$id)->first();

        // dd($ref);

        return view('admin.evaluat.edit',['title'=>'测评修改页面','ref'=>$ref]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        

        $rec = $request->except('_token','_method');

        // dd($id);

       $data = DB::table('fd_evaluat')->where('nid',$id)->update($rec);

       // dump($data);
         if($data){

            return redirect('/admin/evaluation')->with('msg','修改成功');
        }else{

            return back();
        }

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


    
        $red = DB::table('fd_evaluat')->where('nid',$id)->delete();

        // dd($red);

        if($red){

            return redirect('/admin/evaluation')->with('msg','删除成功');
        }else{

            return back();
        }
    }

}
