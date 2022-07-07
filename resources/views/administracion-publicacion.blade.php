
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

        <!--Tabla con publicaciones-->
        <form>
            <!--? style debe ir en css-->
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
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <img class="" src="img/publicacion0.jpg" alt="imagen sobre la publicacion" style="max-height: 150px;">
                            </td>                                            
                            <td>Titulo de publicacion</td>
                            <td>04/26/2022</td>
                            <td>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modificarPublicacion">Modificar</button>

                                        <div class="modal fade" id="modificarPublicacion">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modificar datos de la publicacion</h5>
                                                    <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-row mb-3">
                                                            <label for="formControlInput1" class="col-form-label col-12 col-md-3">Título</label>
                                                            <div class="col">
                                                                <input type="text" class="form-control" value="Titulo de publicacion">
                                                            </div>
                                                        </div>
                                            
                                                        <div class="form-row mb-3">
                                                            <label for="formControlInput2" class="col-12 col-md-3">Imagen</label>
                                                            <div class="col">
                                                                <input type="file" class="form-control-file" accept=".png, .jpeg" onchange="loadFile(event, 'imgModificar')">
                                                                <!--? style dentro csss-->
                                                                <img src="img/publicacion0.jpg" class="mt-2" id="imgModificar" alt="Imagen publicación" style="max-width: 200px;">
                                                            </div>
                                                        </div>
                                            
                                                        <div class="form-row mb-3">
                                                            <label for="formControlInput3" class="col-12 col-md-3">Contenido</label>
                                                            <div class="col">
                                                                <!--? style dentro csss-->
                                                                <textarea class="form-control" style="height: 200px; resize: none;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam sapiente recusandae quis enim dolor incidunt placeat ducimus, laudantium error ut, eius pariatur cumque minus totam laborum! Perspiciatis aliquam animi sapiente!</textarea>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-row mb-3" style="align-items: center;">
                                                            <label for="formControlInput4" class="col-3">Actividad</label>
                                                            <div class="col">
                                                                <input type="checkbox">
                                                            </div>
                                                        </div>                                        
                                                    </form>
                                                </div>
                
                                                <!--revisar si esto debe ir dentro del form-->
                
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <button type="button" class="btn btn-primary">Guardar</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-lg-6">

                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminarPublicacion">Eliminar</button>

                                        <!-- Modal confirmar eliminar publicacion-->
                                        <div class="modal fade" id="eliminarPublicacion">

                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">¿Seguro que quieres eliminar esta publicacion?</h5>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                        <span>&times;</span>
                                                        </button>
                                                    </div>
                                                    
                                                    <!--Aqui va la info de la publicacion-->
                                                    <div class="modal-body">
                                                        <p>Titulo de publicacion<br>04/26/2022</p>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        <button type="button" class="btn btn-danger">Confirmar eliminación</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </td>
                        </tr>
                        
                        
                    </tbody>
                </table>
                
                

            </div> 

            <div class="btn-responsive">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarPublicacion">Agregar</button>
            </div>


            <div class="modal fade" id="agregarPublicacion">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ingresar datos de publicacion</h5>
                        <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row mb-3">
                                <label for="formControlInput1" class="col-form-label col-12 col-md-3">Título</label>
                                <div class="col">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                
                            <div class="form-row mb-3">
                                <label for="formControlInput2" class="col-12 col-md-3">Imagen</label>
                                <div class="col">
                                    <input type="file" class="form-control-file" accept=".png, .jpeg" onchange="loadFile(event,'imgAgregar')">
                                    <!--? style -->
                                    <img class="mt-2" id="imgAgregar" alt="Imagen publicación" hidden style="max-width: 200px;">
                                </div>
                            </div>
                
                            <div class="form-row mb-3">
                                <label for="formControlInput3" class="col-12 col-md-3">Contenido</label>
                                <div class="col">
                                    <!--? style -->
                                    <textarea class="form-control" style="height: 200px; resize: none;"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-row mb-3">
                                <label for="formControlInput4" class="col-3">Actividad</label>
                                <div class="col" >
                                    <input type="checkbox">
                                </div>
                            </div>                                        
                        </form>
                    </div>

                    <!--revisar si esto debe ir dentro del form-->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                    </div>
                </div>
            </div>

        </form>
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

@stop