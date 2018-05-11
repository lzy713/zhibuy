<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'fd_order';
    protected $primaryKey = 'id';

    public $timestamps = false;

    //设置添加那些字段
    protected $fillable = ['uid','consignee','address','phone','number','tprice','status','createtime'];


    /**
     * 定义订单表与用户表的多对一关系
     * uid  当前模型的外键
     * id 被关联的模型的建(一般是主键)
     * @return [type] [description]
     */
    public function user()
    {
    	return $this->belongsTo('App\Model\Home\Users','uid','id');
    }

}
