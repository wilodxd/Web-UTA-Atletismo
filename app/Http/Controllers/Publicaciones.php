<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Publicacion;
use App\Models\UsuarioActividad;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

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
        
        // cargar 8 publicaciones mas recientes
        $publicaciones = Publicacion::where('id', '!=', $id)->orderBy('created_at', 'desc')->take(6)->get();
        
        // cargar todos los usuarios
        $usuarios = Usuario::all();

        //cargar actividad usuario con publicacion actual
        if(Auth::check()){
            $actividad = UsuarioActividad::where('rut_usuario', Auth::user()->rut)->where('id_publicacion', $id)->first();
        }else{
            $actividad = null;
        }

        // print('<pre>');
        // print_r($actividad);
        // print('</pre>');



        $datos = [
            'publicacionActual' => $publicacion,
            'autor' => $autor,
            'publicaciones' => $publicaciones,
            'usuarios' => $usuarios,
            'inscrito' => $actividad
        ];

        return view('publicacion', $datos);
    }

    public function inscribirse(Request $request){

        // obtener rut de la autenticacion
        $rut_usuario = Auth::user()->rut;
        $id_publicacion = $request->input('id_publicacion');

        $usuario = Usuario::where('rut', $rut_usuario)->first();
        $publicacion = Publicacion::where('id', $id_publicacion)->first();

        if(is_null($usuario)){
            return redirect('/');
        }

        if(is_null($publicacion)){
            return redirect('/');
        }

        // Comprobar si ya esta inscrito
        $usuarioActividad = UsuarioActividad::where('rut_usuario', $rut_usuario)->where('id_publicacion', $id_publicacion)->first();

        // Si no esta inscrito, inscribirse
        if(is_null($usuarioActividad)){
            // Agregar inscripcion usuario
            $datosUsuarioActividad = ['rut_usuario' => $rut_usuario, 'id_publicacion' =>$id_publicacion];
            UsuarioActividad::insert($datosUsuarioActividad);
            echo 'Inscrito';
        }else{
            // Eliminar inscripcion usuario
            UsuarioActividad::where('rut_usuario', $rut_usuario)->where('id_publicacion', $id_publicacion)->delete();
            echo 'Eliminado';
        }

        // Redirigir a la publicacion
        return redirect('/publicacion/' . $id_publicacion);

    }

}
