<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepositoriosTable extends Migration
{
    public function up()
    {
        Schema::create('repositorios', function (Blueprint $table) {
            $table->id('repositorio_id');
            $table->string('titulo');
            $table->timestamp('fecha')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('curso');
            $table->string('linea_investigacion');
            $table->unsignedBigInteger('estudiante_id');
            $table->foreign('estudiante_id')->references('estudiante_id')->on('estudiantes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('repositorios');
    }
}
