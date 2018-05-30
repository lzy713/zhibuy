<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Cates extends Model
{
     protected $table = 'fd_cates';
     protected $primaryKey = 'cid';
     public $timestamps = false;

     public function goods()
     {
     	
     	return $this->hasMany('App\Model\Admin\Goods','cid','cid');
     }


     
}
