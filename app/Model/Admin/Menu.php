<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table = 'fd_menu';
    protected $primarykey = 'id';
    public $timestamps = false;
	protected $fillable = ['title','pid','path','listorder','url'];


	//菜单生成path路径
	static public function getPath($pid=0)
	{
		if($pid== '0'){
            $path = '0,';
        }else{
            $paths = Menu::where('id',$pid)->value('path');
            $path = $paths.$pid.',';
        }

        return $path;
	}

	//排序
	static public function getListOrder()
	{
		$order = Menu::max('listorder');
		$order = empty($order) ?1 :($order+1);

		return $order;
	}


	//递归获取分类信息
    public static function getTypeMessage($pid=0)
    {
        $res = Menu::where('pid',$pid)->orderBy('listorder')->get();

        $sub_type = [];
        foreach($res as $k => $v){

            $v->type = self::getTypeMessage($v->id);

            $sub_type[] = $v;
        }

        return $sub_type;

    }


}
