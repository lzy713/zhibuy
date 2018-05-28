<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\Goods;
class Cart extends Model
{
    protected $table = 'fd_cart';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['uid','gid','num','prices','status'];

    /**
     * 定义
     * @return [type] [description]
     */
    public function goods()
    {
    	return $this->hasOne('App\Model\Admin\Goods','gid','gid');	
    }


    public static function addCart($gid)
    {
        $data = [];

        //查询商品
        $goods = Goods::where('gid',$gid)->first();
        $data['num'] = 1;
        $data['prices'] = $goods->gprice;
        $data['status'] = '1';
        $data['gid'] = $gid;
        $data['uid'] = session('homeMsg')->id;

        $res = self::create($data);
        return $data;
    }
}
