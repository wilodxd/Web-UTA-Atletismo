@extends('layout')

@section('content')

{{$id}}

<div class="contenedor-contenido">

    <main class="seccion publicacion-completa ">
        <h2 class="publicacion__titulo text-center">Titulo Publicacion</h2>
        <img class="publicacion__imagen" src="/img/publicacion0.jpg" alt="imagen sobre la publicacion">
        <div class="publicacion__meta publicacion__meta--completa">
            <p class="publicacion__escritor">Escrito por: <span>Usain Bolt</span> </p>
            <p class="publicacion__fecha">Fecha: <span>29/05/2022</span></p>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rerum atque, quis quidem excepturi voluptatibus repellat hic voluptatem iste vel, quam quo mollitia ad provident eligendi possimus itaque ea illo praesentium. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores earum libero ut rem possimus dolorum odio labore, unde corrupti architecto ab esse cupiditate vitae perspiciatis reiciendis distinctio veritatis error sequi. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Optio culpa recusandae aperiam illo et officiis, similique, aliquid eius voluptatum odit ratione laborum dolores quasi at molestias atque. Soluta, repellendus repellat! um dolor, sit amet consectetur adipisicing elit. Maiores earum libero ut rem possimus dolorum odio labore, unde corrupti architecto ab esse cupiditate vitae perspiciatis reiciendis distinctio veritatis error sequi. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Optio culpa recusandae aperiam illo et officiis, similique, aliquid eius voluptatum odit ratione laborum dolores quasi at molestias atque. Soluta, repellendus repellat! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rerum atque, quis quidem excepturi voluptatibus repellat hic voluptatem iste vel, quam quo mollitia ad provident eligendi possimus itaque ea illo praesentium. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores earum libero ut rem possimus dolorum odio labore, unde corrupti architecto ab esse cupiditate vitae perspiciatis reiciendis distinctio veritatis error sequi. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Optio culpa recusandae aperiam illo et officiis, similique, aliquid eius voluptatum odit ratione laborum dolores quasi at molestias atque. Soluta, repellendus repellat! um dolor, sit amet consectetur adipisicing elit. Maiores earum libero ut rem possimus dolorum odio labore, unde corrupti architecto ab esse cupiditate vitae perspiciatis reiciendis distinctio veritatis error sequi. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Optio culpa recusandae aperiam illo et officiis, similique, aliquid eius voluptatum odit ratione laborum dolores quasi at molestias atque. Soluta, repellendus repellat!</p>
        <!-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rerum atque, quis quidem excepturi voluptatibus repellat hic voluptatem iste vel, quam quo mollitia ad provident eligendi possimus itaque ea illo praesentium. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores earum libero ut rem possimus dolorum odio labore, unde corrupti architecto ab esse cupiditate vitae perspiciatis reiciendis distinctio veritatis error sequi. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Optio culpa recusandae aperiam illo et officiis, similique, aliquid eius voluptatum odit ratione laborum dolores quasi at molestias atque. Soluta, repellendus repellat! um dolor, sit amet consectetur adipisicing elit. Maiores earum libero ut rem possimus dolorum odio labore, unde corrupti architecto ab esse cupiditate vitae perspiciatis reiciendis distinctio veritatis error sequi. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Optio culpa recusandae aperiam illo et officiis, similique, aliquid eius voluptatum odit ratione laborum dolores quasi at molestias atque. Soluta, repellendus repellat!Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rerum atque, quis quidem excepturi voluptatibus repellat hic voluptatem iste vel, quam quo mollitia ad provident eligendi possimus itaque ea illo praesentium. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores earum libero ut rem possimus dolorum odio labore, unde corrupti architecto ab esse cupiditate vitae perspiciatis reiciendis distinctio 
        </p> -->
    </main>

    <div class="lateral-contenedor">
        <div class="actividad">
            <p class="actividad__texto">¿Desea inscribirse a esta actividad?</p>
            <button type="button" class="btn btn-primary actividad__boton">Inscribirse</button>
        </div>
        <aside>
            <h2 class="lateral-contenedor__titulo text-center mb-4">Más publicaciones</h2>
            <div class="seccion-publicaciones__grid">

                <div class="publicacion publicacion--mini">

                    <img class="publicacion__imagen publicacion__imagen--mini" src="/img/publicacion0.jpg" alt="imagen sobre la publicacion">

                    <div class="publicacion__texto publicacion__texto--mini">

                        <h3 class="publicacion__titulo publicacion__titulo--mini">Titulo Publicacion</h3>

                        <p class="publicacion__resumen publicacion__resumen--mini">Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>                        

                        <div class="publicacion__meta publicacion__meta--mini">
                            <p class="publicacion__escritor publicacion__escritor--mini">Escrito por: <span>Usain Bolt</span> </p>
                            <p class="publicacion__fecha publicacion__fecha--mini">Fecha: <span>29/05/2022</span></p>
                        </div>

                        <a href="#" class="btn btn-primary publicacion__boton">Seguir Leyendo...</a>

                    </div>

                </div><!-- ./publicacion -->

                <div class="publicacion publicacion--mini">

                    <img class="publicacion__imagen publicacion__imagen--mini" src="/img/publicacion0.jpg" alt="imagen sobre la publicacion">

                    <div class="publicacion__texto publicacion__texto--mini">

                        <h3 class="publicacion__titulo publicacion__titulo--mini">Titulo Publicacion</h3>

                        <p class="publicacion__resumen publicacion__resumen--mini">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus molestias, modi, debitis excepturi eligendi consequuntur tempore similique quam est voluptate cum itaque...</p>                        

                        <div class="publicacion__meta publicacion__meta--mini">
                            <p class="publicacion__escritor publicacion__escritor--mini">Escrito por: <span>Usain Bolt</span> </p>
                            <p class="publicacion__fecha publicacion__fecha--mini">Fecha: <span>29/05/2022</span></p>
                        </div>

                        <a href="#" class="btn btn-primary publicacion__boton">Seguir Leyendo...</a>

                    </div>

                </div><!-- ./publicacion -->

                <div class="publicacion publicacion--mini">

                    <img class="publicacion__imagen publicacion__imagen--mini" src="/img/publicacion0.jpg" alt="imagen sobre la publicacion">

                    <div class="publicacion__texto publicacion__texto--mini">

                        <h3 class="publicacion__titulo publicacion__titulo--mini">Titulo Publicacion</h3>

                        <p class="publicacion__resumen publicacion__resumen--mini">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus molestias, modi, debitis excepturi eligendi consequuntur tempore similique quam est voluptate cum itaque...</p>                        

                        <div class="publicacion__meta publicacion__meta--mini">
                            <p class="publicacion__escritor publicacion__escritor--mini">Escrito por: <span>Usain Bolt</span> </p>
                            <p class="publicacion__fecha publicacion__fecha--mini">Fecha: <span>29/05/2022</span></p>
                        </div>

                        <a href="#" class="btn btn-primary publicacion__boton">Seguir Leyendo...</a>

                    </div>

                </div><!-- ./publicacion -->

            </div>
        </aside>
    </div>


</div>

@stop