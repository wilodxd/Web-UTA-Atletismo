@extends('layout')

@section('content')



<div class="seccion-principal-contenedor">

    <section class="seccion-publicaciones">

        <div class="seccion-publicaciones__contenedor">
            
            <h2 class="seccion-publicaciones__titulo text-center mb-4">Últimas Publicaciones</h2>

            <div class="seccion-publicaciones__grid">

                @foreach($publicaciones as $publicacion)
                
                    <!-- comprobar que la publicacion sea una actividad -->
                    @if($publicacion->actividad == 0)
                    
                    <div class="publicacion">

                        <img class="publicacion__imagen" src="{{asset('storage').'/'.$publicacion->imagen }}" alt="imagen sobre la publicacion">

                        <div class="publicacion__texto">

                            <h3 class="publicacion__titulo">{{$publicacion->titulo}}</h3>

                            <p class="publicacion__resumen">{{$publicacion->contenido}}</p>                        

                            <div class="publicacion__meta">
                                <p class="publicacion__escritor">autor: <span>
                                   <?php
                                    
                                        $encontrado = false;

                                        foreach($usuarios as $usuario){
                                            if($usuario->rut == $publicacion->rut_autor){
                                                // nombre completo
                                                echo $usuario->nombre.' '.$usuario->apellido_1.' '.$usuario->apellido_2;
                                                $encontrado = true;
                                            }
                                        }

                                        if(!$encontrado){
                                            echo 'Administrador';
                                        }
                                   ?>

                                    
                                </span> </p>
                                <p class="publicacion__fecha">Fecha <?php echo is_null($publicacion->updated_at) ? 'creacion' : 'actualizacion' ?>: <span> <?php echo is_null($publicacion->updated_at) ? $publicacion->created_at : $publicacion->updated_at ?> </span></p>
                            </div>

                            <a href="/publicacion/<?php echo $publicacion->id?>" class="btn btn-primary publicacion__boton">Seguir Leyendo...</a>

                        </div>

                    </div><!-- ./publicacion -->

                    @endif

                @endforeach

                <!-- <div class="publicacion">

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

                </div>-->

                
            </div>


        </div>

    </section>

    <aside class="seccion-actividades">

        <div class="seccion-actividades__contenedor">
            <h2 class="seccion-actividades__titulo text-center mb-4">Últimas Actividades</h2>

            <div class="seccion-publicaciones__grid--actividad">

                @foreach($publicaciones as $publicacion)
                    
                    <!-- comprobar que la publicacion sea una actividad -->
                    @if($publicacion->actividad == 1)
                    
                    <div class="publicacion publicacion--actividad">

                        <img class="publicacion__imagen  publicacion__imagen--actividad" src="{{asset('storage').'/'.$publicacion->imagen }}" alt="imagen sobre la publicacion">

                        <div class="publicacion__texto publicacion__texto--actividad">

                            <h3 class="publicacion__titulo publicacion__titulo--actividad">{{$publicacion->titulo}}</h3>

                            <div class="publicacion__meta publicacion__meta--actividad">
                                <p class="publicacion__escritor publicacion__escritor--actividad">autor: <span>
                                <?php
                                    
                                        $encontrado = false;

                                        foreach($usuarios as $usuario){
                                            if($usuario->rut == $publicacion->rut_autor){
                                                // nombre completo
                                                echo $usuario->nombre.' '.$usuario->apellido_1.' '.$usuario->apellido_2;
                                                $encontrado = true;
                                            }
                                        }

                                        if(!$encontrado){
                                            echo 'Administrador';
                                        }
                                ?>

                                    
                                </span> </p>
                                <p class="publicacion__fecha publicacion__fecha--actividad">Fecha <?php echo is_null($publicacion->updated_at) ? 'creacion' : 'actualizacion' ?>: <span> <?php echo is_null($publicacion->updated_at) ? $publicacion->created_at : $publicacion->updated_at ?> </span></p>
                            </div>

                            <a href="/publicacion/<?php echo $publicacion->id?>" class="btn btn-primary publicacion__boton publicacion__boton--actividad">Seguir Leyendo...</a>

                        </div>

                    </div><!-- ./publicacion -->

                    @endif

                @endforeach

                <!-- <div class="publicacion publicacion--actividad">

                    <img class="publicacion__imagen publicacion__imagen--actividad" src="img/publicacion0.jpg" alt="imagen sobre la publicacion">

                    <div class="publicacion__texto publicacion__texto--actividad">

                        <h3 class="publicacion__titulo publicacion__titulo--actividad">Titulo Actividad</h3>                 

                        <div class="publicacion__meta publicacion__meta--actividad">
                            <p class="publicacion__escritor publicacion__escritor--actividad">Escrito por: <span>Usain Bolt</span> </p>
                            <p class="publicacion__fecha publicacion__fecha--actividad">Fecha: <span>29/05/2022</span></p>
                        </div>

                        <a href="/publicacion.html" class="btn btn-primary publicacion__boton publicacion__boton--actividad">Ver Actividad<a>

                    </div>

                </div> -->

                

            </div>
        </div>

    </section>

</div>

@stop