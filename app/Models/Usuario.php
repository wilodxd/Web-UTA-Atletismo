<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = 'rut';
    
    protected $fillable = [
        'rut',
        'nombre',
        'apellido_1',
        'apellido_2',
        'fecha_nacimiento',
        'fecha_ingreso',
        'carrera',
        'correo',
        'contrasena',
        'tipo_usuario'
    ];

}
