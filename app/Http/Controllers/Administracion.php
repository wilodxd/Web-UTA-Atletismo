<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Publicacion;

class Administracion extends Controller
{
    
    public function index(Request $request){
        return redirect('/administracion/usuario');        
    }

    public function usuario(Request $request){
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
        // switch ($request->method()) {
        //     case 'POST':
        //         // print 'POST';
                

        //         break;
        //     case 'GET':
        //         // 
        //         break;
        //     default:
        //         //invalido
        //         break;
        // }
        
        return view('administracion-publicacion');
    }
    
}
