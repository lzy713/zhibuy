<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'fd_users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    //设置那些字段可以被添加到数据库
    protected $fillable = ['username','name','password','sex','phone','status'];


    /**
     * 定义用户表与订单表的一对多关系
     * @return [type] [description]
     */
    public function orders()
    {
        return $this->hasMany('App\Model\Admin\Orders','id','uid');
    }
}



