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
        Schema::create('bombas', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('modelo');
            $table->tinyInteger('estado')->default(1);
            $table->bigInteger('id_tanque')->unsigned()->nullable();
            $table->foreign('id_tanque')->references('id')->on('tanques');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bombas');
    }
};