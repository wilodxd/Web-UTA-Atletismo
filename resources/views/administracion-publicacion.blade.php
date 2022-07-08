
@extends('layout')

@section('content')

<main class="seccion-administracion">

    <!--Container de la lista de usuarios-->
    <div class="container pt-5">

        <div class="row">
            
            <a class="col-6 btn btn-secondary rounded-right " href="/administracion/usuario/">
                <p class="text-white">Usuarios</p>
            </a>
        
            <a class="col-6 btn btn-primary rounded-left" href="/administracion/publicacion/">
                <p class="text-white">Publicaciones</p>
            </a>

        </div>

        <div>
            <!--Tabla con publicaciones-->
            <div class="table-responsive border border-dark" style="height: 500px;">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Titulo</th>                                            
                            <th scope="col">Fecha</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($publicaciones as $publicacion)

                            <tr>

                                <th>{{$publicacion->id}}</th>
                                <td>
                                    <img class="" src="{{asset('storage').'/'.$publicacion->imagen }}" alt="imagen sobre la publicacion" style="max-height: 150px;">
                                </td>                                            
                                <td>{{$publicacion->titulo}}</td>
                                <td>{{$publicacion->created_at}}</td>
                                <td class="row">
                                    
                                    <div class="col-12 col-lg-6">
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modificarPublicacion"
                                        onClick="rellenarFormularioModificarPublicacion('<?php echo $publicacion->id ?>')">Modificar</button>
                                    </div>
                                    
                                    <div class="col-12 col-lg-6">

                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminarPublicacion"
                                        onClick="rellenarFormularioEliminarPublicacion('<?php echo $publicacion->id ?>')">Eliminar</button>

                                    </div>

                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div> 

            <!-- boton agregar publicacion -->
            <div class="btn-responsive">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarPublicacion">Agregar</button>
            </div>

            <!--Crear publicacion-->
            <form method=post enctype="multipart/form-data">
                <div class="modal fade" id="agregarPublicacion">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <input type="hidden" name="transaccion" value="crear">

                            <div class="modal-header">
                                <h2 class="modal-title">Ingresar datos de publicacion</h2>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                @csrf

                                <div class="form-row mb-3">
                                    <label for="formControlInput1" class="col-form-label col-12 col-md-3">Título</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="titulo" id="titulo">
                                    </div>
                                </div>                           
                                    
                        
                                <div class="form-row mb-3">
                                    <label for="formControlInput2" class="col-12 col-md-3">Imagen</label>
                                    <div class="col">
                                        <input type="file" class="form-control-file" accept=".png, .jpeg" onchange="loadFile(event,'imgAgregar')" name="imagen" id="imagen">
                                        <!--? style -->
                                        <img class="mt-2" id="imgAgregar" alt="Imagen publicación" hidden style="max-width: 200px;">
                                    </div>
                                </div>
                    
                                <div class="form-row mb-3">
                                    <label for="formControlInput3" class="col-12 col-md-3">Contenido</label>
                                    <div class="col">
                                        <!--? style -->
                                        <textarea class="form-control" style="height: 200px; resize: none;" name="contenido" id="contenido"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-row mb-3">
                                    <label for="formControlInput4" class="col-3">Actividad</label>
                                    <div class="col" >
                                        <input type="checkbox" name="actividad" id="actividad">
                                    </div>
                                </div>                                        
                            
                            </div>

                        <!--revisar si esto debe ir dentro del form-->

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           

            <!-- Modificar publicacion -->
            <form method="post" enctype="multipart/form-data">
                <div class="modal fade" id="modificarPublicacion">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <input type="hidden" name="transaccion" value="modificar">
                            <input type="hidden" id="modificar-id" name="id" value="">

                            <div class="modal-header">
                                <h2 class="modal-title">Modificar datos de la publicacion</h2>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                            
                                @csrf

                                <div class="form-row mb-3">
                                    <label for="modificar-titulo" class="col-form-label col-12 col-md-3">Título</label>
                                    <div class="col">
                                        <input type="text" id="modificar-titulo"  name="titulo" class="form-control" value="Titulo de publicacion">
                                    </div>
                                </div>
                    
                                <div class="form-row mb-3">
                                    <label for="modificar-imagen" class="col-12 col-md-3">Imagen</label>
                                    <div class="col">
                                        <input id="modificar-imagen" type="file" class="form-control-file" name="imagen" accept=".png, .jpeg" onchange="loadFile(event, 'imgModificar')">
                                        <!--? style dentro csss-->
                                        <img src="img/publicacion0.jpg" class="mt-2" id="imgModificar" alt="Imagen publicación" style="max-width: 200px;">
                                    </div>
                                </div>
                    
                                <div class="form-row mb-3">
                                    <label for="modificar-contenido" class="col-12 col-md-3">Contenido</label>
                                    <div class="col">
                                        <!--? style dentro csss-->
                                        <textarea class="form-control" style="height: 200px; resize: none;" id="modificar-contenido" name="contenido">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam sapiente recusandae quis enim dolor incidunt placeat ducimus, laudantium error ut, eius pariatur cumque minus totam laborum! Perspiciatis aliquam animi sapiente!</textarea>
                                    </div>
                                </div>
                                
                                <div class="form-row mb-3" style="align-items: center;">
                                    <label for="modificar-actividad" class="col-3">Actividad</label>
                                    <div class="col">
                                        <input type="checkbox" id="modificar-actividad" name="actividad">
                                    </div>
                                </div>                                        
                                
                            </div>

                            <!--revisar si esto debe ir dentro del form-->

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button class="btn btn-primary">Guardar</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
            <!-- Eliminar publicacion -->
            <div class="modal fade" id="eliminarPublicacion">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">¿Seguro que quieres eliminar esta publicacion?</h2>
                            <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                            </button>
                        </div>
                        
                        <!--Aqui va la info de la publicacion-->
                        <form method="POST">
                            @csrf
                            <div class="modal-body">
                                <p id="eliminar-texto-id">id</p>
                                <p id="eliminar-texto-titulo">titulo</p>
                                <input type="hidden" id="eliminar-id" name="id" value="">
                                <input type="hidden" name="transaccion" value="eliminar">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button class="btn btn-danger">Confirmar eliminación</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
        
    </div>

