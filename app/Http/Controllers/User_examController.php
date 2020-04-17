<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\Module;
use App\User;
use App\Curso;
use App\User_exam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User_examController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Module $module)
    {
		$ex= $module->exams->first();
		
		if($ex == null)
		{
			$exams = null;
			return view ('correccion.index',compact('module','exams','ex'));
		}
		//dd($ex);
		
		$exams = $ex->rendidos;
		
		//dd($exams[0]->users->name);
		return view ('correccion.index',compact('module','exams','ex'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
		$ex = $module->exams->first();
	
		$exam  = $ex->alumno();
		
		if(($ex != null)&&($exam != null))
		{
			$preguntas = $ex->preguntas;
			return view ('correccion.show' , compact('exam','preguntas','ex'));
		}
		
		return redirect()->route('User_exam.index',$module->cursos[0])->with('info','Usted no rindio este Examen');
	
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User_exam $exam)
    {
        $ex= $exam->exams;
		//dd($ex);
		$preguntas = $ex->preguntas;
		//dd($exam);
		return view ('correccion.edit' , compact('exam','preguntas','ex'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User_exam $exam)
	{	//dd($request);
		$exam->nota = $request['nota'];
		//dd($exam->all());
		$exam->update($exam->toArray());
        return redirect()->route('User_exam.edit',$exam->id)->with('info','Examen actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
    public function estado(Curso $curso)
	{	//dd($exam->toArray());
		
		$modules = $curso->modules;
		
			
        return view ('correccion.estado' , compact('modules'));
    }	
	
	public function listado(Curso $curso)
	{	//dd($exam->toArray());
		
		$modules = $curso->modules;
		$res =  $curso->users; 
		$users = array();
		foreach ($curso->users as $user)
		{
			if($user->permisos('Alumno'))
				$users[] = $user;
		}
		
        return view ('correccion.listado' , compact('modules','users'));
    }	
	
	public function desc (User_exam $exam)
    {				
		return response()->download($exam["urlPract"]);
    }
}
