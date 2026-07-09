<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'contenido',
        'imagen',
        'fecha_evento',
        'ubicacion_evento',
        'creador_id',
        'estado',
        'slug',
    ];

    protected function casts(): array
    {
        return [
            'estado' => 'string',
            'fecha_evento' => 'datetime',
        ];
    }

    public function creador()
    {
        return $this->belongsTo(User::class, 'creador_id');
    }
}
