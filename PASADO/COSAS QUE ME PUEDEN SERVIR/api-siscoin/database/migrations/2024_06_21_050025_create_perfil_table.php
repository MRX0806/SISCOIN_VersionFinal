<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilTable extends Migration
{
    public function up()
    {
        Schema::create('perfil', function (Blueprint $table) {
            $table->id('perfil_id');
            $table->unsignedBigInteger('estudiante_id');
            $table->string('habilidades', 100);
            $table->string('caracteristicas', 100);
            $table->foreign('estudiante_id')->references('estudiante_id')->on('estudiante')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perfil');
    }
}
