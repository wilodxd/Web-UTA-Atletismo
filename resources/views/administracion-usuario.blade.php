
@extends('layout')

@section('content')

<main class="seccion-administracion">

    <!--Container de la lista de usuarios-->
    <div class="container pt-5">

        <div class="row">
            
            <a class="col-6 btn btn-primary rounded-right " href="/administracion/usuario/">
                <p class="text-white">Usuarios</p>
            </a>
        
            <a class="col-6 btn btn-secondary rounded-left" href="/administracion/publicacion/">
                <p class="text-white">Publicaciones</p>
            </a>

        </div>
        <!-- </button> -->
        
        
        <div>
            <!--Tabla con los usuarios-->
            <div class="table-responsive border border-dark" style="height: 500px;">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre Completo</th>                                            
                            <th scope="col">Rut</th>
                            <th scope="col">Carrera</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                                       
                        @php $index = 1; @endphp

                        @foreach( $usuarios as $usuario )
                            <tr>
                                <th>{{$index}}</th>
                                <td>{{$usuario->nombre . ' ' . $usuario->apellido_1 . ' ' . $usuario->apellido_2 }}</td>
                                <td>{{$usuario->rut}}</td>
                                <td>{{$usuario->carrera}}</td>
                                <td class="row">
                                    <div class="col-12 col-lg-6">
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modificarUsuario" 
                                        onClick="rellenarFormularioModificarUsuario('<?php echo $usuario->rut ?>')">Modificar</button>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminarUsuario" 
                                        onClick="rellenarFormularioEliminarUsuario('<?php echo $usuario->rut ?>')">Eliminar</button>
                                    </div>
                                </td>
                            </tr>
                        @php $index = $index+1 @endphp
                        @endforeach

                        

                    </tbody>
                </table>

            </div>  

            <!--Boton para agregar usuarios-->
            <div class="btn-responsive">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarUsuario">Agregar</button>
            </div> 
            
            <!-- Crear usuarios -->
            <form method="post" enctype="multipart/form-data">
                <div class="modal fade" id="agregarUsuario">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <input type="hidden" name="transaccion" value="crear">

                            <div class="modal-header">
                                <h2 class="modal-title">Ingresar datos de usuario</h2>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>

                    
                            <div class="modal-body">
                        
                                @csrf

                                <div class="form-group">
                                    <label class="col-form-label" for="nombre">Nombre:</label>
                                    <input class="form-control" name="nombre" id="nombre" >
                                </div>
                                
                                <div class="form-group-h row">
                                    <div class="form-group col-6">
                                        <label class="col-form-label" for="apellido_1">Apellido Paterno:</label>
                                        <input class="form-control" name="apellido_1" id="apellido_1">
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="col-form-label" for="apellido_2">Apellido Materno:</label>
                                        <input class="form-control" name="apellido_2" id="apellido_2">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="rut">Rut:</label>
                                    <input class="form-control" name="rut" id="rut">
                                </div>
                                
                                <div class="form-group-h row">
                                    <div class="form-group col-6">
                                        <label class="col-form-label" for="fecha_nacimiento">Fecha de nacimiento:</label>
                                        <input class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" type="date">
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="col-form-label" for="fecha_ingreso">Fecha de ingreso:</label>
                                        <input class="form-control" name="fecha_ingreso" id="fecha_ingreso" type="date">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="carrera">Carrera:</label>
                                    <input class="form-control" name="carrera" id="carrera">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="correo">Correo electronico:</label>
                                    <input type="email" class="form-control" name="correo" id="correo">
                                </div>                                                   

                                <div class="form-row mb-3" style="align-items: center;">
                                    <label for="tipo_usuario" class="col-3">Administrador</label>
                                    <div class="col">
                                        <input type="checkbox" id="tipo_usuario" name="tipo_usuario">
                                    </div>
                                </div>       
                        
                            </div>

                            <!--? revisar si esto debe ir dentro del form-->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button class="btn btn-primary">Guardar</button>
                            </div>
                    
                        

                        </div>
                    </div>
                </div>
            </form>

            <!-- Modificar usuarios -->
            <form method="post" enctype="multipart/form-data">
                <div class="modal fade" id="modificarUsuario">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <input type="hidden" name="transaccion" value="modificar">

                            <div class="modal-header">
                                <h2 class="modal-title">Actualizar datos de usuario</h2>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>

                    
                            <div class="modal-body">
                        
                                    @csrf

                                    <div class="form-group">
                                        <label class="col-form-label" for="modificar-nombre">Nombre:</label>
                                        <input class="form-control" name="nombre" id="modificar-nombre">
                                    </div>
                                    
                                    <div class="form-group-h row">
                                        <div class="form-group col-6">
                                            <label class="col-form-label" for="modificar-apellido_1">Apellido Paterno:</label>
                                            <input class="form-control" name="apellido_1" id="modificar-apellido_1">
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="col-form-label" for="modificar-apellido_2">Apellido Materno:</label>
                                            <input class="form-control" name="apellido_2" id="modificar-apellido_2">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="modificar-rut">Rut:</label>
                                        <input class="form-control" name="rut" id="modificar-rut" readonly>
                                    </div>
                                    
                                    <div class="form-group-h row">
                                        <div class="form-group col-6">
                                            <label class="col-form-label" for="modificar-fecha_nacimiento">Fecha de nacimiento:</label>
                                            <input class="form-control" name="fecha_nacimiento" id="modificar-fecha_nacimiento" type="date">
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="col-form-label" for="modificar-fecha_ingreso">Fecha de ingreso:</label>
                                            <input class="form-control" name="fecha_ingreso" id="modificar-fecha_ingreso" type="date">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="modificar-carrera">Carrera:</label>
                                        <input class="form-control" name="carrera" id="modificar-carrera">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="modificar-correo">Correo electronico:</label>
                                        <input type="email" class="form-control" name="correo" id="modificar-correo">
                                    </div>                                                   

                                    <div class="form-row mb-3" style="align-items: center;">
                                        <label for="modificar-tipo_usuario" class="col-3">Administrador</label>
                                        <div class="col">
                                            <input type="checkbox" id="modificar-tipo_usuario" name="tipo_usuario">
                                        </div>
                                    </div>       
                        
                                </div>

                            <!--? revisar si esto debe ir dentro del form-->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button class="btn btn-primary">Guardar</button>
                            </div>
                    
                        

                        </div>
                    </div>
                </div>
            </form>
            
            <!-- Modal confirmar eliminar usuario-->
            <div class="modal fade" id="eliminarUsuario">

                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">¿Seguro que quieres eliminar a este usuario?</h2>
                            <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                            </button>
                        </div>
                        
                        <!--Aqui va la información del usuario-->
                        <form method="POST">
                            @csrf
                            <div class="modal-body">
                                <p id="eliminar-texto-nombre"></p>
                                <p>Rut: <span id="eliminar-texto-rut"></span></p>
                                
                                <input type="hidden" id="eliminar-rut" name="rut" value="">
                                <input type="hidden" name="transaccion" value="eliminar">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-danger">Confirmar eliminación</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            

        </div>
        
    </div>

