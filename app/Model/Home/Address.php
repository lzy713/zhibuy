<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'fd_address';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = ['uid','province','city','area','street','status','phone','name'];


    /**
     * 购物车添加收货地址
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public static function addAddress($data)
    {
        $data['status'] = 1;
        $info = self::where('uid', session('homeMsg')->id)->first();
        if ( !empty($info->id) ) {
            self::where('uid', session('homeMsg')->id)->update(['status'=>'0']);
            $res = self::where('uid', session('homeMsg')->id)->create($data);
        } else {
            $res = self::create($data);
        }
        
    	return $res;
    }

}
