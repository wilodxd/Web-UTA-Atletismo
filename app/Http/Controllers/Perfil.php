<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Perfil extends Controller
{
    public function index(){
        // verificar que esta logeado
        if(Auth::check()){
            return view('perfil');
        }
        return redirect('/');
    }
}
