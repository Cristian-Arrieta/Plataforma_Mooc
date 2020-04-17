<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->increments('id');
			$table->string('pregunta');
			$table->string('respuesta')->nullable();
			$table->string('opcion1');
			$table->string('opcion2')->nullable();
			$table->string('opcion3')->nullable();
			$table->string('opcion4')->nullable();
			$table->string('opcion5')->nullable();
			
			$table->integer('exam_id')->unsigned()->index();
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
			
			
            $table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
