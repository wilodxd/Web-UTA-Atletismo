<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioActividad extends Model
{
    use HasFactory;

    protected $primaryKey = ['rut_usuario', 'id_publicacion'];

}
