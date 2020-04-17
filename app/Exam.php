<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
class Exam extends Model
{
    //
	use SoftDeletes;
	
	protected $fillable = ['description','name','tipo','urlVideo'];
	protected $dates = ['deleted_at'];
	
	public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }	
	public function modules()
    {
        return $this->belongsToMany('App\Module')->withTimestamps();
    }	
		
	public function preguntas()
    {
        return $this->hasMany('App\Pregunta');
    }
	
	
	public function rendidos()
    {
        return $this->hasMany('App\User_exam');
    }
	
	public  function nota()
	{
		//$aux = $curso->users->where('user_id',Auth::user()->id) 
		$rendidos = $this->rendidos;
		foreach ($rendidos as $res)
		{
			if ($res->user_id == Auth::user()->id ){
				//dd($res->nota);
			return  $res->nota;
			}
		}
		
		return null;
	}	

	public  function alumno()
	{
		//$aux = $curso->users->where('user_id',Auth::user()->id) 
		if(!empty($rendidos = $this->rendidos))
		{
			foreach ($rendidos as $res)
			{
				if ($res->user_id == Auth::user()->id ){
					//dd($res->nota);
				return  $res;
				}
			}		
		}
		else
		{
			return null;
		}
			
	}	
	
}
