<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProgresoPersonal;
use Carbon\Carbon;

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

            // ordenar progreso personal por fecha
            $progresoPersonal = $progresoPersonal->sortByDesc('created_at');

            // obtener imagen de perfil
            $imagen = $usuario->imagen;
            
            $datos = [
                'progresos' => $progresoPersonal,
                'imagenPerfil' => $imagen
            ];

            return view('perfil', $datos);
        }
        return redirect('/');
    }

    public function registrarProgreso(Request $request){

        // verificar que esta logeado
        if(Auth::check()){

            // obtener el usuario actual
            $usuario = Auth::user();
            // obtener rut
            $rut = $usuario->rut;
            
            // obtener progreso personal
            $progresoPersonal = $request->except(['_token']);

            // tiempo en segundos
            $horas = $progresoPersonal['horas'];
            $minutos = $progresoPersonal['minutos'];
            $segundos = $progresoPersonal['segundos'];
            $tiempo = $horas * 3600 + $minutos * 60 + $segundos;

            // distancia en metros
            $kilometros = $progresoPersonal['kilometros'];
            $metros = $progresoPersonal['metros'];
            $distancia = $kilometros * 1000 + $metros;

            // fecha
            $fecha = $request->input('fecha');
            $hora = $request->input('hora');
            $fecha = $fecha . ' ' . $hora;
            $fecha = Carbon::parse($fecha);
            
            // filtrar datos
            $progresoPersonalNew = [
                'rut_usuario' => $rut,
                'tiempo' => $tiempo,
                'distancia' => $distancia,
                'created_at' => $fecha
            ];

            // agregar comentario a datos
            if($request->has('comentario')){
                $progresoPersonalNew['comentario'] = $request->input('comentario');
            }
            
            // agregar progreso personal
            ProgresoPersonal::insert($progresoPersonalNew);

            // // imprimir tiempo
            // echo $tiempo;

            return redirect('/perfil');
        }

        return redirect('/');

    }

    public function eliminarProgreso(Request $request){

        // verificar que esta logeado
        if(Auth::check()){

            // obtener progreso personal
            $datosProgresoPersonal = $request->except(['_token']);

            // eliminar progreso personal
            $progresoPersonal = ProgresoPersonal::where('id', $datosProgresoPersonal['id']);
            
            print("aaaa");
            print($datosProgresoPersonal['id']);
            print("aaaa");

            // imprimir datos progreso personal
            $progresoPersonal->delete();

            return redirect('/perfil');
        }

        return redirect('/');
    }
}
