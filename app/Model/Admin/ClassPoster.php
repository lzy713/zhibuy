<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ClassPoster extends Model
{
    //
    protected $table = 'fd_class_poster';
    protected $primarykey = 'id';
    const CREATED_AT = 'addtime';
    const UPDATED_AT = 'uptime';
    //public $timestamps = false;
	protected $fillable = ['title','listorder'];

	//排序
	static public function getListOrder()
	{
		$order = ClassPoster::max('listorder');
		$order = empty($order) ?1 :($order+1);

		return $order;
	}
}
