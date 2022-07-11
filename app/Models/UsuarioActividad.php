<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\database\Eloquent\Builder;

class UsuarioActividad extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = ['rut_usuario', 'id_publicacion'];

    protected $table = 'usuarioactividad';

}
