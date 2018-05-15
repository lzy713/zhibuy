<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'fd_role';
    protected $primarykey = 'id';
    const CREATED_AT = 'addtime';
    const UPDATED_AT = 'uptime';
    //public $timestamps = false;
	protected $fillable = ['name','status'];





}
