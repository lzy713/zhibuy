<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'fd_collection';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['uid','gid','createtime'];


    public function goods()
    {
    	return $this->hasOne('App\Model\Admin\Goods','gid','gid');
    }
}
