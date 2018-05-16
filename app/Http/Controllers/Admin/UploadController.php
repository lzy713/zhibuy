<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
  
    //上传接口
     public function upimg(Request $request)
    {

        $gimg = $request->file('file');
        $name = rand(1111,9999).time();
        $suffix = $gimg->getClientOriginalExtension();
        $info = $gimg->move('./uploads',$name.'.'.$suffix);

        if ($info) {
            $data = [
                'status' => 1,
                'data' =>  '/uploads/'.$name.'.'.$suffix,
            ];
            return response()->json($data);
        } else {
            return response()->json($file);
        }
    }




}
