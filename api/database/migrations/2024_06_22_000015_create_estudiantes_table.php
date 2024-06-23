<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id('estudiante_id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->string('carrera');
            $table->char('ciclo', 2);
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('ID_User')->on('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
}
