@extends('layout')

@section('content')


<main class="seccion-perfil">
    <section class="py-5">        
        <div class="container-fluid">
            <div class="row ">

                <!--Informacion personal-->
                <div class="col-12 col-xl-6 py-2">
                    <button class="btn btn-light btn-block" type="button" data-toggle="collapse" data-target="#datosPersonales">
                        Datos personales
                    </button>

                    <div class="collapse show" id="datosPersonales">
                        <div class="card flex-row flex-wrap flex-md-nowrap align-items-center border border-dark" style="min-height: 300px;">
                            <div class="card-header border-0 ">
                                <img src="{{ asset('storage/' . $imagenPerfil) }}" alt="imagen_usuario" class="foto-perfil">
                                <!-- mostrara el nombre completo -->
                                <h2 class="card-title">{{Auth::user()->nombre}} {{Auth::user()->apellido_1}} {{Auth::user()->apellido_2}}</h2>
                            </div>
                            <div class="card-block px-2 ">                                
                                <p>Rut: {{Auth::user()->rut}}</p>
                                <p>Carrera: {{Auth::user()->carrera}}</p>
                                <p>Correo electronico: {{Auth::user()->correo}}</p>
                                <p>Fecha de nacimiento: {{Auth::user()->fecha_nacimiento}}</p>
                                <p>Fecha de ingreso: {{Auth::user()->fecha_ingreso}}</p>
                                

                            </div>                            
                        </div>
                    </div>                
                                        
                </div>

                <!--Registro de progesos del usuario-->
                <div class="col-12 col-xl-6 py-2">
                    <button class="btn btn-light btn-block" type="button" data-toggle="collapse" data-target="#tablaProgresoPersonal">
                        Progresos personales
                    </button>
                    
                    <!-- Tabla progresos -->
                    <div class="collapse show" id="tablaProgresoPersonal">
                        
                        <div class="table-responsive border border-dark" style="height: 300px;">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr class="tr-progresos">
                                        <th scope="col">#</th>
                                        <th scope="col">Fecha</th>                                            
                                        <th scope="col">Tiempo</th>
                                        <th scope="col">Distancia</th>
                                        <th scope="col">Comentario</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1 @endphp
                                    @foreach($progresos as $progreso)
                                        <tr class="tr-progresos">
                                            <th scope="row">{{$i}}</th>
                                            <td>{{$progreso->created_at}}</td>                                            
                                            <td>{{$progreso->tiempo}} s</td>
                                            <td>{{$progreso->distancia}} m</td>
                                            <td>{{$progreso->comentario}}</td>
                                            <td><button type="button" class="btn btn-danger m-0" data-toggle="modal" data-target="#eliminarProgreso"
                                        onClick="rellenarFormularioEliminarProgreso('<?php echo $progreso->id ?>')">Eliminar</button></td>
                                        </tr>
                                        @php $i += 1 @endphp
                                    @endforeach

                                </tbody>
                            </table>
                            
                        </div>  

                        <div class="btn-responsive">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarProceso">Agregar</button>
                        </div>

                    </div>

                    <!-- Agregar nuevo progreso -->
                    <form class="modal fade" id="agregarProceso" method="POST" action="/perfil/registrar-progreso">
                        @csrf
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Ingresar registro</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                                    
                                    
                                    <div class="form-group">
                                        <label class="col-form-label" for="fecha">Fecha:</label>
                                        <input type="date" name="fecha" id="fecha">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="hora">Hora:</label>
                                        <input type="time" name="hora" id="hora">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="horas">Tiempo:</label>                                        
                                        <div class="form-group--horizontal">
                                            
                                            <div class="form-group form-group--horizontal">
                                                <input type="number" class="form-control" id="horas" placeholder="0" name="horas">
                                                <label for="horas" class="col-form-label">H</label>
                                            </div>
                                            <div class="form-group form-group--horizontal">
                                                <input type="number" class="form-control" id="minutos" placeholder="0" name="minutos">
                                                <label for="minutos">M</label>
                                            </div>
                                            <div class="form-group form-group--horizontal">
                                                <input type="number" class="form-control" id="segundos" placeholder="0" step="0.01" name="segundos">
                                                <label for="segundos">S</label>
                                            </div>
                                            
                                        </div>
                                    </div>   

                                    <div class="form-group">
                                        <label for="kilometros" class="col-form-label">Distancia:</label>
                                        <div class="form-group--horizontal">
                                            
                                            <div class="form-group form-group--horizontal">
                                                <input type="number" class="form-control" id="kilometros" placeholder="0" name="kilometros">
                                                <label for="kilometros" class="col-form-label">Km</label>
                                            </div>
                                            <div class="form-group form-group--horizontal">
                                                <input type="number" class="form-control" id="metros" placeholder="0" name="metros">
                                                <label for="metros">m</label>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="comentario" class="col-form-label">Comentario:</label>
                                        <textarea class="form-control" id="comentario" name="comentario"></textarea>
                                    </div>                                                  

                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </div>
                    
                    </form>
                    <!-- Eliminar-->
                    <form class="modal fade" id="eliminarProgreso" method="POST" action="/perfil/eliminar-progreso">
                        @csrf
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Eliminar progreso</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>¿Está seguro de eliminar el progreso?</p>
                                    <p>fecha: <span id="eliminar-progreso-fecha">a</span></p>
                                    <p>tiempo: <span id="eliminar-progreso-tiempo">a</span></p>
                                    <p>distancia: <span id="eliminar-progreso-distancia">a</span></p>
                                    <p>comentario: <span id="eliminar-progreso-comentario">a</span></p>
                                    <input type="hidden" name="id" id="id">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>   
    </section>

    <!-- Graficos -->
    <section class="pb-5">
        <div class="container-fluid">
            <div class="row">
                <!--Resumen diario-->
                <div class="col-12 col-xl-6">
                    <button class="btn btn-light btn-block" type="button" data-toggle="collapse" data-target="#resumenDia">
                        Resumen del dia
                    </button>
                    <div class="row collapse show border border-dark p-5 m-2" id="resumenDia" style="min-height: 300px;">
                        <div class="col-12 col-md-6 border border-dark">
                            <p>Distancia total: <span id="resumen-diario-distancia">9</span> metros</p>
                            <p>Velocidad promedio: <span id="resumen-diario-velocidad">9</span> m/s</p>
                            <p>Mejor velocidad: <span id="resumen-diario-mejor-velocidad">9</span> m/s (<span id="resumen-diario-mejor-velocidad-hora">9</span>)</p>                              
                        </div>
                        <div class="grafico col-12 col-md-6">
                            <canvas id="grafico1" width="20px" height="20px"></canvas>
                        </div>
                    </div>
                </div>
                <!--Resumen de la semana-->
                <div class="col-12 col-xl-6">
                    <button class="btn btn-light btn-block" type="button" data-toggle="collapse" data-target="#resumenSemana">
                        Resumen de la semana
                    </button>
                    <div class="row collapse show border border-dark p-5 m-2" id="resumenSemana" style="min-height: 300px;">
                        <div class="col-12 border border-dark">
                            <p>Distancia total: <span id="resumen-semana-distancia">9</span> metros</p>
                            <p>Velocidad promedio: <span id="resumen-semana-velocidad">9</span> m/s</p>
                            <p>Mejor velocidad: <span id="resumen-semana-mejor-velocidad">9</span> m/s (<span id="resumen-semana-mejor-velocidad-hora">9</span>)</p>                              
                        </div>
                        <div class="grafico col-12 col-md-6">
                            <canvas id="grafico2" width="20px" height="20px"></canvas>
                        </div>
                        <div class="grafico col-12 col-md-6">
                            <canvas id="grafico3" width="20px" height="20px"></canvas>
                        </div>                            
                    </div>
                </div>

                <!--Resumen del mes-->
                <div class="col-12">
                    <button class="btn btn-light btn-block" type="button" data-toggle="collapse" data-target="#resumenMes">
                        Resumen del mes
                    </button>
                    <div class="row collapse show border border-dark p-5 m-2" id="resumenMes" style="min-height: 300px;">
                        <div class="col-12 border border-dark">
                            <p>Distancia total: <span id="resumen-mes-distancia">9</span> metros</p>
                            <p>Velocidad promedio: <span id="resumen-mes-velocidad">9</span> m/s</p>
                            <p>Mejor velocidad: <span id="resumen-mes-mejor-velocidad">9</span> m/s (<span id="resumen-mes-mejor-velocidad-hora">9</span>)</p>                              
                        </div>
                        <div class="grafico col-12 col-xl-6">
                            <canvas id="grafico4" width="20px" height="20px"></canvas>
                        </div>
                        <div class="grafico col-12 col-xl-6">
                            <canvas id="grafico5" width="20px" height="20px"></canvas>
                        </div>                            
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.js"></script>

