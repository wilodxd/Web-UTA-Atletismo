@extends('layout')

@section('content')

<main class="seccion-login contenedor">


    <form class="formulario">
        
        <!-- <a href="/login" class="btn btn-back">Volver</a> -->

        <h2>Contraseña nueva</h2>

        <div class="campo">
            <label for="">Contraseña:</label>
            <input type="password">
        </div>

        <div class="campo">
            <label for="">Repetir Contraseña:</label>
            <input type="password">
        </div>
        
        <p class="formulario__texto">Recuerda usar caracteres especiales para una mejor seguridad!</p>

        <input type="submit" value="Cambiar contraseña" class="btn btn-primary">
        
    </form>

</main>

@stop