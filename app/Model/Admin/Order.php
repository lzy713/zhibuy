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

    /**
     * 订单列表显示
     * @param  string $status [按状态查询]
     * @param  string $number [按订单号查询]
     * @return [object] $res  [返回查询的结果]
     */
    public function orderList($status = '', $number = '')
    {
        $condition = [];
        if (!empty($status) || $status == '0') {
            $condition['status'] = $status;
        }
        if (!empty($number)) {
            $condition['number'] = $number;
        }

        if ($condition) {
            $res = self::with('user')->
            where(function($query) use($condition){
                $query->where($condition);
            })->
            paginate(10);
        } else {
            $res = self::with('user')->
            paginate(10);
        }
        
        return $res;
    }

    /**
     * 添加订单
     * @param [array] $data [要添加的信息]
     */
    public function add($data)
    {
        $data['createtime'] = time();
        $res = $this->create($data);

        return $res; 
    }

}
