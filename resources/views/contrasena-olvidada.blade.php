@extends('layout')

@section('content')

<main class="seccion-login contenedor">

    <form class="formulario">
        
        <!-- <a href="/login" class="btn btn-back">Volver</a> -->

        <h2>He olvidado mi contraseña</h2>

        <div class="campo">
            <label for="">Rut:</label>
            <input type="text">
        </div>
        
        <p class="formulario__texto">Se enviarán las instrucciones al correo eléctronico.</p>

        <input type="submit" value="Buscar" class="btn btn-primary">
        
    </form>

</main>

@stop