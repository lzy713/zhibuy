<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Home\Address;
use App\Model\Home\Cart;

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
     * 订单表与订单详情表一对多                        
     * @return [type] [description]
     */
    public function detail()
    {
        return $this->hasMany('App\Model\Admin\Detail','onumber','number');
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
    public function add()
    {   
        //主表
        $data = [];
        //收货人信息
        $address = Address::where('uid',1)->where('status','1')->first();
        $data['consignee'] = $address->name;
        $data['address']   = $address->province.' '.$address->city.' '.$address->area.' '.$address->street;
        $data['phone']     = $address->phone;

        $data['createtime'] = time();
        $data['number']     = date('YmdHis',time()).rand(1000,9999);
        $data['uid']        = 1;

        //详情表
        $info = [];
        //商品信息
        $data['tprice'] = 0;
        $Cart = Cart::where('uid',1)->where('status','1')->get();
        foreach ($Cart as $k => $v) {
            $data['tprice'] += $v->prices; 
            $info['num'] = $v->num;
            $info['gid'] = $v->gid;
            $info['onumber'] = $data['number'];
            $info['price'] = ($v->prices)/($v->num);
            (new Detail)->addDetail($info,$data['number']);
            $info = [];
        }

        
        // dd($data['number']);
        $res = $this->create($data);

        //删除购物车的数据
        Cart::where('uid',$data['uid'])->delete();

        return $data['number']; 
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

}
