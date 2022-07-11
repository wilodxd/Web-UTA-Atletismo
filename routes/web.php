<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get( '/publicacion/{id}' , [Publicaciones::class, 'index']);

Route::match( array('GET','POST'), '/sesion' , [Sesion::class, 'index']);

Route::get( '/contrasena-olvidada' , [Sesion::class, 'contrasenaOlvidada']);

Route::get( '/cambiar-contrasena' , [Sesion::class, 'cambiarContrasena']);

Route::get( '/perfil' , [Perfil::class, 'index']);

Route::get( '/administracion' , [Administracion::class, 'index'] );

Route::match( array('GET','POST'), '/administracion/usuario' , [Administracion::class, 'usuario'] );

Route::match( array('GET','POST'), '/administracion/publicacion' , [Administracion::class, 'publicacion'] );

Route::get( '/actividad' , [Publicaciones::class, 'inscribirse'] );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');
