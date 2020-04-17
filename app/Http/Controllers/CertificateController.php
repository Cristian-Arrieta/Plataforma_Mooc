<?php

namespace App\Http\Controllers;
use App\User;
use App\Curso;
use Illuminate\Http\Request;
use App\Certificate;
use Illuminate\Support\Facades\DB;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show(User $user,Curso $curso)
    {		
        return view ('certificados.certificado',compact('user','curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
	
	
	public function imprimir(User $user,Curso $curso){
	$cert = Certificate::where(['user_id' => $user->id,'curso_id' => $curso->id,])->first();
	$today = new \DateTime();
	
	if($cert == null)
	{
		$data['codigo'] = $user->id . '00' .$curso->id;
		$data['user_id'] = $user->id ;
		$data['curso_id'] = $curso->id ;
		$data['fecha'] = $today->format('Y-m-d') ;
		$cert = Certificate::create($data);
	}	
		
	 $today = new \DateTime();
	//echo $today->format('d-m-Y H:i:s');
	
     $pdf = \PDF::loadView('certificados.certificado',compact('user','curso','cert'));
     return $pdf->download('certificado.pdf');
	}
	
}
