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
