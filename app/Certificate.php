<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Certificate extends Model
{
    use SoftDeletes;
	
    protected $fillable = ['codigo','detalle','fecha','user_id','curso_id'];
	protected $dates = ['deleted_at'];
	
	public function users()
	{
		return $this->belongsTo(User::class , 'user_id');
	}

	public function cursos()
	{
		return $this->belongsTo(Curso::class , 'curso_id');
	}

	
}
