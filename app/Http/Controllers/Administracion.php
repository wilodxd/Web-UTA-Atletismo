<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Publicacion;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Administracion extends Controller
{
    
    protected function verificarErroresUsuario($datosUsuario, $tipo){
        $errores = [];
        
        if($tipo == 'crear'){
            // verificar que el correo no exista
            $usuario = Usuario::where('correo', $datosUsuario['correo'])->first();
            if($usuario){
                $errores['correo'] = 'El correo ya existe';
            }
        }
        if($tipo == 'crear'){
            // verificar que el rut no exista
            $usuario = Usuario::where('rut', $datosUsuario['rut'])->first();
            if($usuario){
                $errores['rut'] = 'El rut ya existe';
            }
        }

        // validar nombre
        $nombre = $datosUsuario['nombre'];
        if(strlen($nombre) < 3){
            $errores['nombre'] = 'El nombre debe tener al menos 3 caracteres';
        }
        // validar apellido 1
        $apellido_1 = $datosUsuario['apellido_1'];
        if(strlen($apellido_1) < 3){
            $errores['apellido_1'] = 'El apellido paterno debe tener al menos 3 caracteres';
        }
        // validar apellido 2
        $apellido_2 = $datosUsuario['apellido_2'];
        if(strlen($apellido_2) < 3){
            $errores['apellido_2'] = 'El apellido  debe tener al menos 3 caracteres';
        }
        // validar carrera
        $carrera = $datosUsuario['carrera'];
        if(strlen($carrera) < 3){
            $errores['carrera'] = 'La carrera debe tener al menos 3 caracteres';
        }

        // validar correo
        $correo = $datosUsuario['correo'];
        if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $errores['correo'] = 'El correo no es válido';
        }
        // validar rut
        $rut = $datosUsuario['rut'];
        if(strlen($rut) < 9){
            $errores['rut'] = 'El rut debe tener al menos 9 caracteres';
        }
        
        if($tipo == 'crear'){
            // validar tamaño imagen
            if(isset($datosUsuario['imagen'])){
                $imagen = $datosUsuario['imagen'];
                $tamano = $imagen->getSize();
                if($tamano > 2000000){
                    $errores['imagen'] = 'La foto de perfil debe tener un tamaño menor a 2MB';
                }
            }else{
                // $errores['imagen'] = 'La foto de perfil es obligatoria';
            }
        }
        

        return $errores;
    }

    protected function verificarErroresPublicacion($datosPublicacion,$tipo){
        $errores = [];
        
        if($tipo == 'crear'){
            // verificar que el titulo no exista
            $publicacion = Publicacion::where('titulo', $datosPublicacion['titulo'])->first();
            if($publicacion){
                $errores['titulo'] = 'El titulo ya existe';
            }
        }
        // validar titulo
        $titulo = $datosPublicacion['titulo'];
        if(strlen($titulo) < 3){
            $errores['titulo'] = 'El titulo debe tener al menos 3 caracteres';
        }
        // validar descripcion
        $contenido = $datosPublicacion['contenido'];
        if(strlen($contenido) < 10){
            $errores['contenido'] = 'El contenido debe tener al menos 10 caracteres';
        }

        if($tipo == 'crear'){
            // validar tamaño imagen
            if(isset($datosPublicacion['imagen'])){
                $imagen = $datosPublicacion['imagen'];
                $tamano = $imagen->getSize();
                if($tamano > 2000000){
                    $errores['imagen'] = 'La imagen debe tener un tamaño menor a 2MB';
                }
            }else{
                $errores['imagen'] = 'La imagen es obligatoria';
            }
        }
        

        return $errores;
    }

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

        // verificar si hay mensaje de error
        $errores = $request->session()->get('errores');
        if(!$errores){
            $errores = [];
        }
        
        // obtener input
        $input = $request->session()->get('input');

        // tipo de error
        $tipoError = $request->session()->get('tipoError');
        

        switch ($request->method()) {
            case 'POST':
                                
                switch($request->input('transaccion')){

                    case 'crear':{
                        
                        // obtener datos
                        $datosUsuario = $request->except(['_token', 'transaccion']);

                        // array de mensajes de errores
                        $errores = Administracion::verificarErroresUsuario($datosUsuario, 'crear');
                        
                        // verificar que no haya errores
                        if(count($errores) > 0){
                            // guardar errores en la sesion
                            // obtener pathname de la imagen del datosusuario
                            $datosUsuario['imagen'] = "";
                            return redirect('/administracion/usuario')->with('errores', $errores)->with('input', $datosUsuario)->with('tipoError', 'crear');
                        }

                        // Cambiar tipo de usuario a 1 (administrador)
                        if( array_key_exists('tipo_usuario', $datosUsuario) ){
                            $datosUsuario['tipo_usuario'] = 1;
                        }

                        $datosUsuario['contrasena'] = password_hash('123456', PASSWORD_DEFAULT);
                        
                        // Agregar fecha de creacion
                        $datosUsuario['created_at'] = Carbon::now();

                        // 
                        if($request->hasFile('imagen')){
                            $datosUsuario['imagen'] = $request->file('imagen')->store('uploads', 'public');
                        }else{
                            $datosUsuario['imagen'] = 'img/' . 'default_user.png';
                        }

                        Usuario::insert($datosUsuario);
                        
                        break;
                    }

                    case 'modificar':{
                        
                        $datosUsuario = $request->except(['_token', 'transaccion']);

                        // array de mensajes de errores
                        $errores = Administracion::verificarErroresUsuario($datosUsuario,'modificar');
                        
                        // verificar que no haya errores
                        if(count($errores) > 0){
                            // guardar errores en la sesion
                            // obtener pathname de la imagen del datosusuario
                            $ruta = Usuario::find($datosUsuario['rut'])->imagen;
                            $datosUsuario['imagen'] = $ruta;
                            return redirect('/administracion/usuario')->with('errores', $errores)->with('input', $datosUsuario)->with('tipoError', 'modificar');
                        }

                        $usuario = Usuario::find($datosUsuario['rut']);

                        // Cambiar tipo de usuario a 1 (administrador)
                        if( array_key_exists('tipo_usuario', $datosUsuario) ){
                            $datosUsuario['tipo_usuario'] = 1;
                        }else{
                            $datosUsuario['tipo_usuario'] = 0;
                        }

                        if($request->hasFile('imagen')){
                            
                            // Eliminar imagen anterior
                            // comprobar que no se la imagen por defecto
                            if($usuario->imagen != 'img/' . 'default_user.png'){
                                Storage::delete( 'public/' . $usuario->imagen);
                            }
                            

                            $datosUsuario['imagen'] = $request->file('imagen')->store('uploads', 'public');

                        }

                        $usuario->update($datosUsuario);
                        break;
                    }

                    case 'eliminar':{
                        $rut = $request->input('rut');
                        $usuario = Usuario::find($rut);
                        // Eliminar imagen
                        // comprobar que no se la imagen por defecto
                        if($usuario->imagen != 'img/' . 'default_user.png'){
                            Storage::delete( 'public/' . $usuario->imagen);
                        }

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
        $datos['errores'] = $errores;
        $datos['input'] = $input;
        $datos['tipoError'] = $tipoError;



        return view('administracion-usuario', $datos);
    }

    public function publicacion(Request $request){

        // Comprobar si tiene permisos para acceder a esta pagina
        if(!Administracion::comprobarPermisosAdministrador() ){ return redirect('/'); } // Redirigir a inicio

        // verificar si hay mensaje de error
        $errores = $request->session()->get('errores');
        if(!$errores){
            $errores = [];
        }
        
        // obtener input
        $input = $request->session()->get('input');

        // tipo de error
        $tipoError = $request->session()->get('tipoError');

        switch ($request->method()) {
            case 'POST':
                //

                switch($request->input('transaccion')){

                    case 'crear':{
                        
                        // 
                        $datosPublicacion = $request->except(['_token', 'transaccion']);
                        
                        // array de mensajes de errores
                        $errores = Administracion::verificarErroresPublicacion($datosPublicacion,'crear');
                    
                        // verificar que no haya errores
                        if(count($errores) > 0){
                            // guardar errores en la sesion
                            // obtener pathname de la imagen del datosPublicacion
                            $datosPublicacion['imagen'] = "";
                            return redirect('/administracion/publicacion')->with('errores', $errores)->with('input', $datosPublicacion)->with('tipoError', 'crear');
                        }

                        // Cambiar tipo de usuario a 1 (administrador)
                        if( array_key_exists('actividad', $datosPublicacion) ){
                            $datosPublicacion['actividad'] = 1;
                        }

                        if($request->hasFile('imagen')){
                            $datosPublicacion['imagen'] = $request->file('imagen')->store('uploads', 'public');
                        }else{
                            $datosPublicacion['imagen'] = 'default.jpg';
                        }
                        
                        // Agregar fecha de creacion
                        $datosPublicacion['created_at'] = Carbon::now();

                        Publicacion::insert($datosPublicacion);
                        
                        break;
                    }

                    case 'modificar':{
                        
                        $datosPublicacion = $request->except(['_token', 'transaccion']);

                        // array de mensajes de errores
                        $errores = Administracion::verificarErroresPublicacion($datosPublicacion,'modificar');
                    
                        // verificar que no haya errores
                        if(count($errores) > 0){
                            // guardar errores en la sesion
                            // obtener ruta de la imagen del datosPublicacion
                            $ruta = Publicacion::find($datosPublicacion['id'])->imagen;
                            $datosPublicacion['imagen'] = $ruta;
                            return redirect('/administracion/publicacion')->with('errores', $errores)->with('input', $datosPublicacion)->with('tipoError', 'modificar')->with('tipoError', 'modificar');
                        }

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
        $datos['publicaciones'] = Publicacion::all()->sortByDesc('created_at');
        $datos['errores'] = $errores;
        $datos['input'] = $input;
        $datos['tipoError'] = $tipoError;
        
        return view('administracion-publicacion',$datos);
    }
    
    

}
