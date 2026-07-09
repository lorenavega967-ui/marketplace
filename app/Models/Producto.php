<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'emprendimiento_id',
        'nombre',
        'descripcion',
        'precio',
        'imagen',
        'disponible',
        'es_combo',
    ];

    protected function casts(): array
    {
        return [
            'precio' => 'decimal:2',
            'disponible' => 'boolean',
            'es_combo' => 'boolean',
        ];
    }

    public function emprendimiento()
    {
        return $this->belongsTo(Emprendimiento::class);
    }
}