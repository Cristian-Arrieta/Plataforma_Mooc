<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable,ShinobiTrait,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 

	 
    protected $fillable = [
        'name','lastname','dni', 'email','phone_number','photo', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
	 
	 /**
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	 */
	
	protected $dates = ['deleted_at'];
	
	public function cursos()
    {
        return $this->belongsToMany('App\Curso')->withTimestamps();
    }	
	
	public function permisos ( String $rol)
	{
		
		if((!empty($this->roles[0]))&&($this->roles[0]->name == $rol))
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	public function rendidos()
    {
        return $this->hasMany('App\User_exam');
    }
	
	public function getPhotoRouteAttribute()
	{
		/*
		if($this->Imagen)
			return $this->Imagen .'.jpg';
		//dd('ima/users/male.jpg');
		return 'http://localhost/Proyecto_v.1/Plataforma_Mooc/public/ima/users/male.jpg';
		
		*/
		
		if($this->photo)
		{
			return 'data:image/jpg; base64 ,'.(base64_encode($this->photo));
		}
			
		//dd('ima/users/male.jpg');
	
		return (asset('img/users/default.bin'));
		
	}

	 public function roles()
    {
        return $this->belongsToMany('Caffeinated\Shinobi\Models\Role')->withTimestamps();
    }		
	

	 public function scopeName($query ,$name)
    {
        if($name)
			return $query->where('name','LIKE', "%$name%");
    }	
	
	 public function scopeEmail($query ,$email)
    {
        if($email)
			return $query->where('email','LIKE', "%$email%");
    }
	
}
