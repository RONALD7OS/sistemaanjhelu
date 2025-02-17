<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   /* public function up(): void
    {
        Schema::create('historiales_clinicos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }*/
    public function up(): void
    {
        Schema::create('historiales_clinicos', function (Blueprint $table) {
            $table->id(); // ID principal de la tabla
            $table->unsignedBigInteger('mascota_id'); // Relación con la tabla 'mascotas'
            $table->text('diagnostico'); // Columna para el diagnóstico
            $table->text('tratamiento')->nullable(); // Columna para el tratamiento, puede ser nulo
            $table->date('fecha_visita'); // Columna para la fecha de la visita
            $table->timestamps(); // Para created_at y updated_at automáticamente
    
            // Relación con la tabla 'mascotas'
            $table->foreign('mascota_id')->references('id')->on('mascotas')->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historiales_clinicos');
    }
};
