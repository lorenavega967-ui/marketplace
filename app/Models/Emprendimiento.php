<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Emprendimiento extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'categoria_id',
        'creado_por',
        'revisado_por',
        'tipo',
        'nombre',
        'responsable',
        'slug',
        'descripcion',
        'logo',
        'horario',
        'ubicacion',
        'whatsapp',
        'instagram',
        'estado',
        'motivo_rechazo',
    ];

    protected function casts(): array
    {
        return [
            'estado' => 'string',
            'tipo' => 'string',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function creador()
    {
        return $this->belongsTo(User::class, 'creado_por');
    }

    public function revisor()
    {
        return $this->belongsTo(User::class, 'revisado_por');
    }

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}