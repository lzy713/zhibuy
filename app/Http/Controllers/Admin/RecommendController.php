<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RecommendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //
        $search = $request->input('search');
        // $req = DB::table('fd_tuijian')->orderBy('id')->paginate(10);

        $req= DB::table('fd_tuijian')
            ->join('fd_tuitable','fd_tuijian.path','=','fd_tuitable.tid')
            ->where('gname','like','%'.$search.'%')
            ->orderBy('id')
            ->paginate(10);

            // dd($req);
           // dd($request->all());



        return  view('admin.recommend.index',

            ['title'=>'推荐商品列表','req' => $req,'search' => $search]

           

        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         $ref = DB::table('fd_tuitable')->get();

         // dd($ref);

        return  view('admin.recommend.add',[

            'title'=>'添加推荐商品',

            
            'ref'=>$ref

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
        //

        /*$res = $request->except('_token');

        $arr = $request->get('icon');


        $res['icon'] = $arr['0'];*/
    /*
        $data = DB::table('fd_tuijian')->insert($res);
        if($data){
            return  redirect('admin/recommend');
        }else{
            return  back();
        }*/

        

         // dd($data);
        $res = $request->all();


        try{
            DB::table('fd_tuijian')->insert($res);
        }catch(\Exception $e){
            return show(0,'添加失败');
        }
            return show(1,'添加成功');
       
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

        $req = DB::table('fd_tuijian')->where('id',$id)->first();

        $rec = DB::table('fd_tuitable')->get();

        // dd($rec);


        return view('admin.recommend.edit',['title'=>'商品推荐的修改页面','req'=>$req,'rec'=>$rec]);
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


        $data = DB::table('fd_tuijian')->where('id',$id)->update($res);


        if($data){

            return redirect('/admin/recommend')->with('msg','修改成功');
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
        $red = DB::table('fd_tuijian')->where('id',$id)->delete();


        if($red){
            return redirect('/admin/recommend')->with('mgs','删除成功');
        }else{
            
            return back();
        }


    }


}
