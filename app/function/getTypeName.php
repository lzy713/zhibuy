<?php 

	function getName($pid)
	{
		if($pid == '0'){
			return '根分类';
		} else {
			$res = DB::table('fd_cates')->where('cid',$pid)->first();

			return $res->cname;
		}
	}
 ?>