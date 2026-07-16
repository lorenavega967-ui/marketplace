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
        Schema::table('noticias', function (Blueprint $table) {
            // Agregar 'archivado' al enum de estado
            $table->enum('estado', ['borrador', 'publicado', 'archivado'])
                  ->default('borrador')
                  ->change();

            // Agregar soft deletes
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('noticias', function (Blueprint $table) {
            $table->enum('estado', ['borrador', 'publicado'])
                  ->default('borrador')
                  ->change();

            $table->dropSoftDeletes();
        });
    }
};
