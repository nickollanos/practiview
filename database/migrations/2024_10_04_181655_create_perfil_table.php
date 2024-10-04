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
        Schema::create('perfil', function (Blueprint $table) {
            $table->id();
            $table->string('perfil');
            $table->integer('lectura');
            $table->integer('escritura');
            $table->integer('administracion');
            $table->integer('aprendiz');
            $table->integer('instructor');
            $table->integer('empresa');
            $table->integer('jefe_inmediato');
            $table->integer('gestor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfil');
    }
};
