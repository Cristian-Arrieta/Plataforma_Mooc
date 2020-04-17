<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Tema;
use App\Module;
use Illuminate\Validation\Rule;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Curso $curso)
    {
        //dd($module = Module::paginate());
		$modules = $curso->modules;
		return view('modules.index',compact('curso','modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Curso $curso)
    {//dd($curso);
        return view ('modules.create' , compact('curso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Curso $curso)
    {//dd($curso);
	
		$data = request()->validate(['name'=>['required',Rule::unique('modules')],
		'description'=>''],
		['name.required' => 'El campo Nombre es Obligatorio',]);
		
		$data['state'] = "Oculto";
	
		//dd($data);
        $module = Module::create($data);
		
		$module->cursos()->sync($curso->id); 
		
	//	return redirect()->route('cursos.edit',$curso->id)->with('info','Modulo actualizado correctamente');
		
		return back()->with('info','Modulo guardado correctamente');
		//return view ('modules.create' , compact('curso'))->with('info','Curso guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
		if($module->cursos[0]->relacionado())
		{		
			$temas = $module->temas;
			//tinker que tal si directamente pregunro desde CURSO ????????????
					
			return view ('modules.show',compact('module','temas'));
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
    public function edit(Module $module)
    {
			
		
		if($module->cursos[0]->relacionado())
		{		
			//$temas = $module->temas; 
			
			return view ('modules.edit',compact('module'));
		}	
		else
			return back()->with('alerta','No tiene acceso al curso : '.$module->cursos[0]->name);	
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module, Curso $curso)
    {
		$data = request()->validate(['name'=>['required',Rule::unique('categorias')->ignore($module->id)],
		'description'=>'',
		'state' => 'required'],
		['name.required' => 'El campo Nombre es Obligatorio',
		'state.required' => 'El campo Estado es Obligatorio']);
		
        $module->update($data);
		//dd($curso->id);
		return redirect()->route('modules.edit',$module->id)->with('info','Modulo actualizado correctamente'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $module->delete();
		return back()->with('info','Eliminado Correctamente');
    }
}

