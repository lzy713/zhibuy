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


//公告
function getNoticeName($npid)
	{
			if($npid == '0'){
			
				return '顶级分类';
			}else{
				$res = DB::table('fd_notice')->where('nid',$npid)->first();
				
				return $res->nname;
			}
	}

//状态启用禁用
function  foo($str)
{
	if($str == 1){
		return '启用';
	}else{
		return '禁止';
	}
	
} 



