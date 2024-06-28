<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivoTable extends Migration
{

    public function up()
    {
        Schema::create('archivo', function (Blueprint $table) {
            $table->id('ID_archivo'); // Primary key
            $table->string('nombre'); // Varchar
            $table->string('archivo'); // Varchar
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('archivo');
    }
}
