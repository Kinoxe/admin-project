<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnsayosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ensayos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('abreviatura');
            $table->string('unidad');
            $table->string('codigo_validacion');
            $table->string('codigo_metodo');
            $table->string('incertidumbre');
            $table->string('maximo');
            $table->string('minimo');
            
            $table->integer('departamento')->unsigned();
            $table->foreign('departamento')->references('id')->on('departamentos');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ensayos');
    }
}
