<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepositorioTable extends Migration
{
    public function up()
    {
        Schema::create('repositorio', function (Blueprint $table) {
            $table->id('repositorio_id');
            $table->string('titulo', 100);
            $table->timestamp('fecha')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('curso', 100);
            $table->string('linea_investigacion', 100);
            $table->unsignedBigInteger('estudiante_id');
            $table->foreign('estudiante_id')->references('estudiante_id')->on('estudiante')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('repositorio');
    }
}
