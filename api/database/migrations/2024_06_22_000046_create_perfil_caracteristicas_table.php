<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilCaracteristicasTable extends Migration
{
    public function up()
    {
        Schema::create('perfil_caracteristicas', function (Blueprint $table) {
            $table->unsignedBigInteger('perfil_id');
            $table->unsignedBigInteger('caracteristica_id');
            $table->foreign('perfil_id')->references('perfil_id')->on('perfiles')->onDelete('cascade');
            $table->foreign('caracteristica_id')->references('id')->on('caracteristicas')->onDelete('cascade');
            $table->primary(['perfil_id', 'caracteristica_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perfil_caracteristicas');
    }
}