</main>

<!--Cambia el url de la imagen por el archivo seleccionado y la muestra (hidden = false)-->
<script>
    var loadFile = function(event, idImagen) {
        var image = document.getElementById(idImagen);
        image.src = URL.createObjectURL(event.target.files[0]);
        image.hidden = false;
    };
</script>

<script type="text/javascript">
    // crear publicacion
    function Publicacion(id, titulo, contenido, imagen, actividad, created_at, updated_at){
        this.id = id;
        this.titulo = titulo;
        this.contenido = contenido;
        this.imagen = imagen;
        this.actividad = actividad;
        this.created_at = created_at;
        this.updated_at = updated_at;
        return this;
    }

    // lista de publicaciones
    var listaPublicaciones = [];

    // almacena todas las publicaciones en un array
    <?php
        foreach($publicaciones as $publicacion){
            echo "listaPublicaciones.push(new Publicacion(".$publicacion->id.", '".$publicacion->titulo."', '".$publicacion->contenido."', '".$publicacion->imagen."', ".$publicacion->actividad.", '".$publicacion->created_at."', '".$publicacion->updated_at."'));";
        }
    ?>

    // buscar publicaion por id
    function buscarPublicacion(id){
        for(var i = 0; i < listaPublicaciones.length; i++){
            if(listaPublicaciones[i].id == id){
                return listaPublicaciones[i];
            }
        }
    }
    
</script>

<script>

    function rellenarFormularioModificarPublicacion(id){
        var publicacion = buscarPublicacion(id);
        document.getElementById("modificar-id").value = publicacion.id;
        document.getElementById("modificar-titulo").value = publicacion.titulo;
        document.getElementById("modificar-contenido").value = publicacion.contenido;
        document.getElementById("modificar-actividad").checked = publicacion.actividad;
        document.getElementById("imgModificar").src = '<?php echo asset('storage').'/' ?>' + publicacion.imagen;
        

        
    }

</script>

<script>

    function rellenarFormularioEliminarPublicacion(id){
        var publicacion = buscarPublicacion(id);
        document.getElementById("eliminar-texto-id").innerHTML = publicacion.id;
        document.getElementById("eliminar-texto-titulo").innerHTML = publicacion.titulo;
        document.getElementById("eliminar-id").value = publicacion.id;

    }

    

</script>

@stop