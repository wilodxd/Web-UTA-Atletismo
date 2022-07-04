<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Publicaciones extends Controller
{
    public function index($id){
        return view('publicacion', ['id' => "{$id}"] );
    }
}
