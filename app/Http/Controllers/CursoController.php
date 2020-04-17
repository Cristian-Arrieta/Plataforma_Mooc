<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Categoria;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManagerStatic as Image; 

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {		
        $cursos = Curso::paginate();

		return view('cursos.index',compact('cursos'));
    }

	public function index2()
    {
        $cur = Curso::paginate();
		$user = Auth::user();
		//dd($cursos[2]);
		$cursos = array();
		foreach($cur as $curso)
		{
			if(DB::table('curso_user')->where(['user_id' => $user->id,'curso_id' => $curso->id,])->exists())
			{
			
				$cursos[] = $curso;
			}				
		}
		return view('Miscursos.index2',compact('cursos'));
    }
	
	public function filtroCat(Categoria $categoria)
    {
        $cursos = $categoria->cursos->all();
		//dd($categoria);
		return view('cursos.filtro',compact('cursos','categoria'));
    }
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::get();
		
		$users = User::get();
		$profesores = array();

		foreach ($users as $prof)
		{						
			if((!empty($prof->roles[0]))&&($prof->roles[0]->name == 'Profesor'))
			{
				$profesores[] = $prof;				
			}	
		
		}	
		
		
		return view ('cursos.create' , compact('categorias','profesores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
	$data = request()->validate(['name'=>['required',Rule::unique('users')],
		'tipo'=>'required',
		'inicio' => '',
		'fin' =>'',
		'cupo' => '',
		'categorias' => 'required',],
		['name.required' => 'El campo Nombre es Obligatorio',
		'tipo.required' => 'El campo Tipo es Obligatorio',
		'categorias.required' => 'El campo Categoria es Obligatorio',]);
		
		$curso = Curso::create($request->all());
		
		$curso->categorias()->sync($request->get('categorias'));
		
		$curso->users()->sync($request->get('users'));
	
		//return redirect()->route('cursos.index')->with('info','Curso guardado correctamente');
		return redirect()->route('cursos.edit' , compact('curso'))->with('info','Curso guardado correctamente');
		//return view ('modules.create' , compact('curso'))->with('info','Curso guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
		
			$modules = $curso->modules();
			if ((Auth::user()) )
			{
				$aux = $curso->users->where('id',Auth::user()->id) ;// $aux = $curso->users->all()? ??? no es mejor

				if(Empty($aux->all()))
				{
					$aux = true;
				}
				else
					$aux = false;
			}
			else
			{
				$aux = false;
			}
			return view ('cursos.show',compact('curso','modules','aux'));
		
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
		
		
		if($curso->relacionado())
		{
			$users = User::get();		
			//$users = User::get(); ALUMNOS 
			$categorias = Categoria::get();
			$profesores = array();
			$alumnos = array();
			foreach ($users as $user)  //tinker que tal si directamente pregunro desde CURSO ????????????
			{						
				if($user->permisos('Profesor'))
				{
					$profesores[] = $user;				
				}			
			}	
			foreach ($users as $user)
			{						
				if($user->permisos('Alumno'))
				{
					$alumnos[] = $user;				
				}	
			
			}
			
			$modules = $curso->modules;
			//dd($modules);
			
			return view ('cursos.edit',compact('curso','categorias','profesores','alumnos','modules'));
		}
		else
			return back()->with('alerta','No tiene acceso al curso : '.$curso->name);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)//restringir el acceso a otros usuarios
	
    {
		
		
	/*
		$user = Auth::user();
		if(($user->permisos('Profesor'))&&($user->cursos[0]->id != $curso->id))
		{
		return redirect()->route('cursos.edit',$curso->id)->with('info','No tiene permiso para actualizar este Curso ');
		
		}
		else
		{*/
	//dd($request);
		$data =request()->validate(['name'=>['required',Rule::unique('users')->ignore($curso->id)],
			'tipo'=>'required',
			'inicio' => '',
			'fin' =>'',
			'cupo' => '',
			'video' => '',
			'imagen' => '',
			'categoria' => 'required',],
			['name.required' => 'El campo Nombre es Obligatorio',
			'tipo.required' => 'El campo Tipo es Obligatorio',
			'categoria.required' => 'El campo Categoria es Obligatorio',]);
		
			
			$data['inicio'] = date($request['inicio']);
			$data['fin'] =date($request['fin']);
			
			/*if(!array_key_exists('users', $request))
			{
				unset ($data['users']);
			}
			else
			{				
				$curso->users()->sync($request['users']);
			}*/
			//dd($request);
			if ($data['tipo'] != 'Masivo')
			{
				$data =request()->validate(['name'=>['required',Rule::unique('users')->ignore($curso->id)],
				'tipo'=>'required',
				'inicio' => 'required',
				'fin' =>'required',
				'cupo' => 'required',
				'imagen' => '',
				'video' => '',
				'categoria' => 'required',],
				['name.required' => 'El campo Nombre es Obligatorio',
				'tipo.required' => 'El campo Tipo es Obligatorio',
				'categoria.required' => 'El campo Categoria es Obligatorio',
				'fin.required' => 'El campo Fecha Fin es Obligatorio',
				'inicio.required' => 'El campo Fecha Inicio es Obligatorio',
				'cupo.required' => 'El campo Cupo es Obligatorio',
				]);
			}
			else
			{
				$data['cupo'] = null;	
				$data['inicio'] = null;
				$data['fin'] = null;	
			}
			
		//	dd($request['imagen']);
		if(!array_key_exists('photo', $data))
		{
			unset ($data['photo']);
		}
		else
		{
			$this->validate($request, ['photo' => 'required|image']);
			
				Image::make($request->file('photo'))
					->resize(300, 400)
					->save('img/users/photo.jpg');
			
			$data['photo'] = file_get_contents('img/users/photo.jpg');
			
		}
		if(!array_key_exists('imagen', $data))
		{
			unset ($data['imagen']);
		}
		else
		{
			$this->validate($request, ['imagen' => 'required|image']);
			
				Image::make($request->file('imagen'))
					->resize(300, 400)
					->save('img/users/imagen.jpg');
			
			$data['imagen'] = file_get_contents('img/users/imagen.jpg');
			
			
		}
			
				
			if(Auth::user()->permisos('Profesor'))
			{
				$aux = array();
				$us = $curso->users;
				
				foreach($us as $u )
				{
					if($u->permisos('Profesor'))
					{
						$aux[] = $u->id.'';
					}
				}
				
				if(array_key_exists('users', $request->all()))
				{
					$data['users'] = array_merge($aux,$request['users']);
				}
				else
				{
					$data['users'] =$aux;					
				}
				
				//dd($data);
			}
			else
			{
				$data['users'] = $request['users'];
			}	
						
			
			$curso->update($data);
			
			$curso->users()->sync($data['users']);
			
			$curso->categorias()->sync($data['categoria']);
					
			return redirect()->route('cursos.edit',$curso->id)->with('info','Curso actualizado correctamente');
	//	}
			
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
		$curso->delete();
		return back()->with('info','Eliminado Correctamente');
    }
	
    public function inscripcion ( Curso $curso)//hacer un sistema T/F pasa inscr?
    {
		//dd($curso->cupo_act());
		
		
		$user = Auth::user();
		$res = array();
		
		if(($curso->tipo == "Preferencial")&&($curso->cupo_act() == $curso->cupo))
		{
			return redirect()->route('cursos.show',$curso->id)->with('alerta','El Curso se encuentra completo en este Momento');
		}
		
		$today = new \DateTime();
		if(($curso->fin < $today->format('Y-m-d'))&&($curso->tipo == "Preferencial"))
		{
			return redirect()->route('cursos.show',$curso->id)->with('alerta','El Curso ha finalizado');
		}
		
			
		foreach($curso->users as $us)
		{
			$res[] = $us->id;
		}
		$res[] = $user->id;
		$curso->users()->sync($res);
		
		return redirect()->route('MisCursos.index2')->with('info','Inscripcion realizada correctamente');
    }
	
    public function misshow(Curso $curso)
    {
		if($curso->relacionado())
		{		
			$users = $curso->users;
			$profesores = array();
			
			foreach ($users as $user)
			{
				if($user->permisos('Profesor'))
				{
					$profesores[] = $user;	
				}
			}
			
			$modules = $curso->modules;
			return view ('MisCursos.show',compact('curso','modules','profesores'));
		}	
		else
			return back()->with('alerta','No tiene acceso al curso : '.$curso->name);	
    }	
	
	   public function filtro (Request $request)
    {
		$name = $request->get('name');
		$desc = $request->get('desc');
		
		$cursos = Curso::orderBy('id','ASC')
			->name($name)
			->desc($desc)
			->paginate();
		return view('cursos.index',compact('cursos'));	

    }	
	
	   public function filtro2 (Request $request)
    {
		$name = $request->get('name');
		$desc = $request->get('desc');
		$user = Auth::user();
		//dd($cursos[2]);
		$cursos = array();
		
		$cur = Curso::orderBy('id','ASC')
			->name($name)
			->desc($desc)
			->paginate();
			
		foreach($cur as $curso)
		{
			if(DB::table('curso_user')->where(['user_id' => $user->id,'curso_id' => $curso->id,])->exists())
			{
			
				$cursos[] = $curso;
			}				
		}
		
		return view('Miscursos.index2',compact('cursos'));

    }
}
