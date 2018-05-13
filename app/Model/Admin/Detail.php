<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'fd_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;

    //那些字段可以被存入数据
    protected $fillable = ['oid','gid','num'];


    /**
     * 定义订单详情表与商品表的多对一关系
     * @return [type] [description]
     */
    public function goods()
    {
    	return $this->belongsTo('App\Model\Admin\Goods','gid','gid');
    }



    public function orderDetail($id)
    {
    	$res = self::with('goods')->where('id',$id)->get();

    	return $res;

    }
}
