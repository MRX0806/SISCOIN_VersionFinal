<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecuperacionCodigosTable extends Migration
{
    public function up()
    {
        Schema::create('recuperacion_codigos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->integer('codigo');
            $table->timestamps();

            // Definir la clave foránea
            $table->foreign('usuario_id')->references('ID_User')->on('Usuarios')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('recuperacion_codigos');
    }
}
