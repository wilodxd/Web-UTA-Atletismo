<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Administracion extends Controller
{
    public function index(){
        return view('administracion');
    }

    public function store(Request $request){
        $name = $request->input('nombre');
        echo $name;
    }
}
