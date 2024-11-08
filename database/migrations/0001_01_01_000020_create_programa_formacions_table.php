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
        Schema::create('programa_formacions', function (Blueprint $table) {
            $table->id('codigo_programa')->primary();
            $table->string('denominacion');
            $table->string('version');
            $table->string('etapa_lectiva');
            $table->string('etapa_productiva');
            $table->string('total_horas');
            $table->string('tipo_programa');
            $table->string('titulo_certificado');
            $table->foreignId('centro_formacion_id')
                  ->constrained('centro_formacions')
                  ->onDelete('cascade');
            $table->foreignId('instructor_id')
                  ->constrained('instructors')
                  ->onDelete('cascade');
            $table->foreignId('aprendiz_id')
                  ->constrained('aprendizs')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programa_formacions');
    }
};
