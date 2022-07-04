@extends('layout')

@section('content')

<main class="seccion-login contenedor">

    <form class="formulario">
        
        <h2>Iniciar Sesion</h2>

        <div class="campo">
            <label for="">Rut:</label>
            <input type="text">
        </div>
        <div class="campo">
            <label for="">Contraseña:</label>
            <input type="password">
        </div>
        <input type="submit" value="Iniciar sesión" class="btn btn-primary">

        <a href="/contrasena-olvidada" class="enlace-cambiar-contrasena">¿Has olvidado la contraseña?</a>
    </form>

</main>

@stop