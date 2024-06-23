<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudianteTable extends Migration
{
    public function up()
    {
        Schema::create('estudiante', function (Blueprint $table) {
            $table->id('estudiante_id');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('email', 255)->unique();
            $table->string('carrera', 100);
            $table->char('ciclo', 2);
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('ID_User')->on('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estudiante');
    }
}
