<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
	
	use SoftDeletes;
	
    protected $fillable = ['name','description'];
	protected $dates = ['deleted_at'];
	
	
	 public function cursos()
    {
        return $this->belongsToMany('App\Curso')->withTimestamps();
    }	
	
	public function scopeName($query ,$name)
    {
        if($name)
			return $query->where('name','LIKE', "%$name%");
    }	
	
	 public function scopeDesc($query ,$desc)
    {
        if($desc)
			return $query->where('description','LIKE', "%$desc%");
    }
}
