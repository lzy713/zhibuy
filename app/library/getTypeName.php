<?php

	function getName($npid)
	{
			if($npid == '0'){
			
				return '顶级分类';
			}else{

				$res = DB::table('fd_notice')->where('nid',$npid)->first();

				return $res->nname;

			}

	}



?>
