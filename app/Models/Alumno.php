<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional si sigue convención)
    protected $table = 'alumnos';

    // Campos que se pueden rellenar masivamente
    protected $fillable = [
        'nombre',
        'apellidos',
        'telefono',
        'correo',
        'fecha_nacimiento',
        'nota_media',
        'experiencia',
        'formacion',
        'habilidades',
        'fotografia',
    ];

    // Casts para que Laravel convierta automáticamente tipos
    protected $casts = [
        'fecha_nacimiento' => 'date', // ahora puedes usar ->format('d/m/Y') sin error
        'nota_media' => 'float',      // opcional: para asegurarte que sea decimal
    ];

    /**
     * Retorna la URL de la foto de cara si existe
     */
    public function getFotoUrlAttribute()
    {
        if ($this->fotografia) {
            return asset('storage/' . $this->fotografia);
        }
        return asset('images/default-avatar.png'); // si quieres un avatar por defecto
    }
}
