<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Sesion extends Controller
{
    
    public function index(){
        return 'sesion';
    }

    public function contrasenaOlvidada(){
        return 'contraseña olvidada';
    }

    public function cambiarContrasena(){
        return 'cambiar contraseña';
    }

}
