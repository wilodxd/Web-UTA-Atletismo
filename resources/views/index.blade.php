@extends('layout')

@section('content')

<div class="seccion-principal-contenedor">

    <section class="seccion-publicaciones">

        <div class="seccion-publicaciones__contenedor">
            
            <h2 class="seccion-publicaciones__titulo text-center mb-4">Últimas Publicaciones</h2>

            <div class="seccion-publicaciones__grid">

                <div class="publicacion">

                    <img class="publicacion__imagen" src="img/publicacion0.jpg" alt="imagen sobre la publicacion">

                    <div class="publicacion__texto">

                        <h3 class="publicacion__titulo">Titulo Publicacion</h3>

                        <p class="publicacion__resumen">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus molestias, modi, debitis excepturi eligendi consequuntur tempore similique quam est voluptate cum itaque...</p>                        

                        <div class="publicacion__meta">
                            <p class="publicacion__escritor">Escrito por: <span>Usain Bolt</span> </p>
                            <p class="publicacion__fecha">Fecha: <span>29/05/2022</span></p>
                        </div>

                        <a href="/publicacion.html" class="btn btn-primary publicacion__boton">Seguir Leyendo...</a>

                    </div>

                </div><!-- ./publicacion -->

                <div class="publicacion">

                    <img class="publicacion__imagen" src="img/publicacion0.jpg" alt="imagen sobre la publicacion">

                    <div class="publicacion__texto">

                        <h3 class="publicacion__titulo">Titulo Publicacion</h3>

                        <p class="publicacion__resumen">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus molestias, modi, debitis excepturi eligendi consequuntur tempore similique quam est voluptate cum itaque...</p>                        

                        <div class="publicacion__meta">
                            <p class="publicacion__escritor">Escrito por: <span>Usain Bolt</span> </p>
                            <p class="publicacion__fecha">Fecha: <span>29/05/2022</span></p>
                        </div>

                        <a href="/publicacion.html" class="btn btn-primary publicacion__boton">Seguir Leyendo...</a>

                    </div>

                </div><!-- ./publicacion -->

                <div class="publicacion">

                    <img class="publicacion__imagen" src="img/publicacion0.jpg" alt="imagen sobre la publicacion">

                    <div class="publicacion__texto">

                        <h3 class="publicacion__titulo">Titulo Publicacion</h3>

                        <p class="publicacion__resumen">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus molestias, modi, debitis excepturi eligendi consequuntur tempore similique quam est voluptate cum itaque...</p>                        

                        <div class="publicacion__meta">
                            <p class="publicacion__escritor">Escrito por: <span>Usain Bolt</span> </p>
                            <p class="publicacion__fecha">Fecha: <span>29/05/2022</span></p>
                        </div>

                        <a href="/publicacion.html" class="btn btn-primary publicacion__boton">Seguir Leyendo...</a>

                    </div>

                </div><!-- ./publicacion -->

            </div>


        </div>

    </section>

    <aside class="seccion-actividades">

        <div class="seccion-actividades__contenedor">
            <h2 class="seccion-actividades__titulo text-center mb-4">Últimas Actividades</h2>

            <div class="seccion-publicaciones__grid--actividad">

                <div class="publicacion publicacion--actividad">

                    <img class="publicacion__imagen publicacion__imagen--actividad" src="img/publicacion0.jpg" alt="imagen sobre la publicacion">

                    <div class="publicacion__texto publicacion__texto--actividad">

                        <h3 class="publicacion__titulo publicacion__titulo--actividad">Titulo Actividad</h3>                 

                        <div class="publicacion__meta publicacion__meta--actividad">
                            <p class="publicacion__escritor publicacion__escritor--actividad">Escrito por: <span>Usain Bolt</span> </p>
                            <p class="publicacion__fecha publicacion__fecha--actividad">Fecha: <span>29/05/2022</span></p>
                        </div>

                        <a href="/publicacion.html" class="btn btn-primary publicacion__boton publicacion__boton--actividad">Ver Actividad<a>

                    </div>

                </div><!-- ./publicacion -->

                <div class="publicacion publicacion--actividad">

                    <img class="publicacion__imagen publicacion__imagen--actividad" src="img/publicacion0.jpg" alt="imagen sobre la publicacion">

                    <div class="publicacion__texto publicacion__texto--actividad">

                        <h3 class="publicacion__titulo publicacion__titulo--actividad">Titulo Actividad</h3>                 

                        <div class="publicacion__meta publicacion__meta--actividad">
                            <p class="publicacion__escritor publicacion__escritor--actividad">Escrito por: <span>Usain Bolt</span> </p>
                            <p class="publicacion__fecha publicacion__fecha--actividad">Fecha: <span>29/05/2022</span></p>
                        </div>

                        <a href="/publicacion.html" class="btn btn-primary publicacion__boton publicacion__boton--actividad">Ver Actividad</a>

                    </div>

                </div><!-- ./publicacion -->

                <div class="publicacion publicacion--actividad">

                    <img class="publicacion__imagen publicacion__imagen--actividad" src="img/publicacion0.jpg" alt="imagen sobre la publicacion">

                    <div class="publicacion__texto publicacion__texto--actividad">

                        <h3 class="publicacion__titulo publicacion__titulo--actividad">Titulo Actividad</h3>                 

                        <p class="publicacion__resumen">Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>  

                        <div class="publicacion__meta publicacion__meta--actividad">
                            <p class="publicacion__escritor publicacion__escritor--actividad">Escrito por: <span>Usain Bolt</span> </p>
                            <p class="publicacion__fecha publicacion__fecha--actividad">Fecha: <span>29/05/2022</span></p>
                        </div>

                        <a href="/publicacion.html" class="btn btn-primary publicacion__boton publicacion__boton--actividad">Ver Actividad</a>

                    </div>

                </div><!-- ./publicacion -->

                

            </div>
        </div>

    </section>

</div>

@stop