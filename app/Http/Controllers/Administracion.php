<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Publicacion;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class Administracion extends Controller
{
    
    protected function comprobarPermisosAdministrador(){
        // Comprobar si esta logeado y el usuario tiene permisos de administrador
        if(Auth::check()){
            $tipo_usuario = Auth::user()->tipo_usuario;
            if($tipo_usuario == 1){
                return true;
            }
        }
        return false;
    }

    public function index(Request $request){

        // Comprobar si tiene permisos para acceder a esta pagina
        if(!Administracion::comprobarPermisosAdministrador() ){ return redirect('/'); } // Redirigir a inicio

        return redirect('/administracion/usuario');        
    }

    public function usuario(Request $request){
        
        // Comprobar si tiene permisos para acceder a esta pagina
        if(!Administracion::comprobarPermisosAdministrador() ){ return redirect('/'); } // Redirigir a inicio

        switch ($request->method()) {
            case 'POST':
                                
                switch($request->input('transaccion')){

                    case 'crear':{
                        
                        // 
                        $datosUsuario = $request->except(['_token', 'transaccion']);
                        
                        // Cambiar tipo de usuario a 1 (administrador)
                        if( array_key_exists('tipo_usuario', $datosUsuario) ){
                            $datosUsuario['tipo_usuario'] = 1;
                        }

                        $datosUsuario['contrasena'] = password_hash('123456', PASSWORD_DEFAULT);
                        
                        // Agregar fecha de creacion
                        $datosUsuario['created_at'] = Carbon::now();

                        Usuario::insert($datosUsuario);
                        
                        break;
                    }

                    case 'modificar':{
                        
                        $datosUsuario = $request->except(['_token', 'transaccion']);
                        $usuario = Usuario::find($datosUsuario['rut']);

                        // Cambiar tipo de usuario a 1 (administrador)
                        if( array_key_exists('tipo_usuario', $datosUsuario) ){
                            $datosUsuario['tipo_usuario'] = 1;
                        }else{
                            $datosUsuario['tipo_usuario'] = 0;
                        }

                        print('<pre>');
                        print_r($datosUsuario['rut']);
                        print('</pre>');
                        $usuario->update($datosUsuario);
                        break;
                    }

                    case 'eliminar':{
                        $rut = $request->input('rut');
                        $usuario = Usuario::find($rut);
                        $usuario->delete();
                        break;
                    }

                }

                break;
            case 'GET':
                // 
                break;
            default:
                //invalido
                break;
        }
        
        // Obtener todos los usuarios
        $datos['usuarios'] = Usuario::all();



        return view('administracion-usuario', $datos);
    }

    public function publicacion(Request $request){

        // Comprobar si tiene permisos para acceder a esta pagina
        if(!Administracion::comprobarPermisosAdministrador() ){ return redirect('/'); } // Redirigir a inicio

        switch ($request->method()) {
            case 'POST':
                //

                switch($request->input('transaccion')){

                    case 'crear':{
                        
                        // 
                        $datosPublicacion = $request->except(['_token', 'transaccion']);
                        
                        // Cambiar tipo de usuario a 1 (administrador)
                        if( array_key_exists('actividad', $datosPublicacion) ){
                            $datosPublicacion['actividad'] = 1;
                        }

                        if($request->hasFile('imagen')){
                            $datosPublicacion['imagen'] = $request->file('imagen')->store('uploads', 'public');
                        }
                        
                        // Agregar fecha de creacion
                        $datosPublicacion['created_at'] = Carbon::now();

                        Publicacion::insert($datosPublicacion);
                        
                        break;
                    }

                    case 'modificar':{
                        
                        $datosPublicacion = $request->except(['_token', 'transaccion']);
                        $publicacion = Publicacion::find($datosPublicacion['id']);

                        // Cambiar tipo de publicacion a 1 (administrador)
                        if( array_key_exists('actividad', $datosPublicacion) ){
                            $datosPublicacion['actividad'] = 1;
                        }else{
                            $datosPublicacion['actividad'] = 0;
                        }

                        if($request->hasFile('imagen')){
                            
                            // Eliminar imagen anterior
                            Storage::delete( 'public/' . $publicacion->imagen);

                            $datosPublicacion['imagen'] = $request->file('imagen')->store('uploads', 'public');

                        }

                        $publicacion->update($datosPublicacion);
                        break;
                    }

                    case 'eliminar':{
                        $id = $request->input('id');
                        $publicacion = Publicacion::find($id);
                        // eliminar imagen
                        Storage::delete( 'public/' . $publicacion->imagen);

                        $publicacion->delete();
                        break;
                    }

                }

                break;
            case 'GET':
                // 
                break;
            default:
                //invalido
                break;
        }
        
        // Obtener todas las publicaciones
        $datos['publicaciones'] = Publicacion::all();
        
        return view('administracion-publicacion',$datos);
    }
    
    

}
