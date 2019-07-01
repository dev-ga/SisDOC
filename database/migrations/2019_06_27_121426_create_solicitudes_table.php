<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nombresol');
            $table->string('apellidosol');
            $table->string('cedulasol');
            $table->string('emailsol');
            $table->string('tiposol');

            $table->integer('estatus_id')->unsigned();

            //Relaciones
            $table->foreign('estatus_id')->references('id')->on('statussolicitudes')->onDelete('cascade');

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
        Schema::dropIfExists('solicitudes');
    }
}
