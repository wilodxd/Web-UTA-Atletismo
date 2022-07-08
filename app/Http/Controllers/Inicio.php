<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Publicacion;

class Inicio extends Controller
{
    public function index(){

        // Obtener todas las publicaciones
        $publicaciones = Publicacion::all();

        // Obtener todos los usuarios
        $usuarios = Usuario::all();

        // Retornar vista con los datos
        return view('index', ['publicaciones' => $publicaciones, 'usuarios' => $usuarios]);
    }
}
