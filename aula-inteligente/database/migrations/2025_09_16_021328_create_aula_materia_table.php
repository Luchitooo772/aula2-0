<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulaMateriaTable extends Migration
{
    public function up()
    {
        Schema::create('aula_materia', function (Blueprint $table) {
            $table->unsignedBigInteger('aula_id');
            $table->unsignedBigInteger('materia_id');

            $table->foreign('aula_id')->references('id')->on('aulas')->onDelete('cascade');
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');

            $table->primary(['aula_id', 'materia_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('aula_materia');
    }
}