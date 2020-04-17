<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('tipo');
			$table->DateTime('inicio')->nullable();
			$table->DateTime('fin')->nullable();
			$table->integer('cupo')->nullable();
			$table->text('description')->nullable();
			$table->string('video')->nullable();
            $table->timestamps();
			$table->softDeletes();
        });
		
		DB::statement("ALTER TABLE cursos ADD imagen LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
