<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilHabilidadesTable extends Migration
{
    public function up()
    {
        Schema::create('perfil_habilidades', function (Blueprint $table) {
            $table->unsignedBigInteger('perfil_id');
            $table->unsignedBigInteger('habilidad_id');
            $table->foreign('perfil_id')->references('perfil_id')->on('perfiles')->onDelete('cascade');
            $table->foreign('habilidad_id')->references('id')->on('habilidades')->onDelete('cascade');
            $table->primary(['perfil_id', 'habilidad_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perfil_habilidades');
    }
}
