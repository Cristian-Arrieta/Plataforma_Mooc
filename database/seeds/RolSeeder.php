<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		
		Role::create([
			'name' => 'Admin' ,
			'slug' => 'admin' ,
			'special' => 'all-access'
		]);
		
		
		$pro = Role::create([
			'name' => 'Profesor' ,
			'slug' => 'Profesor' ,
			'special' => null
		]);
		
		$alum = Role::create([
			'name' => 'Alumno' ,
			'slug' => 'Alumno' ,
			'special' => null
		]);
		
		$pro->permissions()->sync([4,16,17,14,19]);
		
		$alum->permissions()->sync([4,16,17,21]);
    }
}
