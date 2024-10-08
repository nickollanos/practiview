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
        Schema::create('detalles_control_seguimiento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('control_seguimiento_dos_id')
                  ->constrained('control_seguimiento_dos')
                  ->onDelete('cascade');
            $table->foreignId('control_seguimiento_id')
                  ->constrained('control_seguimiento')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_control_seguimiento');
    }
};
