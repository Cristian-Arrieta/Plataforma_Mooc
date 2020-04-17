<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		
		$this->call(PermissionsSeeder::class);
		
		$this->call(RolSeeder::class);
		
		$this->call(UserSeeder::class);
		$this->call(CategoriaSeeder::class);
		$this->call(CursoSeeder::class);
		$this->call(ModuleSeeder::class);
		$this->call(TemaSeeder::class);
		$this->call(ExamSeeder::class);
		$this->call(PreguntaSeeder::class);
		$this->call(User_examSeeder::class);
    }
}
