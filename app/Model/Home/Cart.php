<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'fd_cart';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['uid','gid','num','prices'];

    /**
     * 定义
     * @return [type] [description]
     */
    public function goods()
    {
    	return $this->hasOne('App\Model\Admin\Goods','gid','gid');	
    }
}
