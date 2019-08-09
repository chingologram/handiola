<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('cantidad_habitaciones');
            $table->integer('cantidad_banos');
            $table->date('fecha_reserva');
            $table->date('fecha_desde');
            $table->date('fecha_hasta');
            $table->integer('numero_dias');
            $table->decimal('costo_total');
            $table->string('direccion_alojamiento');
            $table->string('hora_llave');
            $table->date('fecha_llave');
            $table->string('direccion_llave');
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
        Schema::dropIfExists('reservas');
    }
}
