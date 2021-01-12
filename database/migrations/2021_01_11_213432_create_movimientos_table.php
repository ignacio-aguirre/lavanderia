<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('efector_id');
            $table->integer('proveedor_id');
            $table->integer('concepto_id');
            $table->string('tipo_movimiento');

            $table->integer('movimiento_origen')->nullable();
            $table->integer('bultos');
            $table->integer('devueltos');
            $table->integer('remito')->nullable();
            $table->integer('usuario_id');
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
        Schema::dropIfExists('movimientos');
    }
}
