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


    public function detail()
    {
        return $this->hasMany('App\Model\Admin\Detail','oid','id');
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
        $data['number']     = date('YmdHis',time()).rand(1000,9999);
        // dd($data['number']);
        $res = $this->create($data);

        return $res; 
    }

    /**
     * 返回订单号 订单总金额
     * @param  [int] $id [订单ID]
     * @return [type]     [description]
     */
    public function orderInfo($id)
    {
        return $this->select('id','number','tprice')->
            where('id',$id)->
            first();
    }

    /**
     * 订单修改页，返回收货人，地址，手机号
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function orderEdit($id)
    {
        return $this->select('id','consignee','address','phone')->
            where('id',$id)->
            first();
    }

    /**
     * 修改订单
     * @param  [int]   $id   [订单ID]
     * @param  [array] $data [修改的信息]
     * @return [type]       [description]
     */
    public function updateOrder($id, $data)
    {
        return $this->where('id',$id)->update($data);
    }


    public function deleteAjax($id)
    {
        return $this->Detail()->delete('id',$id);
    }
}
