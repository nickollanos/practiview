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
        Schema::create('detalles_ficha', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ficha');
            $table->foreignId('programa_formacion_id')
                  ->constrained('programa_formacion')
                  ->onDelete('cascade');
            $table->foreignId('ficha_id')
                  ->constrained('ficha')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_ficha');
    }
};
