<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('emprendimientos', function (Blueprint $table) {
            $table->id();

            // Dueño con cuenta. Nulo si es un emprendedor invitado sin login.
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('restrict');

            // Categoría del emprendimiento. Nulo mientras no sea obligatorio.
            $table->foreignId('categoria_id')
                ->nullable()
                ->constrained('categorias')
                ->onDelete('set null');

            // Auditoría: qué admin registró el emprendimiento (caso invitados).
            $table->foreignId('creado_por')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null');

            // Auditoría: qué admin aprobó o rechazó el emprendimiento.
            $table->foreignId('revisado_por')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null');

            $table->enum('tipo', ['fijo', 'ambulante', 'invitado'])->default('fijo');

            $table->string('nombre', 100);
            $table->string('responsable', 100)->nullable(); // nombre de contacto si no hay user_id
            $table->string('slug', 120)->unique();
            $table->text('descripcion')->nullable();
            $table->string('logo')->nullable();
            $table->string('horario', 100)->nullable();
            $table->string('ubicacion', 150)->nullable(); // aplica si tipo = fijo
            $table->string('whatsapp', 20)->nullable();
            $table->string('instagram', 100)->nullable();

            $table->enum('estado', ['pendiente', 'aprobado', 'rechazado'])->default('pendiente');
            $table->text('motivo_rechazo')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index('estado');
            $table->index('tipo');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('emprendimientos');
    }
};
