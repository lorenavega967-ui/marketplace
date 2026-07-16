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
        Schema::table('solicitud_emprendedor', function (Blueprint $table) {
            // Quitar user_id (no debe ser obligatorio, el solicitante no tiene cuenta)
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            // Quitar categoria_interes (texto libre, lo reemplazamos con FK)
            $table->dropColumn('categoria_interes');

            // Agregar categoria_id como FK correcta
            $table->foreignId('categoria_id')
                  ->nullable()
                  ->after('id')
                  ->constrained('categorias')
                  ->onDelete('set null');

            // Campos que faltaban
            $table->string('email')->after('nombre_completo');
            $table->string('nombre_negocio')->after('email');
            $table->enum('tipo', ['fijo', 'ambulante'])->after('nombre_negocio');
            $table->text('motivo')->after('descripcion_negocio');
            $table->string('imagen_referencial')->nullable()->after('motivo');
            $table->foreignId('revisado_por')
                  ->nullable()
                  ->after('mensaje_admin')
                  ->constrained('users')
                  ->onDelete('set null');

            // Corregir enum de estado (femenino → masculino, consistente con el resto)
            $table->enum('estado', ['pendiente', 'aprobado', 'rechazado'])
                  ->default('pendiente')
                  ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('solicitud_emprendedor', function (Blueprint $table) {
            $table->dropForeign(['categoria_id']);
            $table->dropForeign(['revisado_por']);
            $table->dropColumn([
                'categoria_id', 'email', 'nombre_negocio', 'tipo',
                'motivo', 'imagen_referencial', 'revisado_por'
            ]);

            $table->bigInteger('user_id')->unsigned()->after('id');
            $table->string('categoria_interes')->nullable()->after('experiencia_previa');
            $table->enum('estado', ['pendiente', 'aprobada', 'rechazada'])
                  ->default('pendiente')
                  ->change();
        });
    }
};