<!-- progresos -->
<script>

     // formato fechaHora = 2022-07-11 17:20:00
     function fechaToDate(fechaHora){
        var fecha = new Date(fechaHora);
        return fecha;
    }
    // Crear objeto progreso
    function Progreso(id, fecha, distancia, tiempo, comentario) {
        this.id = id;
        this.fecha = fechaToDate(fecha);
        this.tiempo = tiempo;
        this.distancia = distancia;
        this.comentario = comentario;
        this.velocidad = Math.round((parseFloat(distancia) / parseFloat(tiempo))*10)/10;
        return this;
    }

    // Lista de progreso
    var progresos = [];

    // Agregar progreso
    <?php
        foreach ($progresos as $progreso) {
            echo "progresos.push(new Progreso('".$progreso->id."', '".$progreso->created_at."', '".$progreso->distancia."', '".$progreso->tiempo."', '".$progreso->comentario."'));";
        }
    ?>

    // buscar progreso por id, retorna un progreso 
    function buscarProgreso(id){
        for (var i = 0; i < progresos.length; i++) {
            if (progresos[i].id == id) {
                return progresos[i];
            }
        }
        return null;
    }

    // Crear lista con progresos de una fecha
    function getProgresosFecha(fecha){
        
        var progresosFecha = [];
        for (var i = 0; i < progresos.length; i++) {
            if (progresos[i].fecha.getDate() == fecha.getDate() && progresos[i].fecha.getMonth() == fecha.getMonth() && progresos[i].fecha.getFullYear() == fecha.getFullYear()) {
                progresosFecha.push(progresos[i]);
            }
        }
        return progresosFecha;
    }  

    // Crear lista con progresos por rango de fechas
    function getProgresosFechaRango(fechaInicio, fechaFin){
        var progresosRango = [];
        for (var i = 0; i < progresos.length; i++) {
            if (progresos[i].fecha.getDate() >= fechaInicio.getDate() && progresos[i].fecha.getMonth() >= fechaInicio.getMonth() && progresos[i].fecha.getFullYear() >= fechaInicio.getFullYear() && progresos[i].fecha.getDate() <= fechaFin.getDate() && progresos[i].fecha.getMonth() <= fechaFin.getMonth() && progresos[i].fecha.getFullYear() <= fechaFin.getFullYear()) {
                progresosRango.push(progresos[i]);
            }
        }
        return progresosRango;
    }

    // retorna un arreglo con todas las fechas de la semana
    function getFechaSemana(fecha){
        var fechaSemana = [];
        for (var i = 0; i < 7; i++) {
            fechaSemana.push(new Date(fecha.getFullYear(), fecha.getMonth(), fecha.getDate() + i));
        }
        return fechaSemana;
    }

    function getFechaMes(fecha){
        var fechaMes = [];
        for (var i = 0; i < 30; i++) {
            fechaMes.push(new Date(fecha.getFullYear(), fecha.getMonth(), fecha.getDate() + i));
        }
        return fechaMes;
    }

    // Esta funcion retorna la distancia total, velocidad promedio y el progreso con mejor velocidad de una fecha, además, retorna datos para el gráfico de velocidad
    function getResumenDelDia(fecha){
        // fecha actual
        var  fechaActualObj = new Date(fecha);
        var  fechaActual = fechaActualObj.getFullYear() + "-" + (fechaActualObj.getMonth() + 1) + "-" + fechaActualObj.getDate();

        // lista progresos del día
        var  listaProgresosDia = getProgresosFecha(fechaActualObj);

        if( listaProgresosDia.length == 0 ){
            return [0, 0, 0, 0, 0];
        }

        // datos grafico
        var graficoVelocidad_label = []
        var graficoVelocidad_data = []

        // resumen del dia
        var resumenDia_distanciaTotal = 0;
        var resumenDia_velocidadPromedioSuma = 0;
        var resumenDia_velocidadPromedio = 0;
        var resumenDia_numeroRegistros = 0;
        
        var resumenDia_Progreso_mejorVelocidad = progresos[0];


        // 
        listaProgresosDia.forEach(progreso => {
            hora = progreso.fecha.getHours() + ':' + progreso.fecha.getMinutes();
            graficoVelocidad_label.push(hora);
            graficoVelocidad_data.push(progreso.velocidad);
            resumenDia_distanciaTotal+= parseFloat(progreso.distancia);
            resumenDia_velocidadPromedioSuma+= parseFloat(progreso.velocidad);
            resumenDia_numeroRegistros++;
            if( progreso.velocidad > resumenDia_Progreso_mejorVelocidad.velocidad ){
                resumenDia_Progreso_mejorVelocidad = progreso;
            }
        });

        // calcular promedio
        var resumenDia_velocidadPromedio = Math.round(resumenDia_velocidadPromedioSuma/resumenDia_numeroRegistros*100)/100;        

        return [resumenDia_distanciaTotal, resumenDia_velocidadPromedio, resumenDia_Progreso_mejorVelocidad, graficoVelocidad_label, graficoVelocidad_data];
    }

    function getResumenDeLaSemana(fecha){
        // 
        var fechaSemana = getFechaSemana(fecha);

        // resumen de la semana
        var resumenSemana_distanciaTotal = 0;
        var resumenSemana_velocidadPromedioSuma = 0;
        var resumenSemana_velocidadPromedio = 0;
        var resumenSemana_numeroRegistros = 0;

        // datos grafico velocidad
        var graficoVelocidad_label = []
        var graficoVelocidad_data = []

        // datos grafico distancia
        var graficoDistancia_label = []
        var graficoDistancia_data = []
        
        var resumenSemana_Progreso_mejorVelocidad = progresos[0];

        //
        
        fechaSemana.forEach(fecha => {

            var resumenDia = getResumenDelDia(fecha);
            
            if(resumenDia != [0, 0, 0, 0, 0]){
                resumenSemana_distanciaTotal+=resumenDia[0];
                resumenSemana_velocidadPromedioSuma+=resumenDia[1];
                resumenSemana_numeroRegistros++;
                graficoVelocidad_label.push(fecha.getDate() + '/' + (fecha.getMonth() + 1));
                graficoVelocidad_data.push(resumenDia[1]);
                if( resumenDia[2].velocidad > resumenSemana_Progreso_mejorVelocidad.velocidad ){
                    resumenSemana_Progreso_mejorVelocidad = resumenDia[2];
                }
                graficoDistancia_label.push(fecha.getDate() + '/' + (fecha.getMonth() + 1));
                graficoDistancia_data.push(resumenDia[0]);
            }

        });

        // calcular promedio
        resumenSemana_velocidadPromedio = Math.round(resumenSemana_velocidadPromedioSuma/resumenSemana_numeroRegistros*100)/100;

        return [resumenSemana_distanciaTotal, resumenSemana_velocidadPromedio, resumenSemana_Progreso_mejorVelocidad, graficoVelocidad_label, graficoVelocidad_data, graficoDistancia_label, graficoDistancia_data];
    }

    function getResumenDelMes(fecha){
        // 
        var fechaMes = getFechaMes(fecha);

        // resumen del mes
        var resumenMes_distanciaTotal = 0;
        var resumenMes_velocidadPromedioSuma = 0;
        var resumenMes_velocidadPromedio = 0;
        var resumenMes_numeroRegistros = 0;

        // datos grafico velocidad
        var graficoVelocidad_label = []
        var graficoVelocidad_data = []

        // datos grafico distancia
        var graficoDistancia_label = []
        var graficoDistancia_data = []
        
        var resumenMes_Progreso_mejorVelocidad = progresos[0];

        //
        
        fechaMes.forEach(fecha => {

            var resumenDia = getResumenDelDia(fecha);
            
            if(resumenDia != [0, 0, 0, 0, 0]){
                resumenMes_distanciaTotal+=resumenDia[0];
                resumenMes_velocidadPromedioSuma+=resumenDia[1];
                resumenMes_numeroRegistros++;
                graficoVelocidad_label.push(fecha.getDate() + '/' + (fecha.getMonth() + 1));
                graficoVelocidad_data.push(resumenDia[1]);
                if( resumenDia[2].velocidad > resumenMes_Progreso_mejorVelocidad.velocidad ){
                    resumenMes_Progreso_mejorVelocidad = resumenDia[2];
                }
                graficoDistancia_label.push(fecha.getDate() + '/' + (fecha.getMonth() + 1));
                graficoDistancia_data.push(resumenDia[0]);
            }

        });

        // calcular
        resumenMes_velocidadPromedio = Math.round(resumenMes_velocidadPromedioSuma/resumenMes_numeroRegistros*100)/100;

        return [resumenMes_distanciaTotal, resumenMes_velocidadPromedio, resumenMes_Progreso_mejorVelocidad, graficoVelocidad_label, graficoVelocidad_data, graficoDistancia_label, graficoDistancia_data];

    }


    // actualizar datos diarios
    function actualizarResumenDiario(){
        document.getElementById('resumen-diario-distancia').textContent = resumenDia_distanciaTotal;
        document.getElementById('resumen-diario-velocidad').textContent = resumenDia_velocidadPromedio;
        document.getElementById('resumen-diario-mejor-velocidad').textContent = resumenDia_Progreso_mejorVelocidad.velocidad;
        var hora = resumenDia_Progreso_mejorVelocidad.fecha.getHours() + ':' + resumenDia_Progreso_mejorVelocidad.fecha.getMinutes();
        document.getElementById('resumen-diario-mejor-velocidad-hora').textContent = hora;
    }

    // actualizar datos semana
    function actualizarResumenSemana(){
        document.getElementById('resumen-semana-distancia').textContent = resumenSemana_distanciaTotal;
        document.getElementById('resumen-semana-velocidad').textContent = resumenSemana_velocidadPromedio;
        document.getElementById('resumen-semana-mejor-velocidad').textContent = resumenSemana_Progreso_mejorVelocidad.velocidad;
        var hora = resumenSemana_Progreso_mejorVelocidad.fecha.getHours() + ':' + resumenSemana_Progreso_mejorVelocidad.fecha.getMinutes();
        document.getElementById('resumen-semana-mejor-velocidad-hora').textContent = hora;
    }

