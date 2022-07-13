@extends('layout')

@section('content')

<div class="contenedor-contenido">

    <main class="seccion publicacion-completa ">
        <h2 class="publicacion__titulo text-center">{{ $publicacionActual->titulo }}</h2>
        <img class="publicacion__imagen" src="{{asset('storage').'/'.$publicacionActual->imagen }}" alt="imagen sobre la publicacion">
        <div class="publicacion__meta publicacion__meta--completa">
            <p class="publicacion__escritor">Escrito por: <span>{{$autor}}</span> </p>
            <p class="publicacion__fecha">Fecha <?php echo is_null($publicacionActual->updated_at) ? 'creacion' : 'actualizacion' ?>: <span><?php echo is_null($publicacionActual->updated_at) ? $publicacionActual->created_at : $publicacionActual->updated_at ?></span></p>
        </div>
        <p>{{$publicacionActual->contenido}}</p>
        
    </main>

    <div class="lateral-contenedor">

        @if($publicacionActual->actividad == 1)
            
            <form class="actividad" action="/actividad">
                <p class="actividad__texto">¿Desea inscribirse a esta actividad?</p>
                <input type="hidden" name="id_publicacion" value="{{$publicacionActual->id}}">
                @if($inscrito)
                    <button type="submit" class="btn btn-secondary actividad__boton">Inscrito</button>
                @else
                    <button type="submit" class="btn btn-primary actividad__boton">Inscribirse</button>
                @endif
            </form>
        @endif


        <aside>
            <h2 class="lateral-contenedor__titulo text-center mb-4">Más publicaciones</h2>
            <div class="seccion-publicaciones__grid">

                @foreach($publicaciones as $publicacion)

                    <div class="publicacion publicacion--mini">

                        <img class="publicacion__imagen publicacion__imagen--mini" src="{{asset('storage').'/'.$publicacion->imagen }}" alt="imagen sobre la publicacion">

                        <div class="publicacion__texto publicacion__texto--mini">

                            <h3 class="publicacion__titulo publicacion__titulo--mini">{{$publicacion->titulo}}</h3>

                            <p class="publicacion__resumen publicacion__resumen--mini">
                                {{ (strlen( $publicacion->contenido ) > 60) ? substr($publicacion->contenido,0,60) . '...' : $publicacion->contenido,0,60 }}
                            </p>                        

                            <div class="publicacion__meta publicacion__meta--mini">
                                <p class="publicacion__escritor publicacion__escritor--mini">Escrito por: <span><?php
                                    
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
                                    
                            ?></span> </p>
                                <p class="publicacion__fecha publicacion__fecha--mini">Fecha <?php echo is_null($publicacion->updated_at) ? 'creacion' : 'actualizacion' ?>: <span> <?php echo is_null($publicacion->updated_at) ? $publicacion->created_at : $publicacion->updated_at ?> </span></p>
                            </div>

                            <a href="/publicacion/<?php echo $publicacion->id?>" class="btn btn-primary publicacion__boton">Seguir Leyendo...</a>

                        </div>

                    </div>
                    
                @endforeach

            </div>
        </aside>
    </div>


</div>

@stop