<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilesTable extends Migration
{
    public function up()
    {
        Schema::create('perfiles', function (Blueprint $table) {
            $table->id('perfil_id');
            $table->unsignedBigInteger('estudiante_id');
            $table->foreign('estudiante_id')->references('estudiante_id')->on('estudiantes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perfiles');
    }
}
