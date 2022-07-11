<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgresoPersonal extends Model
{
    use HasFactory;

    protected $table = 'progresopersonal';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'rut_usuario',
        'tiempo',
        'distancia',
        'comentario',
        'created_at',
        'updated_at'
    ];
    
    
}
