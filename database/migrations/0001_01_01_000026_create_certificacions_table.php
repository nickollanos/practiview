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
        Schema::create('certificacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aprendiz_id')
                  ->constrained('aprendizs')
                  ->onDelete('cascade');
            $table->string('certificacion_ape');
            $table->string('devolucion_carnet');
            $table->string('certificado_tyt');
            $table->string('solicitud_certificacion');
            $table->string('observaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificacions');
    }
};
