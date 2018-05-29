<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Friendlylinks extends Model
{
    protected $table = 'fd_friendlylinks';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
