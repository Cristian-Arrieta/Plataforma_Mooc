<?php

namespace App\Http\Controllers;
use App\Pregunta;
use App\Exam;

use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Exam $exam)
    {
		$preguntas = $exam->preguntas;
        return view('preguntas.index',compact('preguntas','exam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Exam $exam)
    {
        //
		return view ('preguntas.create' , compact('exam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Exam $exam)
    {
        
		
		
		$res =$request->all();
		$res = array_add($res,'exam_id',"$exam->id");
		//dd($res);
		$pregunta = Pregunta::create($res);
		//$pregunta->Exams()->sync($exam->id);
		
		return back()->with('info','Pregunta guardado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pregunta $pregunta)
    {
        //dd('hdfgfd');
		return view ('preguntas.show',compact('pregunta'));
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pregunta $pregunta)
    {
        //
		return view('preguntas.edit',compact('pregunta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Pregunta $pregunta)
    {// Cosas a tener en cuenta campo RESPUESTA Y NOTA
        $pregunta->update($request->all());
		return redirect()->route('preguntas.edit',$pregunta->id)->with('info','Pregunta actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pregunta $pregunta)
    {
        $pregunta->delete();
		return back()->with('info','Eliminado Correctamente');
    }
}
