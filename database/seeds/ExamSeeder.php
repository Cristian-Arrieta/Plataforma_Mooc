<?php

use Illuminate\Database\Seeder;
use App\Exam;


class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		
		$ex = Exam::create(['name' =>'Examen 1 Modulo 1 : Ingles I',
		'tipo' => 'Cuestionario',
		'description'=>'Este examen es aprobable con una nota igual o mayor a 6',]);
		
        $ex->modules()->sync(1);
		
		$ex = Exam::create(['name' =>'Examen 2 Modulo 2 : Ingles I',
		'tipo' => 'Cuestionario',
		'description'=>'Este examen es aprobable con una nota igual o mayor a 6',]);
		
        $ex->modules()->sync(2);
		
		$ex = Exam::create(['name' =>'Examen 1 Modulo 1 : Ingles II',
		'tipo' => 'Cuestionario',
		'description'=>'Este examen es aprobable con una nota igual o mayor a 6',]);
		
        $ex->modules()->sync(3);
		
		$ex = Exam::create(['name' =>'Examen 2 Modulo 2 : Ingles II',
		'tipo' => 'Cuestionario',
		'description'=>'Este examen es aprobable con una nota igual o mayor a 6',]);
		
        $ex->modules()->sync(4);
		
		$ex = Exam::create(['name' =>'Examen 1 Modulo 1 : Japones I',
		'tipo' => 'Cuestionario',
		'description'=>'Este examen es aprobable con una nota igual o mayor a 6',]);
		
        $ex->modules()->sync(5);
		
		$ex = Exam::create(['name' =>'Examen 2 Modulo 2 : Japones I',
		'tipo' => 'Cuestionario',
		'description'=>'Este examen es aprobable con una nota igual o mayor a 6',]);
		
        $ex->modules()->sync(6);
		
		$ex = Exam::create(['name' =>'Examen 1 Modulo 1 : Matematica I',
		'tipo' => 'Cuestionario',
		'description'=>'Este examen es aprobable con una nota igual o mayor a 6',]);
		
        $ex->modules()->sync(7);
		
		$ex = Exam::create(['name' =>'Examen 2 Modulo 2 : Matematica I',
		'tipo' => 'Cuestionario',
		'description'=>'Este examen es aprobable con una nota igual o mayor a 6',]);
		
        $ex->modules()->sync(8);
		
		$ex = Exam::create(['name' =>'Examen 1 Modulo 1 : Bioquimica I',
		'tipo' => 'Cuestionario',
		'description'=>'Este examen es aprobable con una nota igual o mayor a 6',]);
		
        $ex->modules()->sync(9);
		
		$ex = Exam::create(['name' =>'Examen 2 Modulo 2 : Bioquimica I',
		'tipo' => 'Cuestionario',
		'description'=>'Este examen es aprobable con una nota igual o mayor a 6',]);
		
        $ex->modules()->sync(10);
		
		
    }
}
