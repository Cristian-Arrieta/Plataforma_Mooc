<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pregunta extends Model
{
    //
	use SoftDeletes;
	
	protected $fillable = ['pregunta','respuesta','opcion1','opcion2','opcion3','opcion4','opcion5','exam_id'];
	
		protected $dates = ['deleted_at'];
		
	public function exams()
	{
		return $this->belongsTo(Categoria::class , 'categoria_id');
	}		
}
