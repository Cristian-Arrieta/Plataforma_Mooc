<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tema extends Model
{
	use SoftDeletes;
	
    protected $fillable = ['name','texto','urlVideo','urlMaterial'];
	protected $dates = ['deleted_at'];
	
	public function modules()
    {
        return $this->belongsToMany('App\Module')->withTimestamps();
    }	
}
