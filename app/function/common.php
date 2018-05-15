<?php

//接收返回信息，json输出
function show($status, $message, $data=array())
{
	$reuslt = array(
		'status' => $status,
		'message' => $message,
		'data' => $data,
	);
	return response()->json($reuslt);
}


//产品分类
function getName($pid)
	{
		if($pid == '0'){
			return '根分类';
		} else {
			$res = DB::table('fd_cates')->where('cid',$pid)->first();

			return $res->cname;
		}
	}
