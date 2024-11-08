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
        Schema::create('practica', function (Blueprint $table) {
            $table->id();
            $table->foreignId('programa_formacion_id')
                  ->constrained('programa_formacions','codigo_programa')
                  ->onDelete('cascade');
            $table->foreignId('modalidad_practica_id')
                  ->constrained('modalidad_practicas')
                  ->onDelete('cascade');
            $table->foreignId('jefe_inmediato_id')
                  ->constrained('jefe__inmediatos')
                  ->onDelete('cascade');
            $table->string('fecha_inicio');
            $table->string('fecha_fin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practica');
    }
};
