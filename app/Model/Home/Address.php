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
     * 添加收货地址
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public static function addAddress($data)
    {
        self::where('uid',1)->update(['status'=>'0']);
        $data['status'] = 1;
    	$res = self::where('uid',1)->create($data);
    	return $res;
    }

}
