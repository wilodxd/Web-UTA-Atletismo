<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Publicacion;

class Publicaciones extends Controller
{
    public function index($id){

        $publicacion = Publicacion::where('id', $id)->first();

        if(is_null($publicacion)){
            return redirect('/');
        }

        $rut_autor = $publicacion->rut_autor;

        $autor = Usuario::where('rut', $rut_autor)->first();

        if(is_null($autor)){
            $autor = "Administrador";
        }else{
            $autor = $autor->nombre . " " . $autor->apellido_1 . " " . $autor->apellido_2; 
        }
        
        // cargar todas las publicaciones
        $publicaciones = Publicacion::all()->where('actividad', 0);

        // cargar todos los usuarios
        $usuarios = Usuario::all();


        $datos = [
            'publicacionActual' => $publicacion,
            'autor' => $autor,
            'publicaciones' => $publicaciones,
            'usuarios' => $usuarios
        ];

        return view('publicacion', $datos);
    }
}
