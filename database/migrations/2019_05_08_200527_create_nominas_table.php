<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNominasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cod_nomina_sigesp');
            $table->string('descripcion_sigesp');
            //Llaves Foraneas
            $table->unsignedBigInteger('organizacion_id');
            $table->unsignedBigInteger('nomina_id');
            //Relaciones
            $table->foreign('organizacion_id')->references('id')->on('organizaciones')->onDelete('cascade');
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
        Schema::dropIfExists('nominas');
    }
}
