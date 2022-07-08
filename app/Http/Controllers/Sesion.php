<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Sesion extends Controller
{
    
    public function index(Request $request){

        // comprobar si esta logeado
        if(Auth::check()){
            return redirect('/');
        }

        switch ($request->method()) {
            case 'POST':
                                
                $credentials = request()->only('rut', 'password');

                if(Auth::attempt($credentials)){
                    request()->session()->regenerate();
                    return redirect('/');
                } else{
                    return view('sesion');
                }

                break;
            case 'GET':
                // 
                break;
            default:
                //invalido
                break;
        }

        return view('sesion');
    }

    public function contrasenaOlvidada(){
        return view('contrasena-olvidada');
    }

    public function cambiarContrasena(){
        return view('cambiar-contrasena');
    }

}
