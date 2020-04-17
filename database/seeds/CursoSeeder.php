<?php

use Illuminate\Database\Seeder;
use App\Curso;
use App\Categoria;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		
		$idioma = Categoria::create(['name' =>'Idioma','description' => 'Ingles I, II, III, IV, V']);
		$matematica = Categoria::create(['name' => 'Matematica','description' => 'Ecuaciones y Formulas',]);		
		$biologia = Categoria::create(['name' => 'Biologia','description' => 'Estudio de los seres vivos',]);	
		
		
		$inglesUno = Curso::create(['name' =>'Ingles I',
		'tipo' => 'Masivo','description'=>'El curso básico de inglés, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',
		'video'=>'https://www.youtube.com/embed/dFJvNYdKGrA']);
		
		$inglesDos = Curso::create(['name' =>'Ingles II',
		'tipo' => 'Masivo','description'=>'El curso básico de inglés II, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',
		'video'=>'https://www.youtube.com/embed/ozpZ67NKgaI']);
		
		$japones = Curso::create(['name' =>'Japones I',
		'tipo' => 'Masivo','description'=>'El curso básico de Japones, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples.',
		'video'=>'https://www.youtube.com/embed/lE2OBs1Njak']);
		
		$mate = Curso::create(['name' =>'Matematica I',
		'tipo' => 'Preferencial',
		'inicio' => '2019-07-01',
		'fin' => '2019-07-08',
		'cupo' => '50',
		'description'=>'Matemática 1 es una asignatura en la currícula del Plan de Estudios de las Carreras de Bioquímica, Farmacia y Profesorado en Química.',
		'video'=>'https://www.youtube.com/embed/dFJvNYdKGrA']);
		
		$bio = Curso::create(['name' =>'Bioquimica I',
		'tipo' => 'Preferencial',
		'inicio' => '2019-07-01',
		'fin' => '2019-07-08',
		'cupo' => '50',
		'description'=>'La bioquímica es una rama de la ciencia que estudia la composición química de los seres vivos, especialmente las proteínas, carbohidratos, lípidos y ácidos nucleicos, además de otras pequeñas moléculas presentes en las células y las reacciones químicas que sufren estos compuestos (metabolismo) que les permiten obtener energía (catabolismo) y generar biomoléculas propias (anabolismo).',
		'video'=>'https://www.youtube.com/embed/dFJvNYdKGrA']);
		
		
		$inglesUno->categorias()->sync($idioma);
		$inglesDos->categorias()->sync($idioma);
		$japones->categorias()->sync($idioma);
		$mate->categorias()->sync($matematica);
		$bio->categorias()->sync(1);
		
		$inglesUno->users()->sync([3,4,5,2]);
		
		$mate->users()->sync([3,5,2]);
		
		$inglesDos->users()->sync(2);
    }
}
