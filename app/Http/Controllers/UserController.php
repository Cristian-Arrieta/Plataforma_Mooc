<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManagerStatic as Image; 


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$users = User::paginate();
		return view('users.index',compact('users'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view ('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {				
			$roles = Role::get();			
			return view ('users.edit',compact('user','roles'));
		

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 
	 
    public function update(Request $request, User $user)
    {	
			
		$data = request()->validate(['name'=>'required',
		'lastname'=>'required',
		'email'=>['required','email',Rule::unique('users')->ignore($user->id)],
		'dni'=>['required',Rule::unique('users')->ignore($user->id)],
		'photo' => '',
		'phone_number' =>'',
		'password' => ''],
		['name.required' => 'El campo nombre es Obligatorio',
		'lastname.required' => 'El campo apellido es Obligatorio',
		'email.required' => 'El campo email es Obligatorio',
		'dni.required' => 'El campo dni es Obligatorio',]);
		
		if(!is_numeric($request['dni']))
		{
			return redirect()->route('users.edit',$user->id)->with('alerta',"DNI debe estar compuesto por numeros");
		}
		
		if (strlen($request['dni']) < 8 )
		{
			return redirect()->route('users.edit',$user->id)->with('alerta',"DNI demasiado corto.");
		}
	
		if($data['phone_number'] == null)
		{
			unset ($data['phone_number']);
		}
		else
		{
			if(!is_numeric($request['phone_number']))
			{
				return redirect()->route('users.edit',$user->id)->with('alerta',"Telefono debe estar compuesto por numeros");
			}
		}
		
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
		if($data['password'] == null)
		{
			unset ($data['password']);
		}
		else
		{
			$data['password'] = Hash::make($request->all()['password']);
		}
		
		
		
        $user->update($data);
		
		$user->roles()->sync($request->get('roles'));
		
		return redirect()->route('users.edit',$user->id)->with('info','Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
		return back()->with('info','Eliminado Correctamente');
    }
	
    public function perfil(User $user)
    {
				
		if ( Auth::user()->id == $user->id){			
			return view ('users.perfil',compact('user'));
		}
		else
		{
			return redirect()->route('users.index')->with('alerta','No tiene permiso para actualizar este Usuario ');
		}
    }	
	
    public function perfil_update(Request $request, User $user)
    {	
	
		$data = request()->validate(['name'=>'required',
		'lastname'=>'required',
		'email'=>['required','email',Rule::unique('users')->ignore($user->id)],
		'dni'=>['required',Rule::unique('users')->ignore($user->id)],
		'photo' => '',
		'phone_number' =>'',
		'password' => ''],
		['name.required' => 'El campo nombre es Obligatorio',
		'lastname.required' => 'El campo apellido es Obligatorio',
		'email.required' => 'El campo email es Obligatorio',
		'dni.required' => 'El campo dni es Obligatorio',]);
		
		if(!is_numeric($request['dni']))
		{
			return redirect()->route('users.perfil',$user->id)->with('alerta',"DNI debe estar compuesto por numeros");
		}
		
		if (strlen($request['dni']) < 8 )
		{
			return redirect()->route('users.perfil',$user->id)->with('alerta',"DNI demasiado corto.");
		}
		if($data['phone_number'] == null)
		{
			unset ($data['phone_number']);
		}
		else
		{
			if(!is_numeric($request['phone_number']))
			{
				return redirect()->route('users.perfil',$user->id)->with('alerta',"Telefono debe estar compuesto por numeros");
			}
		}
		
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
		if($data['password'] == null)
		{
			unset ($data['password']);
		}
		else
		{
			$data['password'] = Hash::make($request->all()['password']);
		}
			
		
        $user->update($data);
		
		return redirect()->route('users.perfil',$user->id)->with('info','Perfil actualizado correctamente');
    }
	
    public function filtro (Request $request)
    {
		$name = $request->get('name');
		$email = $request->get('email');
		
		$users = User::orderBy('id','ASC')
			->name($name)
			->email($email)
			->paginate();
		return view('users.index',compact('users'));

    }	
	
}
