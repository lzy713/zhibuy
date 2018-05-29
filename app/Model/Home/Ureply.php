<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Ureply extends Model
{
    protected $table = 'fd_ureply';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['cid','uid','content','createtime'];



    public function users()
    {
    	return $this->belongsTo('App\Model\Home\Users','uid','id');
    }
}
