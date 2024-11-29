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
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('practica_id')
                  ->constrained('practicas')
                  ->onDelete('cascade');
            $table->string('fecha_concertacion');
            $table->string('evidencia_concertacion');
            $table->string('fecha_evaluacion_parcial');
            $table->string('evidencia_evaluacion_parcial');
            $table->string('fecha_evaluacion_final');
            $table->string('evidencia_evaluacion_final');
            $table->foreignId('bitacora_id')
                  ->constrained('bitacoras')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimientos');
    }
};
