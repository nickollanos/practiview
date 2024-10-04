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
        Schema::create('control_seguimiento_dos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('periodo_a');
            $table->string('periodo_b');
            $table->string('observaciones');
            $table->string('evaluacion');
            $table->string('juicio_evaluacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('control_seguimiento_dos');
    }
};
