<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $table = 'fd_admin';
    protected $primarykey = 'id';
    const CREATED_AT = 'addtime';
    const UPDATED_AT = 'uptime';
    //public $timestamps = false;
	protected $fillable = ['name','pwd','email','status','rid','content'];

	//访问器
	public function getStatusAttribute($value)
    {
    	$status = [0=>'无效',1=>'有效'];
		return $status[$value];
    }


    //一对一 对应角色表
    public function role()
    {
        return $this->hasOne('App\Model\Admin\Role','id','rid');
    }


}
