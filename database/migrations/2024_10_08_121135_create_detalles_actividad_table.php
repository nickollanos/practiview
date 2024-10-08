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
        Schema::create('detalles_actividad', function (Blueprint $table) {
            $table->foreignId('actividad_bitacora_id')
                  ->constrained('actividad_bitacora')
                  ->onDelete('cascade');
            $table->foreignId('bitacora_id')
                  ->constrained('bitacora')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_actividad');
    }
};
