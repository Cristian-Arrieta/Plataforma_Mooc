<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome2');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

 

Route::get('/test/datepicker', function () {
    return view('datepicker');
});

Route::post('/test/save', ['as' => 'save-date',
                           'uses' => 'DateController@showDate', 
                            function () {
                                return '';
                            }]);

Route::get('categorias/filtro','CategoriaController@filtro')->name('categorias.filtro');
	
Route::get('cat','CategoriaController@index')->name('categorias.index');	
	
	
Route::get('cur','CursoController@index')->name('cursos.index');

Route::get('cur/{curso}','CursoController@show')->name('cursos.show');

Route::get('cursos/filtro','CursoController@filtro')->name('cursos.filtro');

Route::get('cur/{categoria}/filtro','CursoController@filtroCat')->name('cursos.filtroCat');		

Route::middleware(['auth'])->group(function()
{
	
	//ROLES
	
	Route::get('roles/filtro','RoleController@filtro')->name('roles.filtro')
		->middleware('permission:roles.index');
	
	Route::post('roles/store','RoleController@store')->name('roles.store')
		->middleware('permission:roles.create');
		
	Route::get('roles','RoleController@index')->name('roles.index')
		->middleware('permission:roles.index');
	
	Route::get('roles/create','RoleController@create')->name('roles.create')
		->middleware('permission:roles.create')	;
		
	Route::put('roles/{role}','RoleController@update')->name('roles.update')
		->middleware('permission:roles.edit')	;
	
	Route::get('roles/{role}','RoleController@show')->name('roles.show')
		->middleware('permission:roles.show');

	Route::delete('roles/{role}','RoleController@destroy')->name('roles.destroy')
		->middleware('permission:roles.destroy');
	
	Route::get('roles/{role}/edit','RoleController@edit')->name('roles.edit')
		->middleware('permission:roles.edit');

	//USUARIOS
	
	Route::get('users','UserController@index')->name('users.index')
		->middleware('permission:users.index');
		
			
	Route::get('users/filtro','UserController@filtro')->name('users.filtro')
		->middleware('permission:users.index');
		
	
	Route::put('users/{user}','UserController@update')->name('users.update')
		->middleware('permission:users.edit');
	
	Route::get('users/{user}','UserController@show')->name('users.show')
		->middleware('permission:users.show');	
		
	Route::delete('users/{user}','UserController@destroy')->name('users.destroy')
		->middleware('permission:users.destroy');	
		
	Route::get('users/{user}/edit','UserController@edit')->name('users.edit')
		->middleware('permission:users.edit');
		
	Route::get('users/perfil/{user}','UserController@perfil')->name('users.perfil')
		->middleware('permission:users.perfil');
	
	Route::put('users/perfil/{user}','UserController@perfil_update')->name('users.perfil_update')
		->middleware('permission:users.perfil');
		
	//CATEGORIAS
	

	
	Route::get('categorias/create','CategoriaController@create')->name('categorias.create')
		->middleware('permission:categorias.create');
		
	Route::post('categorias/store','CategoriaController@store')->name('categorias.store')
		->middleware('permission:categorias.create');	
		
	Route::get('categorias/{categoria}','CategoriaController@show')->name('categorias.show')
		->middleware('permission:categorias.show');
	
	Route::get('categorias/{categoria}/edit','CategoriaController@edit')->name('categorias.edit')
		->middleware('permission:categorias.edit');
	
	Route::put('categorias/{categoria}/edit','CategoriaController@update')->name('categorias.update')
		->middleware('permission:categorias.edit'); // se agrego /edit a su URL como prueba
		
	Route::delete('categorias/{categoria}','CategoriaController@destroy')->name('categorias.destroy')->middleware('permission:categorias.destroy');
	
	
	//CURSOS
	

		

	
	Route::get('cursos/create','CursoController@create')->name('cursos.create')
		->middleware('permission:cursos.create');
		
	Route::post('cursos/store','CursoController@store')->name('cursos.store')
		->middleware('permission:cursos.create');	
		
	
	
	Route::get('cursos/{curso}/edit','CursoController@edit')->name('cursos.edit')
		->middleware('permission:cursos.edit');
	
	Route::put('cursos/{curso}','CursoController@update')->name('cursos.update')
		->middleware('permission:cursos.edit'); 
		
	Route::delete('cursos/{curso}','CursoController@destroy')->name('cursos.destroy')->middleware('permission:cursos.destroy');
	
	Route::put('cursos/{curso}/inscripcion','CursoController@inscripcion')->name('cursos.inscripcion')
		->middleware('permission:cursos.inscripcion');
		

	
/*
	Route::put('cursos/{curso}/inscripcion','CursoController@show')->name('cursos.cancelacion')
		->middleware('permission:cursos.cancelacion');	//limitar por codigo solo cuando este inscripto , un alumno puede cancelar una inscripcion? 	
		*/
		
	//Modules	

	Route::get('modules/{curso}','ModuleController@index')->name('modules.index')
		->middleware('permission:cursos.index');
	
	Route::get('modules/{curso}/create','ModuleController@create')->name('modules.create')
		->middleware('permission:cursos.edit');
		
	Route::post('modules/{curso}/store','ModuleController@store')->name('modules.store')
		->middleware('permission:cursos.edit');	
		
	Route::get('modules/{module}/show','ModuleController@show')->name('modules.show')
		->middleware('permission:cursos.show');
	
	Route::get('modules/{module}/edit','ModuleController@edit')->name('modules.edit')
		->middleware('permission:cursos.edit');
	
	Route::put('modules/{module}','ModuleController@update')->name('modules.update')
		->middleware('permission:cursos.edit'); 
		
	Route::delete('modules/{module}','ModuleController@destroy')->name('modules.destroy')->middleware('permission:cursos.destroy');
	
		
	//	Temas	

	Route::get('temas/{module}','TemaController@index')->name('temas.index')
		->middleware('permission:cursos.index');
	
	Route::get('temas/{module}/create','TemaController@create')->name('temas.create')
		->middleware('permission:cursos.edit');
		
	Route::post('temas/{module}/store','TemaController@store')->name('temas.store')
		->middleware('permission:cursos.edit');	
		
	Route::get('temas/{tema}/show','TemaController@show')->name('temas.show')
		->middleware('permission:cursos.show');
	
	Route::get('temas/{tema}/edit','TemaController@edit')->name('temas.edit')
		->middleware('permission:cursos.edit');
	
	Route::put('temas/{tema}','TemaController@update')->name('temas.update')
		->middleware('permission:cursos.edit'); 
		
	Route::delete('temas/{tema}','TemaController@destroy')->name('temas.destroy')->middleware('permission:cursos.destroy');
	
	Route::get('temas/{tema}/next','TemaController@siguiente')->name('temas.next')
		->middleware('permission:cursos.show');
	
	//MisCURSOS

		
	Route::get('MisCursos/filtro','CursoController@filtro2')->name('MisCursos.filtro')
		->middleware('permission:cursos.index');	
		
	Route::get('MisCursos/{curso}','CursoController@misshow')->name('MisCursos.misshow')
		->middleware('permission:cursos.show');
	
	//Route::get('MisCursos/{curso}/edit','CursoController@edit')->name('MisCursos.edit')
		//->middleware('permission:cursos.edit');
	
	//Route::put('MisCursos/{curso}','CursoController@update')->name('MisCursos.update')
		//->middleware('permission:cursos.edit'); 	
		
	Route::get('MisCursos','CursoController@index2')->name('MisCursos.index2')
		->middleware('permission:cursos.index');
		
	//Route::get('Mis-cursos','CursoController@index2')->name('cursos.index2')
		//->middleware('permission:cursos.index');		
		

	//Examen
	
	
	Route::get('exams/{module}','ExamController@index')->name('exams.index')
		->middleware('permission:cursos.edit');
	
	Route::get('exams/{module}/create','ExamController@create')->name('exams.create')
		->middleware('permission:cursos.edit');
		
	Route::post('exams/{module}/store','ExamController@store')->name('exams.store')
		->middleware('permission:cursos.edit');	
		
	Route::get('exams/{module}/show','ExamController@show')->name('exams.show')
		->middleware('permission:cursos.edit');
	
	Route::get('exams/{exam}/edit','ExamController@edit')->name('exams.edit')
		->middleware('permission:cursos.edit');
	
	Route::put('exams/{exam}','ExamController@update')->name('exams.update')
		->middleware('permission:cursos.edit'); 
		
	Route::delete('exams/{exam}','ExamController@destroy')->name('exams.destroy')->middleware('permission:cursos.edit');
	
	Route::get('exams/{module}/modelo','ExamController@rendir')->name('exams.modelo')
		->middleware('permission:cursos.edit');
	
	Route::get('exams/{module}/rendir','ExamController@rendir')->name('exams.rendir')
		->middleware('permission:cursos.inscripcion');		

	Route::put('exams/{exam}/nota','ExamController@nota')->name('exams.nota')
		->middleware('permission:cursos.inscripcion');		
		
		
		
	Route::get('exams/{module}/evaluations','ExamController@evaluations')->name('exams.evaluations')
		->middleware('permission:cursos.edit');	
		
	Route::get('exams/{exam}/download','ExamController@desc')->name('exams.desc')
		->middleware('permission:cursos.index');

		
	//Preguntas
	
	Route::get('preguntas/{exam}','PreguntaController@index')->name('preguntas.index')
		->middleware('permission:cursos.edit');
	
	Route::get('preguntas/{exam}/create','PreguntaController@create')->name('preguntas.create')
		->middleware('permission:cursos.edit');
		
	Route::post('preguntas/{exam}/store','PreguntaController@store')->name('preguntas.store')
		->middleware('permission:cursos.edit');	
		
	Route::get('preguntas/{pregunta}/show','PreguntaController@show')->name('preguntas.show')
		->middleware('permission:cursos.edit');
	
	Route::get('preguntas/{pregunta}/edit','PreguntaController@edit')->name('preguntas.edit')
		->middleware('permission:cursos.edit');
	
	Route::put('preguntas/{pregunta}','PreguntaController@update')->name('preguntas.update')
		->middleware('permission:cursos.edit'); 
		
	Route::delete('preguntas/{pregunta}','PreguntaController@destroy')->name('preguntas.destroy')->middleware('permission:cursos.edit');	
	
	
	//User_exam  Correccion
	
	
	Route::get('User_exam/{module}','User_examController@index')->name('User_exam.index')
		->middleware('permission:cursos.edit');
	
	Route::get('User_exam/{module}/show','User_examController@show')->name('User_exam.show')
		->middleware('permission:cursos.inscripcion');
	
	Route::get('User_exam/{exam}/edit','User_examController@edit')->name('User_exam.edit')
		->middleware('permission:cursos.edit');
	
	Route::put('User_exam/{exam}','User_examController@update')->name('User_exam.update')
		->middleware('permission:cursos.edit'); 
		
	Route::get('User_exam/{curso}/estado','User_examController@estado')->name('User_exam.estado')
		->middleware('permission:cursos.inscripcion'); 	
		
	Route::get('User_exam/{curso}/listado','User_examController@listado')->name('User_exam.listado')
		->middleware('permission:cursos.edit'); 	
	
	Route::get('User_exam/{exam}/download','User_examController@desc')->name('User_exam.desc')
		->middleware('permission:cursos.index');
	
	//Certificado
	
	Route::get('Certificado/{user}/{curso}/show','CertificateController@show')->name('Certificado.show')
		->middleware('permission:cursos.edit');	
	Route::get('Certificado/{user}/{curso}/imprimir','CertificateController@imprimir')->name('Certificado.imprimir')
		->middleware('permission:cursos.edit');		


	
});


