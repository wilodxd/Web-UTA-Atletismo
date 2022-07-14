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
            <input type="text" name="rut" id="rut" required maxlength="12">
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
    
    document.getElementById('rut').addEventListener('input', function(evt) {
        let value = this.value.replace(/\./g, '').replace('-', '');
        
        if (value.match(/^(\d{2})(\d{3}){2}(\w{1})$/)) {
            value = value.replace(/^(\d{2})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4');
        }
        else if (value.match(/^(\d)(\d{3}){2}(\w{0,1})$/)) {
            value = value.replace(/^(\d)(\d{3})(\d{3})(\w{0,1})$/, '$1.$2.$3-$4');
        }
        else if (value.match(/^(\d)(\d{3})(\d{0,2})$/)) {
            value = value.replace(/^(\d)(\d{3})(\d{0,2})$/, '$1.$2.$3');
        }
        else if (value.match(/^(\d)(\d{0,2})$/)) {
            value = value.replace(/^(\d)(\d{0,2})$/, '$1.$2');
        }
        this.value = value;
    });

</script>

@stop