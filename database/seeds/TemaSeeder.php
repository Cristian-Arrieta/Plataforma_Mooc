<?php

use Illuminate\Database\Seeder;
use App\Tema;

class TemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = Tema::create(['name' =>'Tema 1 : Ingles I M1',
		'urlVideo' => 'https://www.youtube.com/embed/dFJvNYdKGrA',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de inglés, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		$t2 = Tema::create(['name' =>'Tema 2 : Ingles I M1',
		'urlVideo' => 'https://www.youtube.com/embed/dFJvNYdKGrA',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de inglés, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		$t3 = Tema::create(['name' =>'Tema 3 : Ingles I M1',
		'urlVideo' => 'https://www.youtube.com/embed/dFJvNYdKGrA',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de inglés, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		
		$t1->modules()->sync(1);
		$t2->modules()->sync(1);
		$t3->modules()->sync(1);
		
	
		$t1 = Tema::create(['name' =>'Tema 1 : Ingles I M2',
		'urlVideo' => 'https://www.youtube.com/embed/dFJvNYdKGrA',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de inglés, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		$t2 = Tema::create(['name' =>'Tema 2 : Ingles I M2',
		'urlVideo' => 'https://www.youtube.com/embed/dFJvNYdKGrA',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de inglés, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		$t3 = Tema::create(['name' =>'Tema 3 : Ingles I M2',
		'urlVideo' => 'https://www.youtube.com/embed/dFJvNYdKGrA',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de inglés, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		
		$t1->modules()->sync(2);
		$t2->modules()->sync(2);
		$t3->modules()->sync(2);
		
		
		$t1 = Tema::create(['name' =>'Tema 1 : Ingles II M1',
		'urlVideo' => 'https://www.youtube.com/embed/ozpZ67NKgaI',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de inglés, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		$t2 = Tema::create(['name' =>'Tema 2 : Ingles II M1',
		'urlVideo' => 'https://www.youtube.com/embed/ozpZ67NKgaI',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de inglés, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		$t3 = Tema::create(['name' =>'Tema 3 : Ingles II M1',
		'urlVideo' => 'https://www.youtube.com/embed/ozpZ67NKgaI',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de inglés, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		
		$t1->modules()->sync(3);
		$t2->modules()->sync(3);
		$t3->modules()->sync(3);
		
		
		$t1 = Tema::create(['name' =>'Tema 1 : Ingles II M2',
		'urlVideo' => 'https://www.youtube.com/embed/ozpZ67NKgaI',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de inglés, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		$t2 = Tema::create(['name' =>'Tema 2 : Ingles II M2',
		'urlVideo' => 'https://www.youtube.com/embed/ozpZ67NKgaI',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de inglés, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		$t3 = Tema::create(['name' =>'Tema 3 : Ingles II M2',
		'urlVideo' => 'https://www.youtube.com/embed/ozpZ67NKgaI',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de inglés, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		
		$t1->modules()->sync(4);
		$t2->modules()->sync(4);
		$t3->modules()->sync(4);
		
		
		
		$t1 = Tema::create(['name' =>'Tema 1 : Japones I M1',
		'urlVideo' => 'https://www.youtube.com/embed/ozpZ67NKgaI',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de Japones, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		$t2 = Tema::create(['name' =>'Tema 2 : Japones I M1',
		'urlVideo' => 'https://www.youtube.com/embed/ozpZ67NKgaI',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de Japones, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		$t3 = Tema::create(['name' =>'Tema 3 : Japones I M1',
		'urlVideo' => 'https://www.youtube.com/embed/ozpZ67NKgaI',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de Japones, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		
		$t1->modules()->sync(5);
		$t2->modules()->sync(5);
		$t3->modules()->sync(5);
		
		
		$t1 = Tema::create(['name' =>'Tema 1 : Japones I M2',
		'urlVideo' => 'https://www.youtube.com/embed/lE2OBs1Njak',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de Japones, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		$t2 = Tema::create(['name' =>'Tema 2 : Japones I M2',
		'urlVideo' => 'https://www.youtube.com/embed/lE2OBs1Njak',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de Japones, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		$t3 = Tema::create(['name' =>'Tema 3 : Japones I M2',
		'urlVideo' => 'https://www.youtube.com/embed/lE2OBs1Njak',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de Japones, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		
		$t1->modules()->sync(6);
		$t2->modules()->sync(6);
		$t3->modules()->sync(6);
		
		
		$t1 = Tema::create(['name' =>'Tema 1 : Matematica I M1',
		'urlVideo' => 'https://www.youtube.com/embed/lE2OBs1Njak',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de Japones, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		$t2 = Tema::create(['name' =>'Tema 2 : Matematica I M1',
		'urlVideo' => 'https://www.youtube.com/embed/lE2OBs1Njak',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de Japones, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		$t3 = Tema::create(['name' =>'Tema 3 : Matematica I M1',
		'urlVideo' => 'https://www.youtube.com/embed/lE2OBs1Njak',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de Japones, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		
		$t1->modules()->sync(7);
		$t2->modules()->sync(7);
		$t3->modules()->sync(7);
		
		
		$t1 = Tema::create(['name' =>'Tema 1 : Matematica I M2',
		'urlVideo' => 'https://www.youtube.com/embed/lE2OBs1Njak',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de Japones, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		$t2 = Tema::create(['name' =>'Tema 2 : Matematica I M2',
		'urlVideo' => 'https://www.youtube.com/embed/lE2OBs1Njak',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de Japones, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		$t3 = Tema::create(['name' =>'Tema 3 : Matematica I M2',
		'urlVideo' => 'https://www.youtube.com/embed/lE2OBs1Njak',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de Japones, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		
		$t1->modules()->sync(8);
		$t2->modules()->sync(8);
		$t3->modules()->sync(8);
		
		
		$t1 = Tema::create(['name' =>'Tema 1 : Bioquimica I M1',
		'urlVideo' => 'https://www.youtube.com/embed/lE2OBs1Njak',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de Japones, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		$t2 = Tema::create(['name' =>'Tema 2 : Bioquimica I M1',
		'urlVideo' => 'https://www.youtube.com/embed/lE2OBs1Njak',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de Japones, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		$t3 = Tema::create(['name' =>'Tema 3 : Bioquimica I M1',
		'urlVideo' => 'https://www.youtube.com/embed/lE2OBs1Njak',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de Japones, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		
		$t1->modules()->sync(9);
		$t2->modules()->sync(9);
		$t3->modules()->sync(9);
		
		
		$t1 = Tema::create(['name' =>'Tema 1 : Bioquimica I M2',
		'urlVideo' => 'https://www.youtube.com/embed/lE2OBs1Njak',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de Japones, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		$t2 = Tema::create(['name' =>'Tema 2 : Bioquimica I M2',
		'urlVideo' => 'https://www.youtube.com/embed/lE2OBs1Njak',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de Japones, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		$t3 = Tema::create(['name' =>'Tema 3 : Bioquimica I M2',
		'urlVideo' => 'https://www.youtube.com/embed/lE2OBs1Njak',
		'urlMaterial' => 'https://www.curso-ingles.com/aprender/cursos/nivel-basico',
		'texto'=>'El curso básico de Japones, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',]);
		
		
		$t1->modules()->sync(10);
		$t2->modules()->sync(10);
		$t3->modules()->sync(10);
		
		
    }
}
