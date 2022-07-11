<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProgresoPersonal;

class Perfil extends Controller
{
    public function index(){
        // verificar que esta logeado
        if(Auth::check()){

            // obtener el usuario actual
            $usuario = Auth::user();
            // obtener rut
            $rut = $usuario->rut;
            // obtener progreso personal
            $progresoPersonal = ProgresoPersonal::where('rut_usuario', $rut)->get();
            
            $datos = [
                'progresoPersonal' => $progresoPersonal
            ];

            return view('perfil', $datos);
        }
        return redirect('/');
    }
}
