<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    //
	use SoftDeletes;
	
    protected $fillable = ['name','description','state'];
	protected $dates = ['deleted_at'];	
	
	public function cursos()
    {
        return $this->belongsToMany('App\Curso')->withTimestamps();
    }	
	public function temas()
    {
        return $this->belongsToMany('App\Tema')->withTimestamps();
    }	

	public function exams()
    {
        return $this->belongsToMany('App\Exam')->withTimestamps();
    }	
	
	public function modulo_examen(User $user)
	{
		
		$idmodule = $this->exams;
		
		if(!empty($idmodule[0]))
		{ 
			$nota = User_exam::where(['user_id'=> $user->id , 'exam_id'=> $idmodule[0]->id ])->get();
			//dd($this );
			if(!empty($nota[0]))
			{//dd($nota->all()[0]->nota);
				
				if($nota->all()[0]->nota == null)
					return 'N/C';
				return $nota[0];
			}		
			else
			{
				//dd('psd');
				return 'N/R';
			}
				
		}
		else
			return 'N/R';
	}

}
