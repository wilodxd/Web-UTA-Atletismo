<!DOCTYPE html>
<html lang="Es-es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTA Atletismo - Inicio</title>
    
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
    
    <header class="header">
        <div class="header__contenedor">
            <div class="header__contenido">
                <img class="header__logo" src="{{URL::asset('img/logo.png')}}" alt="Logo del club atletico universitarios de tarapaca">
                <h1 class="header__titulo">Club Atletico Universitarios de Tarapaca</h1>
            </div>
            <!-- <nav class="navegacion">
                <a href="/" class="navegacion__link">Inicio</a>
                <a href="#" class="navegacion__link">Nosotros</a>
                <a href="#" class="navegacion__link navegacion__link--ingresar">Ingresar</a>
            </nav> -->
            <nav class="navegacion">
                <a href="/" class="navegacion__link">Inicio</a>
                <!-- <a href="#" class="navegacion__link">Nosotros</a> -->
                @auth
                <a href="/perfil" class="navegacion__link">Perfil</a>
                <a href="/administracion" class="navegacion__link navegacion__link--secundario">Administracion</a>
                <a href="/logout" class="navegacion__link navegacion__link--primario">Cerrar sesion</a>
                @else
                <a href="/sesion" class="navegacion__link navegacion__link--primario">Ingresar</a>
                @endauth
            </nav>
        </div>
    </header>

    @yield('content');

    <footer class="footer">
        <div class="footer__contenedor">
            <p class="footer__empresa">Utasoft</p>
            <p class="copyright"> Todos los derechos Reservados &copy;</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    

</body>
</html>