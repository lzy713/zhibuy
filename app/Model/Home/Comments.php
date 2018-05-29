<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'fd_comments';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['uid','content','gid','createtime','img'];



    public function users()
    {
    	return $this->hasOne('App\Model\Home\Users','id','uid');
    }

    public function reply()
    {
    	return $this->hasOne('App\Model\Home\Reply','cid','id');
    }

    public function ureply()
    {
        return $this->hasMany('App\Model\Home\Ureply','cid','id');
    }

    public function goods()
    {
        return $this->belongsTo('App\Model\Admin\Goods','gid','gid');
    }
}
