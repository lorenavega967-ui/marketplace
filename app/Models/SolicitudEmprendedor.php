<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SolicitudEmprendedor extends Model
{
    protected $fillable = [
        'nombre_completo',
        'telefono',
        'email',
        'nombre_negocio',
        'tipo',
        'categoria_id',
        'descripcion_negocio',
        'motivo',
        'imagen_referencial',
        'experiencia_previa',
        'estado',
        'mensaje_admin',
        'revisado_por',
    ];

    protected $casts = [
        'estado' => 'string',
        'tipo' => 'string',
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function revisor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'revisado_por');
    }
}
