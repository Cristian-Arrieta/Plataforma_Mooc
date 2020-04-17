<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_curso', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id')->unsigned()->index();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->integer('curso_id')->unsigned()->index();
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');			
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::drop('categoria_curso');
      //  Schema::dropIfExists('categoria_curso'); original
    }
}
