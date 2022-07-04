@extends('layout')

@section('content')

<main class="seccion-administracion">

    <!--Container de la lista de usuarios-->
    <div class="container pt-5">

        <!--Boton para maximizar la tabla, se necesita hacer el data-target al id de la tabla(div que contiene a la tabla)-->
        <button class="btn btn-light btn-block" type="button" data-toggle="collapse" data-target="#tablaUsuarios">
            Lista de usuarios
        </button>
        
        <div class="collapse" id="tablaUsuarios">
            <form>
                <!--? el style-->
                <!--Tabla con los usuarios-->
                <div class="table-responsive border border-dark" style="height: 500px;">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>                                            
                                <th scope="col">Rut</th>
                                <th scope="col">Carrera</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Piero Alonso Suarez Zuñiga</td>                                            
                                <td>11.111.111-1</td>
                                <td>Ing. Informatica</td>
                                <td>
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modificarUsuario">Modificar</button>

                                            <div class="modal fade" id="modificarUsuario">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modificar los datos de usuario</h5>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                        <span>&times;</span>
                                                        </button>
                                                    </div>

                                                    <!--Valores de ejemplo-->
                                                    <div class="modal-body">
                                                        <form>                                                
                                                            <div class="form-group">
                                                                <label class="col-form-label">Nombre:</label>
                                                                <input class="form-control" value="Piero Alonso">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-form-label">Apellidos:</label>
                                                                <input class="form-control" value="Suarez Zuñiga">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-form-label">Rut:</label>
                                                                <input class="form-control" value="11.111.111-1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-form-label">Fecha de ingreso:</label>
                                                                <input class="form-control" value="03/06/2022">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-form-label">Carrera:</label>
                                                                <input class="form-control" value="Ing. Informatica">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-form-label">Correo electronico:</label>
                                                                <input type="email" class="form-control" value="piero.suarez.zuniga@alumnos.uta.cl">
                                                            </div>                                                   
                    
                                                        </form>
                                                    </div>
                    
                                                    <!--? revisar si esto debe ir dentro del form-->
                    
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        <button type="button" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-lg-6">

                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminarUsuario">Eliminar</button>

                                            <!-- Modal confirmar eliminar usuario-->
                                            <div class="modal fade" id="eliminarUsuario">

                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">¿Seguro que quieres eliminar a este usuario?</h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                            <span>&times;</span>
                                                            </button>
                                                        </div>
                                                        
                                                        <!--Aqui va el nombre del usuario-->
                                                        <div class="modal-body">
                                                            <p>Piero Suarez</p>
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

                <!--Boton para agregar usuarios-->
                <div class="btn-responsive">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarUsuario">Agregar</button>
                </div> 
                
                <div class="modal fade" id="agregarUsuario">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Ingresar datos de usuario</h2>
                            <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>                                                
                                <div class="form-group">
                                    <label class="col-form-label">Nombre:</label>
                                    <input class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Apellidos:</label>
                                    <input class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Rut:</label>
                                    <input class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Fecha de ingreso:</label>
                                    <input class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Carrera:</label>
                                    <input class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Correo electronico:</label>
                                    <input type="email" class="form-control">
                                </div>                                                   

                            </form>
                        </div>

                        <!--? revisar si esto debe ir dentro del form-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary">Guardar</button>
                        </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="container pb-5">
        <button class="btn btn-light btn-block" type="button" data-toggle="collapse" data-target="#tablaPublicaciones">
            Lista de publicaciones
        </button>

        <!--Tabla con publicaciones-->
        <div class="collapse" id="tablaPublicaciones">
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