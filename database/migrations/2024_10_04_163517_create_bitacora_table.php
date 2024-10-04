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
        Schema::create('bitacora', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->string('numero_ficha');
            $table->integer('id_regional');
            $table->integer('id_centro_formacion');
            $table->integer('id_entidad');
            $table->integer('id_detalles_actividad');
            $table->integer('id_modalidad_practica');
            $table->integer('id_detalles_ficha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bitacora');
    }
};
