<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tema;
use App\Module;
use Illuminate\Validation\Rule;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Module $module)
    {
		if($module->cursos[0]->relacionado())
		{	
			//$temas = Tema::paginate();
			$temas = $module->temas;
			return view('temas.index',compact('temas','module'));
		}	
		else
			return back()->with('alerta','No tiene acceso al curso : '.$module->cursos[0]->name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Module $module)
    {//dd('create');
        return view ('temas.create', compact('module'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Module $module)
    {//DD($request->all());
	
		$data = request()->validate(['name'=>['required',Rule::unique('users')],
		'texto'=>'',
		'urlVideo' => '',
		'urlMaterial' =>'',],
		['name.required' => 'El campo Nombre es Obligatorio']);
	
        $tema = Tema::create($request->all());
		
		$tema->modules()->sync($module->id);
		
		//return view ('temas.create' , compact('module'))->with('info','Curso guardado correctamente');
		return back()->with('info','Tema guardado Correctamente'); //vuelve automaticamente
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tema $tema)
    {
		if($tema->modules[0]->cursos[0]->relacionado())
		{		
			return view ('temas.show',compact('tema','video'));
		}	
		else
			return back()->with('alerta','No tiene acceso al curso : '.$tema->modules[0]->cursos[0]->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tema $tema)
    {        
		return view ('temas.edit',compact('tema'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tema $tema)
    {
		request()->validate(['name'=>['required',Rule::unique('users')],
		'texto'=>'',
		'urlVideo' => '',
		'urlMaterial' =>'',],
		['name.required' => 'El campo Nombre es Obligatorio']);
		
		
        $tema->update($request->all());
		
		return redirect()->route('temas.edit',$tema->id)->with('info','Tema actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tema $tema)
    {
		$tema->delete();
		return back()->with('info','Eliminado Correctamente');
    }
	
    public function siguiente(Tema $tema)
    {
		$modulo = $tema->modules->first();
		$temas = $modulo->temas->all();
		foreach($temas as $t => $r)
		{
			if($tema->id == $r->id)
			{
				$t = $t +1 ;
				if($t < count($temas) )
				{
					return redirect()->route('temas.show',$temas[$t]);
				}
			}			
		}		
		$curso = $modulo->cursos->first();
		//dd($curso);
		return redirect()->route('MisCursos.misshow',$curso->id)->with('info','Modulos '.$modulo->name.' completado');
    }	
	
}