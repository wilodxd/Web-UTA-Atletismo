<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Publicacion;

class Inicio extends Controller
{
    public function index(){

        // Obtener las 15 ultimas publicaciones
        $publicaciones = Publicacion::orderBy('created_at', 'desc')->take(15)->get();
        
        // Obtener todos los usuarios
        $usuarios = Usuario::all();

        // Retornar vista con los datos
        return view('index', ['publicaciones' => $publicaciones, 'usuarios' => $usuarios]);
    }
}
