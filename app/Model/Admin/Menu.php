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


    //分类排序返回数据 用于栏目管理 插入等级信息
    static public function getOrderMenus($title='')
    {

        $pid = self::where('title','=',$title)->first();
        //如果pid不为空，将pid数据插入到数组，grade等于1，否则数组为空，grade等于0
        if(!empty($pid) || !is_null($pid))
        {
           $pid->grade = 0;
           $meunArr[] = $pid;
           $grade=1;
           $pid = $pid->id;
        }
        else{
            $meunArr = [];
            $pid=0;
            $grade=0;
        }
        
        $menus = self::orderBy('listorder')->get(); 
        self::getMenuMessage($menus, $meunArr,$pid,$grade);

        return $meunArr;
    }



    //分类按等级分类排序
    static private function getMenuMessage($menus, &$arr=[], $pid=0, $grade=0)
    {
        foreach($menus as $k=>$v)
        {
            if($v->pid == $pid)
            {
                $arr[ $v->id ] = $v;
                $v->grade = $grade;
                self::getMenuMessage($menus,$arr,$v->id,$grade+1);
            }
            
        }
    }



    //分类排序返回数据 网站侧导航 角色管理使用
    static public function getOrderMenusNav()
    {
        $menus = self::orderBy('listorder')->get(); 
        $meunArr = self::getMenuNav($menus);
        return $meunArr;
    }

    //分类按等级分类排序
    static private function getMenuNav($menus, $pid=0)
    {
        $sub_type = [];
        foreach($menus as $k=>$v)
        {
            if($v->pid == $pid)
            {
                $arr[ $v->id ] = $v;
                $v->type = self::getMenuNav($menus,$v->id);
                $sub_type[] = $v;
            }
        }
         return $sub_type;
    }



}


