<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id('comentario_id');
            $table->unsignedBigInteger('tema_id');
            $table->text('comentario');
            $table->timestamp('fecha')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('tema_id')->references('tema_id')->on('temas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
