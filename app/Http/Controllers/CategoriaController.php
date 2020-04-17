<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Illuminate\Validation\Rule;
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::paginate();
		return view ('categorias.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view ('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		$data = request()->validate(['name'=>['required',Rule::unique('categorias')],
		'description'=>''],
		['name.required' => 'El campo Nombre es Obligatorio',]);
		
        $categoria = Categoria::create($request->all());
		
		return redirect()->route('categorias.edit',$categoria->id)->with('info','Categoria guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return view ('categorias.show',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view ('categorias.edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
		request()->validate(['name'=>['required',Rule::unique('categorias')->ignore($categoria->id)],
		'description'=>''],
		['name.required' => 'El campo Nombre es Obligatorio',]);
		
		$categoria->update($request->all());
				
        return redirect()->route('categorias.edit',$categoria->id)->with('info','Categoria actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
		$categoria->delete();
		return back()->with('info','Eliminado Correctamente');
    }
	
	public function filtro (Request $request)
    {
		$name = $request->get('name');
		$desc = $request->get('desc');
		
		$categorias = Categoria::orderBy('id','ASC')
			->name($name)
			->desc($desc)
			->paginate();
		
		return view ('categorias.index',compact('categorias'));

    }	
	
}
