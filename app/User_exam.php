<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
class User_exam extends Model
{
	//use SoftDeletes;
	
    protected $fillable = ['nota','resp1','resp2','resp3','resp4','resp5','user_id','exam_id','urlPract'];
	//protected $dates = ['deleted_at'];
	

	public function users()
	{
		return $this->belongsTo(User::class , 'user_id');
	}

	public function exams()
	{
		return $this->belongsTo(Exam::class , 'exam_id');
	}


	
}
