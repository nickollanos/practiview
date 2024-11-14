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
        Schema::create('instructor_rols', function (Blueprint $table) {
            $table->foreignId('instructor_id')
                  ->constrained('instructors')
                  ->onDelete('cascade');
            $table->foreignId('rol_id')
                  ->constrained('rols')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructor_rols');
    }
};
