<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('cantidad');
            $table->string('fecha');
            $table->decimal('monto_total', 10, 2);
            $table->string('unidad_medida');
            $table->string('tipo_pago');
            $table->tinyInteger('estado')->default(1);
            $table->bigInteger('id_vehiculo')->unsigned()->nullable();
            $table->bigInteger('id_empleado')->unsigned()->nullable();
            $table->bigInteger('id_bomba')->unsigned()->nullable();
            $table->foreign('id_vehiculo')->references('id')->on('vehiculos');
            $table->foreign('id_empleado')->references('id')->on('empleados');    
            $table->foreign('id_bomba')->references('id')->on('bombas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