</script>

<script>
    
    // Resumen del día
    resumenDia = getResumenDelDia(new Date());

    // distribuir datos
    resumenDia_distanciaTotal = resumenDia[0];
    resumenDia_velocidadPromedio = resumenDia[1];
    resumenDia_Progreso_mejorVelocidad = resumenDia[2];
    grafico1Velocidad_label = resumenDia[3];
    grafico1Velocidad_data = resumenDia[4];

    actualizarResumenDiario();

    // Grafico de velocidad
    let ctx = document.getElementById('grafico1').getContext('2d');
    const myChart = new Chart(ctx, {

        type: 'line',
        data: {
            labels: grafico1Velocidad_label,
            datasets: [{
                label: 'Velocidad en m/s',
                data: grafico1Velocidad_data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            elements:{
                line:{
                    tension: 0.2
                },
                point:{
                    radius: 8
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
    // Resumen de la semana
    resumenSemana = getResumenDeLaSemana(new Date());

    resumenSemana_distanciaTotal = resumenSemana[0];
    resumenSemana_velocidadPromedio = resumenSemana[1];
    resumenSemana_Progreso_mejorVelocidad = resumenSemana[2];
    grafico2Velocidad_label = resumenSemana[3];
    grafico2Velocidad_data = resumenSemana[4];
    grafico3Distancia_label = resumenSemana[5];
    grafico3Distancia_data = resumenSemana[6];
    
    actualizarResumenSemana();

    // Grafico de velocidad
    ctx = document.getElementById('grafico2').getContext('2d');
    const myChart2 = new Chart(ctx, {

        type: 'line',
        data: {
            labels: grafico2Velocidad_label,
            datasets: [{
                label: 'Velocidad en m/s',
                data: grafico2Velocidad_data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            elements:{
                line:{
                    tension: 0.2
                },
                point:{
                    radius: 8
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
    ctx = document.getElementById('grafico3').getContext('2d');
    const myChart3 = new Chart(ctx, {

        type: 'line',
        data: {
            labels: grafico3Distancia_label,
            datasets: [{
                label: 'Distancia en km',
                data: grafico3Distancia_data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            elements:{
                line:{
                    tension: 0.2
                },
                point:{
                    radius: 8
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
    // Resumen del mes
    resumenMes = getResumenDelMes(new Date());

    resumenMes_distanciaTotal = resumenMes[0];
    resumenMes_velocidadPromedio = resumenMes[1];
    resumenMes_Progreso_mejorVelocidad = resumenMes[2];
    grafico4Velocidad_label = resumenMes[3];
    grafico4Velocidad_data = resumenMes[4];
    grafico5Distancia_label = resumenMes[5];
    grafico5Distancia_data = resumenMes[6];


    ctx = document.getElementById('grafico4').getContext('2d');
    const myChart4 = new Chart(ctx, {

        type: 'line',
        data: {
            labels: grafico4Velocidad_label,
            datasets: [{
                label: 'Velocidad en m/s',
                data: grafico4Velocidad_data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            elements:{
                line:{
                    tension: 0.2
                },
                point:{
                    radius: 8
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
    ctx = document.getElementById('grafico5').getContext('2d');
    const myChart5 = new Chart(ctx, {

        type: 'line',
        data: {
            labels: grafico5Distancia_label,
            datasets: [{
                label: '# of Votes',
                data: grafico5Distancia_data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            elements:{
                line:{
                    tension: 0.2
                },
                point:{
                    radius: 8
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });




</script>

<script>
    function setFechaToday(){
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(dd<10) {
            dd='0'+dd
        } 
        if(mm<10) {
            mm='0'+mm
        } 
        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("fecha").value = today;
    }
    setFechaToday();

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    function setTimeActually(){
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        m = checkTime(m);
        document.getElementById("hora").value = h+":"+m;
    }
    
    setTimeActually();


</script>

<script>
    // rellenar formulario eliminar
    function rellenarFormularioEliminarProgreso(id) {
        // buscar progreso
        var progreso = buscarProgreso(id);
        console.log(progreso);
        
        // cambiar id
        document.getElementById("id").value = progreso.id;
        // obtener fecha de date
        fecha = progreso.fecha;
        var dd = fecha.getDate();
        var mm = fecha.getMonth()+1; //January is 0!
        var yyyy = fecha.getFullYear();
        if(dd<10) {
            dd='0'+dd
        }
        if(mm<10) {
            mm='0'+mm
        }
        fecha = yyyy+'-'+mm+'-'+dd;
        document.getElementById("eliminar-progreso-fecha").innerHTML = fecha;

        // modificar span #eliminar-progreso-hora
        document.getElementById("eliminar-progreso-tiempo").innerHTML = progreso.tiempo;

        // modificar span #eliminar-progreso-distancia
        document.getElementById("eliminar-progreso-distancia").innerHTML = progreso.distancia;

        // modificar span #eliminar-progreso-comentario
        document.getElementById("eliminar-progreso-comentario").innerHTML = progreso.comentario;

        
        

    }
</script>

@stop