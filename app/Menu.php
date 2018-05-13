<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table = 'fd_menu';
    protected $primarykey = 'id';
    public $timestamps = false;
	protected $fillable = ['title','pid','path','listorder','url'];
}
