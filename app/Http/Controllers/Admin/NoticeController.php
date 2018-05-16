<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $arr = $request->get('search');

        $req = DB::table('fd_notice')->
        select(DB::raw('*,concat(npath,nid) as paths'))->
        orderBy('paths')->

        where('nname','like','%'.$arr.'%')->


        paginate(10);
        // dd($req);
        // dd($arr);
        foreach ($req as $k=>$v) {
           //获取path路径
            $foo = explode(',',$v->npath);
            $level = count($foo)-1;

            $v->nname = str_repeat('&nbsp;&nbsp;&nbsp;',$level).'|--'.$v->nname;
        }


        //获取数据
        // $res = DB::table('fd_notice')->get();
       

         $search = $request->input('search');
         return  view('admin.notice.index',[

            'title'=>'公告列表页面',
            // 'res'=>$res,

            'search'=>$search,
            'req'=>$req
           
           

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
         //显示表单
        $res = DB::table('fd_notice')->
        select(DB::raw('*,concat(npath,nid) as paths'))->
        orderBy('paths')->
        get();

        foreach ($res as $k=>$v) {
           //获取path路径
            $foo = explode(',',$v->npath);
            $level = count($foo)-1;

            $v->nname = str_repeat('&nbsp;&nbsp;&nbsp;',$level).'|--'.$v->nname;
        }

        return  view('admin.notice.add',[
            'title'=>'公告的添加页面',
            'res'=>$res


    ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证
        $res = $request->except('_token');
      
      //添加顶级分类
        if($res['npid'] == '0'){

            $res['npath'] = '0,';
        } else {


            $data = DB::table('fd_notice')->where('nid',$res['npid'])->first();
            // dd($data);

            $res['npath'] = $data->npath.$data->nid.',';
        }
        

        $data = DB::table('fd_notice')->insert($res);

        if($data){

            return redirect('admin/notice');
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

        
        
         $res = DB::table('fd_notice')->where('nid',$id)->first();
         $rec = DB::table('fd_notice')->get();
         // dd($rec);
         // dd($res);

        return view('admin.notice.edit',[
            'title'=>'分类的修改页面',
            'res'=>$res,
            'rec'=>$rec
            

    ]);
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
        //
        $res = $request->except('_token','_method');

        // dd($res);
        $data = DB::table('fd_notice')->where('nid',$id)->update($res);
        // dd($data);

        if($data){
            return redirect('/admin/notice')->with('msg','修改成功');

        }else{
            return  back();
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
        $res = DB::table('fd_notice')->where('npid',$id)->first();

        // dd($res);

        if($res){
            return  back();
        }else{

        $ret = DB::table('fd_notice')->where('nid',$id)->delete();
          if($ret){
            return redirect('/admin/edit')->with('msg','删除成功');
          }else{
            return back();
          }
        // dd($ret);
        }
   }     
}