</main>

<script type="text/javascript">

    // crear usuario
    function Usuario(rut,nombre,apellido_1,apellido_2,fecha_nacimiento,fecha_ingreso,carrera,correo,tipo_usuario){
        this.rut = rut;
        this.nombre = nombre;
        this.apellido_1 = apellido_1;
        this.apellido_2 = apellido_2;
        this.fecha_nacimiento = fecha_nacimiento;
        this.fecha_ingreso = fecha_ingreso;
        this.carrera = carrera;
        this.correo = correo;
        this.tipo_usuario = tipo_usuario;
        return this;
    }

    // lista de usuario
    var listaUsuario = [];
    // almacena todos los usuarios en un array
    <?php
        foreach($usuarios as $usuario){
            echo "listaUsuario.push(new Usuario('".$usuario->rut."','".$usuario->nombre."','".$usuario->apellido_1."','".$usuario->apellido_2."','".$usuario->fecha_nacimiento."','".$usuario->fecha_ingreso."','".$usuario->carrera."','".$usuario->correo."','".$usuario->tipo_usuario. "'));" ;
        }
    ?>

    // buscar usuario por rut
    function buscarUsuario(rut){
        for(var i = 0; i < listaUsuario.length; i++){
            if(listaUsuario[i].rut == rut){
                return listaUsuario[i];
            }
        }
    }

</script>

<!-- Rellena datos para modificar el usuario -->
<script>

    function rellenarFormularioModificarUsuario(rut){
        var usuario = buscarUsuario(rut);
        document.getElementById("modificar-rut").value = usuario.rut;
        document.getElementById("modificar-nombre").value = usuario.nombre;
        document.getElementById("modificar-apellido_1").value = usuario.apellido_1;
        document.getElementById("modificar-apellido_2").value = usuario.apellido_2;
        document.getElementById("modificar-fecha_nacimiento").value = usuario.fecha_nacimiento;
        document.getElementById("modificar-fecha_ingreso").value = usuario.fecha_ingreso;
        document.getElementById("modificar-carrera").value = usuario.carrera;
        document.getElementById("modificar-correo").value = usuario.correo;
        if(usuario.tipo_usuario == 1){
            document.getElementById("modificar-tipo_usuario").checked = true;
        }
        else{
            document.getElementById("modificar-tipo_usuario").checked = false;
        }
    }

</script>

<!-- Rellena datos para eliminar el usuario -->
<script>
    
    function rellenarFormularioEliminarUsuario(rut){
        
        // busca el usuario por rut
        var usuario = buscarUsuario(rut);

        // rellena los datos del usuario en el formulario de eliminar
        document.getElementById("eliminar-texto-nombre").innerHTML = usuario.nombre + " " + usuario.apellido_1 + " " + usuario.apellido_2;
        document.getElementById("eliminar-texto-rut").innerHTML = usuario.rut;
        document.getElementById("eliminar-rut").value = usuario.rut;

    }

</script>

@stop