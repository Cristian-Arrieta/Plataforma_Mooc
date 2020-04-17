<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //		
		
		Permission::create([
			'name' => 'Navegar usuarios',
			'slug' => 'users.index',
			'description' => 'Lista y navega todos los usuarios del sistema',
		]);
		
		Permission::create([
			'name' => 'Ver detalle de usuario',
			'slug' => 'users.show',
			'description' => 'Ver en datalle cada usuarios del sistema',
		]);
		
		Permission::create([
			'name' => 'Edicion de usuarios',
			'slug' => 'users.edit',
			'description' => 'Editar cualquier dato de un usuario del sistema',
		]);		
		
		Permission::create([
			'name' => 'Edicion de perfil de usuario',
			'slug' => 'users.perfil',
			'description' => 'Editar dato del perfil',
		]);	
		
		Permission::create([
			'name' => 'Eliminar usuarios',
			'slug' => 'users.destroy',
			'description' => 'Eliminar cualquier dato de un usuario del sistema',
		]);		
		
		
		///////////////////////////////////////////////////////////////////////////////////////////
		
				
		Permission::create([
			'name' => 'Navegar roles',
			'slug' => 'roles.index',
			'description' => 'Lista y navega todos los roles del sistema',
		]);
		
		Permission::create([
			'name' => 'Ver detalle de roles',
			'slug' => 'roles.show',
			'description' => 'Ver en datalle cada roles del sistema',
		]);
		
		Permission::create([
			'name' => 'Crear roles',
			'slug' => 'roles.create',
			'description' => 'Crea cualquier dato de un rol del sistema',
		]);			
		
		Permission::create([
			'name' => 'Edicion de roles',
			'slug' => 'roles.edit',
			'description' => 'Editar cualquier dato de un rol del sistema',
		]);					
		
		Permission::create([
			'name' => 'Eliminar roles',
			'slug' => 'roles.destroy',
			'description' => 'Eliminar cualquier dato de un rol del sistema',
		]);	
		
		
		/////////////////////////////////////////////////////////////////////////////////////
		
						
		Permission::create([
			'name' => 'Navegar categorias',
			'slug' => 'categorias.index',
			'description' => 'Lista y navega todos los categorias del sistema',
		]);
		
		Permission::create([
			'name' => 'Ver detalle de categorias',
			'slug' => 'categorias.show',
			'description' => 'Ver en datalle cada categorias del sistema',
		]);
		
		Permission::create([
			'name' => 'Crear categorias',
			'slug' => 'categorias.create',
			'description' => 'Crea cualquier dato de una categoria del sistema',
		]);			
		
		Permission::create([
			'name' => 'Edicion de categorias',
			'slug' => 'categorias.edit',
			'description' => 'Editar cualquier dato de una categoria del sistema',
		]);					
		
		Permission::create([
			'name' => 'Eliminar categorias',
			'slug' => 'categorias.destroy',
			'description' => 'Eliminar cualquier dato de una categoria del sistema',
		]);	
		

		/////////////////////////////////////////////////////////////////////////////////////
		
						
		Permission::create([
			'name' => 'Navegar cursos',
			'slug' => 'cursos.index',
			'description' => 'Lista y navega todos los cursos del sistema',
		]);
		
		Permission::create([
			'name' => 'Ver detalle de cursos',
			'slug' => 'cursos.show',
			'description' => 'Ver en datalle cada cursos del sistema',
		]);
		
		Permission::create([
			'name' => 'Crear cursos',
			'slug' => 'cursos.create',
			'description' => 'Crea cualquier dato de un curso del sistema',
		]);			
		
		Permission::create([
			'name' => 'Edicion de cursos',
			'slug' => 'cursos.edit',
			'description' => 'Editar cualquier dato de un curso del sistema',
		]);					
		
		Permission::create([
			'name' => 'Eliminar cursos',
			'slug' => 'cursos.destroy',
			'description' => 'Eliminar cualquier dato de un curso del sistema',
		]);	
				
		
		Permission::create([
			'name' => 'Inscripcion a cursos',
			'slug' => 'cursos.inscripcion',
			'description' => 'Inscribirse a un Curso',
		]);	
		
    }
}
