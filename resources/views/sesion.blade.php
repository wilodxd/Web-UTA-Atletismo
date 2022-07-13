@extends('layout')

@section('content')

<main class="seccion-login contenedor">

    <form class="formulario" method="POST">
        @csrf
        <!-- <input type="text" name="rut">
        <input type="password" name="password">
        <input type="submit" value="Iniciar sesión" class="btn btn-primary"> -->
        
        <h2>Iniciar Sesion</h2>

        <div class="campo">
            <label for="rut">Rut:</label>
            <input type="text" name="rut" id="rut" required>
        </div>
        <div class="campo">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <input type="submit" value="Iniciar sesión" class="btn btn-primary">

        <a href="/contrasena-olvidada" class="enlace-cambiar-contrasena">¿Has olvidado la contraseña?</a>
       
    </form>

</main>

<script>
    
    // esta funcion retorna el formato de rut con el guion y puntos
    function formatoRut(rut) {
        var valor = rut.value.replace('.','');
        valor = valor.replace('-','');
        var cuerpo = valor.slice(0,-1);
        var dv = valor.slice(-1).toUpperCase();

        if(rut.value.length > 0) {
            // se agrega el guion al rut
            rut.value = cuerpo + '-'+ dv
        }
        
    }

    $('#rut').keyup(function(){
        
        formatoRut(document.getElementById('rut'));
        
    });

</script>

@stop