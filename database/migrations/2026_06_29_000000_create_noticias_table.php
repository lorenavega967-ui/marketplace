<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('contenido');
            $table->string('imagen')->nullable();
            $table->dateTime('fecha_evento')->nullable();
            $table->string('ubicacion_evento')->nullable();
            $table->foreignId('creador_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->enum('estado', ['borrador', 'publicado'])->default('borrador');
            $table->string('slug')->unique();
            $table->timestamps();

            $table->index('estado');
            $table->index('fecha_evento');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
