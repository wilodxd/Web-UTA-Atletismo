<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Inicio;
use App\Http\Controllers\Administracion;
use App\Http\Controllers\Sesion;
use App\Http\Controllers\Perfil;
use App\Http\Controllers\Publicaciones;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Inicio::class, 'index']);
    // return view('welcome');

Route::get( '/publicacion/{id}' , [Publicaciones::class, 'index']);

Route::get( '/sesion' , [Sesion::class, 'index']);

Route::get( '/contrasena-olvidada' , [Sesion::class, 'contrasenaOlvidada']);

Route::get( '/cambiar-contrasena' , [Sesion::class, 'cambiarContrasena']);

Route::get( '/perfil' , [Perfil::class, 'index']);

Route::get( '/administracion' , [Administracion::class, 'index'] );