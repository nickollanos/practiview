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
        Schema::create('control_seguimientos', function (Blueprint $table) {
            $table->id();
            $table->string('actividad');
            $table->string('evidencia_aprendizaje');
            $table->date('fecha');
            $table->string('lugar');
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
        Schema::dropIfExists('control_seguimientos');
    }
};
