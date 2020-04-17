<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\Module;
use App\User;
use App\User_exam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Filesystem ;
use File;
use Intervention\Image\ImageManagerStatic as Image; 
use Illuminate\Validation\Rule;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Module $module)
    {

		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Module $module)
    {
        //
		return view ('exams.create' , compact('module'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Module $module)
    {
		
		request()->validate(['name'=>'required',
			'description'=>'',
			'tipo' => 'required',
			'practico' =>'',],
			['name.required' => 'El campo Nombre es Obligatorio',
			'tipo.required' => 'El campo Tipo es Obligatorio',]);
        //
		//dd($request->all());
		$exam = Exam::create($request->all());
		$exam->modules()->sync($module->id);
		
		return redirect()->route('exams.edit' , compact('exam'))->with('info','Examen creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(module $module)
    {
		if($module->cursos[0]->relacionado())
		{	
			$exam = $module->exams->first();
			
			//dd($exam);
			//
			if ($exam != null){
			$preguntas = $exam->preguntas;
			}
			//dd($preguntas);
			return view ('exams.show' , compact('exam','preguntas','module'));
		}	
		else
			return back()->with('alerta','No tiene acceso al curso : '.$module->cursos[0]->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
		if($exam->modules[0]->cursos[0]->relacionado())
		{	
			return view ('exams.edit',compact('exam'));
		}	
		else
			return back()->with('alerta','No tiene acceso al curso : '.$exam->modules[0]->cursos[0]->name);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Exam $exam)
    {//dd($request);
        request()->validate(['name'=>'required',
			'description'=>'',
			'tipo' => 'required',
			'practico' =>'',],
			['name.required' => 'El campo Nombre es Obligatorio',
			'tipo.required' => 'El campo Tipo es Obligatorio',]);
		
		IF($request->tipo == "Practico")
		{
			if(!array_key_exists('practico', $request->all()))
			{
				unset ($request['practico']);
			}
			else
			{
											
				$dir = $exam->Modules[0]->id ."00".$exam->Modules[0]->cursos[0]->id;
				
			
				$this->validate($request, ['practico' => 'required|mimes:pdf,doc,docx']);	
				
				$exten = $request->file('practico')->getClientOriginalExtension();
			  
				$nom = $exam->Modules[0]->id ."00".$exam->Modules[0]->cursos[0]->id ."00". $exam->id;
				
				\Storage::putFileAs('Practicos/'.$dir, $request->file('practico'),$nom.'.'.$exten);
				
				$exam["urlPract"] = (Storage_path().'\\app\\Practicos\\'.$dir.'\\'.$nom.'.'.$exten);
				
				//\Storage::putFileAs('Practicos/'.$dir, $request->file('practico'),$nom.'.pdf');
				
				//$exam["urlPract"] = (Storage_path().'\\app\\Practicos\\'.$dir.'\\'.$nom.'.pdf');
			}
		//	return response()->download(Storage_path().'\\app\\Practicos\\'.$dir.'\\'.$nom.'.pdf');
					
		}
		$exam->update($request->all());
		return redirect()->route('exams.edit',$exam->id)->with('info','Examen actualizado correctamente'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
		$exam->delete();
		return back()->with('info','Eliminado Correctamente');
    }
	
	
	
	
    public function rendir(Module $module)
    {
		
		$exam = $module->exams->first();
		
		if(($exam != null)&&($exam->alumno() == null)){
			//dd($exam->alumno());
			//
			$preguntas = $exam->preguntas;
			//dd($preguntas);
			return view ('exams.rendir',compact('exam','preguntas'));
		}
		else
		
		return redirect()->route('modules.show',$module)->with('info','Usted no puede rendir este Examen');
	
    }	
	
	
	
	public function nota (Request $request,Exam $exam)
    {
		$res = $request->all();		
		$user = Auth::user();		
		$res['user_id'] = $user->id;
		$res['exam_id'] = $exam->id;
		
		if($exam["tipo"] ==  "Practico" )
		{
			if(!array_key_exists('practico', $request->all()))
			{
				unset ($request['practico']);
			}
			else
			{
				$dir = $exam->Modules[0]->id ."00".$exam->Modules[0]->cursos[0]->id;
				
			//dd($request);
			   $this->validate($request, ['practico' => 'required|mimes:pdf,doc,docx']);	
				
				$exten = $request->file('practico')->getClientOriginalExtension();
							  
				$nom = $exam->Modules[0]->id ."00".$exam->Modules[0]->cursos[0]->id ."00". $exam->id .
				"00" . $user->id ;
				
				\Storage::putFileAs('Practicos/'.$dir, $request->file('practico'),$nom.'.'.$exten);
				
				$res["urlPract"] = (Storage_path().'\\app\\Practicos\\'.$dir.'\\'.$nom.'.'.$exten);
			}				
		}
		
		
		$asd = User_exam::create($res);
		
		//dd($asd );
		return redirect()->route('MisCursos.index2',$exam->id)->with('info','Examen Enviado correctamente'); 
    }	
	
    public function modelo (Module $module)
    {
        //
		$exam = $module->exams->first();
		//dd($exam);
        //
		$preguntas = $exam->preguntas;
		//dd($preguntas);
		return view ('exams.show',compact('exam','preguntas'));
    }
	
	public function correccion (Request $request,User_exam $exam)
    {
		$exam->update($request->all());
		
		//dd($res);
		//dd($user);
		//DB::table('user_exam')->insert(['user_id' => $user->id,'exam_id' => $exam->id ]);
        //
		
		//dd($asd );
		return redirect()->route('cursos.index',$exam->id)->with('info','Examen actualizado correctamente'); 
    }	

	public function desc (Exam $exam)
    {				
		return response()->download($exam["urlPract"]);
    }
	
}
