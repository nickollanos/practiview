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
            $table->foreignId('detalles_control_seguimiento_id')
                  ->constrained('detalles_control_seguimiento')
                  ->onDelete('cascade');
            $table->foreignId('centro_formacion_id')
                  ->constrained('centro_formacion')
                  ->onDelete('cascade');
            $table->foreignId('entidad_id')
                  ->constrained('entidad')
                  ->onDelete('cascade');
            $table->foreignId('modalidad_practica_id')
                  ->constrained('modalidad_practica')
                  ->onDelete('cascade');
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
