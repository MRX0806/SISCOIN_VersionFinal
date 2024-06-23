<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemaTable extends Migration
{
    public function up()
    {
        Schema::create('tema', function (Blueprint $table) {
            $table->id('tema_id');
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tema');
    }
}
