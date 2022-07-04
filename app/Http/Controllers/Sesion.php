<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Sesion extends Controller
{
    
    public function index(){
        return view('sesion');
    }

    public function contrasenaOlvidada(){
        return view('contrasena-olvidada');
    }

    public function cambiarContrasena(){
        return view('cambiar-contrasena');
    }

}
