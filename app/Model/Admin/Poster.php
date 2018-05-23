<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    protected $table = 'fd_poster';
    protected $primarykey = 'id';
    const CREATED_AT = 'addtime';
    const UPDATED_AT = 'uptime';
    //public $timestamps = false;
	protected $fillable = ['title','pic','listorder','url','cid'];

	//排序
	static public function getListOrder()
	{
		$order = Poster::max('listorder');
		$order = empty($order) ?1 :($order+1);

		return $order;
	}

	//多对一
	public function ClassPoster()
    {
        return $this->belongsTo('App\Model\Admin\ClassPoster','cid','id');
    }


}
