<?php

use Illuminate\Database\Seeder;
use App\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		$m1 = Module::create(['name' =>'Modulo 1 : Ingles I',
		'state' => 'Visible',
		'description'=>'El curso básico de inglés, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		$m2 = Module::create(['name' =>'Modulo 2 : Ingles I',
		'state' => 'Visible',
		'description'=>'El curso básico de inglés, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		
		$m1->cursos()->sync(1);
		$m2->cursos()->sync(1);
		
		
		$m1 = Module::create(['name' =>'Modulo 1 : Ingles II',
		'state' => 'Visible',
		'description'=>'El curso básico de inglés, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		
		$m2 = Module::create(['name' =>'Modulo 2 : Ingles II',
		'state' => 'Visible',
		'description'=>'El curso básico de inglés, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		
		$m1->cursos()->sync(2);
		$m2->cursos()->sync(2);
		
		
		$m1 = Module::create(['name' =>'Modulo 1 : Japones I',
		'state' => 'Visible',
		'description'=>'El curso básico de Japones, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		
		$m2 = Module::create(['name' =>'Modulo 2 : Japones I',
		'state' => 'Visible',
		'description'=>'El curso básico de Japones, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		
		$m1->cursos()->sync(3);
		$m2->cursos()->sync(3);
		
		
		$m1 = Module::create(['name' =>'Modulo 1 : Matematica I',
		'state' => 'Visible',
		'description'=>'Matemática 1 es una asignatura en la currícula del Plan de Estudios de las Carreras de Bioquímica, Farmacia y Profesorado en Química.',]);
		
		
		$m2 = Module::create(['name' =>'Modulo 2 : Matematica I',
		'state' => 'Visible',
		'description'=>'Matemática 1 es una asignatura en la currícula del Plan de Estudios de las Carreras de Bioquímica, Farmacia y Profesorado en Química.',]);
		
		
		
		$m1->cursos()->sync(4);
		$m2->cursos()->sync(4);
		
		
		$m1 = Module::create(['name' =>'Modulo 1 : Bioquimica I',
		'state' => 'Visible',
		'description'=>'La bioquímica es una rama de la ciencia que estudia la composición química de los seres vivos, especialmente las proteínas, carbohidratos, lípidos y ácidos nucleicos, además de otras pequeñas moléculas presentes en las células y las reacciones químicas que sufren estos compuestos (metabolismo) que les permiten obtener energía (catabolismo) y generar biomoléculas propias (anabolismo).',]);
		
		
		$m2 = Module::create(['name' =>'Modulo 2 : Bioquimica I',
		'state' => 'Visible',
		'description'=>'La bioquímica es una rama de la ciencia que estudia la composición química de los seres vivos, especialmente las proteínas, carbohidratos, lípidos y ácidos nucleicos, además de otras pequeñas moléculas presentes en las células y las reacciones químicas que sufren estos compuestos (metabolismo) que les permiten obtener energía (catabolismo) y generar biomoléculas propias (anabolismo).',]);
		
		
		$m1->cursos()->sync(5);
		$m2->cursos()->sync(5);
		
    }
}
