<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Curso extends Model
{
	
	use SoftDeletes;
	
    protected $fillable = ['name','description','imagen','tipo','inicio','fin','cupo','video','imagen'];
	protected $dates = ['deleted_at'];
	
	 public function categorias()
    {
        return $this->belongsToMany('App\Categoria')->withTimestamps();
    }
	 public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }	
	 public function modules()
    {
        return $this->belongsToMany('App\Module')->withTimestamps();
    }	

	public function cupo_act()
	{
		$res = array();
		$us = $this->users;
		foreach($us as $alumno)
		{
			if($alumno->roles[0]->name == "Alumno")
			{
				$res[] = $alumno;
			}			
		}
		
		return count($res);
	}
	
	public function relacionado()
	{
		$user = Auth::user();
		if ($user->roles[0]->name == 'Admin')
		{
			return true;
		}
		
		$aux = $this->users;
		foreach($aux as $u)
		{
			if($u->id == $user->id)
			{
				return true;
			}
		}
		
		return false;
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
	
	public function getPhotoRouteAttribute()
	{
		/*
		if($this->Imagen)
			return $this->Imagen .'.jpg';
		//dd('ima/users/male.jpg');
		return 'http://localhost/Proyecto_v.1/Plataforma_Mooc/public/ima/users/male.jpg';
		
		*/
		
		if($this->imagen)
		{
			return 'data:image/jpg; base64 ,'.(base64_encode($this->imagen));
		}
			
		//dd('ima/users/male.jpg');
	
		return (asset('img/users/default.bin'));
		
	}
	
}
