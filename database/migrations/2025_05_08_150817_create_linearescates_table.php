<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinearescatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linearescates', function (Blueprint $table) {
            $table->id();
            $table->string('nombreMotorizado')->nullable();
            $table->string('cedulaMotorizado')->nullable();
            $table->string('transportadora')->nullable();
            $table->string('lineaTitular')->nullable();
            $table->string('nOrden')->nullable();
            $table->string('nGuia')->nullable();
            $table->string('direccionRegistrada')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('departamento')->nullable();
            $table->string('aliado')->nullable();
            $table->string('otros')->nullable();
            $table->string('tipoNovedad')->nullable();
            $table->string('motivoFuerzaMayor')->nullable();
            $table->string('tipificacion')->nullable();
            $table->string('SubTipificacion')->nullable();
            $table->string('valorEquipo')->nullable();
            $table->string('Observacion')->nullable();
            $table->string('simcard')->nullable();
            $table->string('idVision')->nullable();
            $table->string('reagendamientoImg')->nullable();
            $table->string('agente')->nullable();
            $table->string('cedulaAgente')->nullable();
            $table->string('lineaContactoMorotizado')->nullable();
            $table->string('HoraAtencionMotorizado')->nullable();
            $table->string('direccionReagendamiento')->nullable();
            $table->string('tkReagendamiento')->nullable();
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
        Schema::dropIfExists('linearescates');
    }
}
