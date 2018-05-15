<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'fd_goods';
    protected $primaryKey = 'gid';
    public $timestamps = false;

    
}
