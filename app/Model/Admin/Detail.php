<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'fd_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;

    //那些字段可以被存入数据
    protected $fillable = ['onumber','gid','num','price'];


    /**
     * 定义订单详情表与商品表的多对一关系
     * @return [type] [description]
     */
    public function goods()
    {
    	return $this->belongsTo('App\Model\Admin\Goods','gid','gid');
    }

    /**
     * 定义订单详情表与订单主表的多对一关系
     * @return [type] [description]
     */
    public function order()
    {
    	return $this->belongsTo('App\Model\Admin\order','oid','id');
    }


    public function addDetail($data)
    {
        self::create($data);
    }


    /**
     * 显示订单详情
     * @param  [int] $id [订单主表ID]
     * @return [type]     [description]
     */
    public function orderDetail($number)
    {
    	$res = self::with(['goods'=>function($query){
    		$query->select('gid','gname','img');
    	}])->where('onumber',$number)->get();
    	return $res;

    }

    
}
