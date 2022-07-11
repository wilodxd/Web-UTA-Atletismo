@extends('layout')

@section('content')


<main class="seccion-perfil">
    <section class="py-5">        
        <div class="container-fluid">
            <div class="row ">

                <!--Informacion personal-->
                <div class="col-12 col-lg-6 col-xl-4 py-2">
                    <button class="btn btn-light btn-block" type="button" data-toggle="collapse" data-target="#datosPersonales">
                        Datos personales
                    </button>

                    <div class="collapse show" id="datosPersonales">
                        <div class="card flex-row flex-wrap flex-md-nowrap align-items-center border border-dark" style="min-height: 300px;">
                            <div class="card-header border-0 ">
                                <img src="img/1-usain-bolt-medallas.jpg" alt="imagen_usuario" class="img-fluid img-responsive">
                                <!-- mostrara el nombre completo -->
                                <h2 class="card-title">{{Auth::user()->nombre}} {{Auth::user()->apellido_1}} {{Auth::user()->apellido_2}}</h2>
                            </div>
                            <div class="card-block px-2 ">                                
                                <p>Rut: {{Auth::user()->rut}}</p>
                                <p>Carrera: {{Auth::user()->carrera}}</p>
                                <!-- <p>Numero de contacto: 56 9 111111</p> -->
                                <p>Correo electronico: {{Auth::user()->correo}}</p>
                            </div>                            
                        </div>
                    </div>                
                                        
                </div>

                <!--Registro de progesos del profesor-->
                <div class="col-12 col-lg-6 col-xl-4 py-2" >
                    <button class="btn btn-light btn-block" type="button" data-toggle="collapse" data-target="#tablaProgresoClub">
                        Progresos del club
                    </button>

                    <div class="collapse show" id="tablaProgresoClub">
                        <div class="table-responsive border border-dark" style="height: 300px;">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Fecha</th>                                        
                                        <th scope="col">Tiempo</th>
                                        <th scope="col">Distancia</th>
                                        <th scope="col">Comentario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>28/05/2022</td>                                        
                                        <td>20 s</td>
                                        <td>100 m</td>
                                        <td>Fue un buen dia!!</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>28/05/2022</td>                                        
                                        <td>20 s</td>
                                        <td>100 m</td>
                                        <td>Fue un buen dia!!</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>28/05/2022</td>                                        
                                        <td>20 s</td>
                                        <td>100 m</td>
                                        <td>Fue un buen dia!!</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>28/05/2022</td>                                        
                                        <td>20 s</td>
                                        <td>100 m</td>
                                        <td>Fue un buen dia!!</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>28/05/2022</td>                                        
                                        <td>20 s</td>
                                        <td>100 m</td>
                                        <td>Fue un buen dia!!</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>28/05/2022</td>                                        
                                        <td>20 s</td>
                                        <td>100 m</td>
                                        <td>Fue un buen dia!!</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>28/05/2022</td>                                        
                                        <td>20 s</td>
                                        <td>100 m</td>
                                        <td>Fue un buen dia!!</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                                                        
                        </div> 
                    </div>
                                        
                </div>

                <!--Registro de progesos del usuario-->
                <div class="col-12 col-lg-6 col-xl-4 py-2">
                    <button class="btn btn-light btn-block" type="button" data-toggle="collapse" data-target="#tablaProgresoPersonal">
                        Progresos personales
                    </button>
                    
                    <!-- Tabla progresos -->
                    <div class="collapse show" id="tablaProgresoPersonal">
                        
                        <div class="table-responsive border border-dark" style="height: 300px;">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Fecha</th>                                            
                                        <th scope="col">Tiempo</th>
                                        <th scope="col">Distancia</th>
                                        <th scope="col">Comentario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($progresos as $progreso)
                                        <tr>
                                            <th scope="row">{{$progreso->id}}</th>
                                            <td>{{$progreso->created_at}}</td>                                            
                                            <td>{{$progreso->tiempo}} s</td>
                                            <td>{{$progreso->distancia}} m</td>
                                            <td>{{$progreso->comentario}}</td>
                                        </tr>
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
                            <p>Distancia total: 100 km</p>
                            <p>Velocidad promedio: 3 m/s</p>
                            <p>Mejor velocidad: 5 m/s (05/06)</p>                              
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
                            <p>Distancia total: 400 km</p>
                            <p>Velocidad promedio: 3.5 m/s</p>
                            <p>Mejor velocidad: 6 m/s (15/06)</p>                              
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
        console.log(distancia+'/'+tiempo+'='+this.velocidad);
        return this;
    }

    // Lista de progreso
    var progresos = [];

    // Agregar progreso
    <?php
        foreach ($progresos as $progreso) {
            echo "progresos.push(new Progreso(".$progreso->id.", '".$progreso->created_at."', ".$progreso->distancia.", '".$progreso->tiempo.", ".$progreso->comentario."'));";
        }
    ?>

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
    function getProgresosRango(fechaInicio, fechaFin){
        var progresosRango = [];
        for (var i = 0; i < progresos.length; i++) {
            if (progresos[i].fecha.getDate() >= fechaInicio.getDate() && progresos[i].fecha.getMonth() >= fechaInicio.getMonth() && progresos[i].fecha.getFullYear() >= fechaInicio.getFullYear() && progresos[i].fecha.getDate() <= fechaFin.getDate() && progresos[i].fecha.getMonth() <= fechaFin.getMonth() && progresos[i].fecha.getFullYear() <= fechaFin.getFullYear()) {
                progresosRango.push(progresos[i]);
            }
        }
        return progresosRango;
    }

</script>

<script>
    // Resumen del día
    
    // fecha actual
    var fechaActualObj = new Date();
    var fechaActual = fechaActualObj.getFullYear() + "-" + (fechaActualObj.getMonth() + 1) + "-" + fechaActualObj.getDate();

    // lista progresos del día
    var listaProgresosDia = getProgresosFecha(fechaActualObj);

    // datos grafico
    graficoVelocidad_label = []
    graficoVelocidad_data = []

    // resumen del dia
    resumenDia_distanciaTotal = 0;
    resumenDia_velocidadPromedioSuma = 0;
    resumenDia_velocidadPromedio = 0;
    resumenDia_numeroRegistros = 0;
    
    resumenDia_Progreso_mejorVelocidad = progresos[0];


    // 
    listaProgresosDia.forEach(progreso => {
        hora = progreso.fecha.getHours() + ':' + progreso.fecha.getMinutes();
        graficoVelocidad_label.push(hora);
        graficoVelocidad_data.push(progreso.velocidad);
        resumenDia_distanciaTotal+=progreso.distancia;
        resumenDia_velocidadPromedioSuma+=progreso.velocidad;
        resumenDia_numeroRegistros++;
        if( progreso.velocidad > resumenDia_Progreso_mejorVelocidad.velocidad ){
            resumenDia_Progreso_mejorVelocidad = progreso;
        }
    });

    // calcular promedio
    resumenDia_velocidadPromedio = Math.round(resumenDia_velocidadPromedioSuma/resumenDia_numeroRegistros*100)/100;

    
    // actualizar datos diarios
    function actualizarResumenDiario(){
        document.getElementById('resumen-diario-distancia').textContent = resumenDia_distanciaTotal;
        document.getElementById('resumen-diario-velocidad').textContent = resumenDia_velocidadPromedio;
        document.getElementById('resumen-diario-mejor-velocidad').textContent = resumenDia_Progreso_mejorVelocidad.velocidad;
        var hora = resumenDia_Progreso_mejorVelocidad.fecha.getHours() + '-' + resumenDia_Progreso_mejorVelocidad.fecha.getMinutes();
        document.getElementById('resumen-diario-mejor-velocidad-hora').textContent = hora;
    }
    actualizarResumenDiario();



    // Grafico de velocidad
    let ctx = document.getElementById('grafico1').getContext('2d');
    const myChart = new Chart(ctx, {

        type: 'line',
        data: {
            labels: graficoVelocidad_label,
            datasets: [{
                label: 'Velocidad en m/s',
                data: graficoVelocidad_data,
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
    
    ctx = document.getElementById('grafico2').getContext('2d');
    const myChart2 = new Chart(ctx, {

        type: 'line',
        data: {
            labels: ['1/6', '2/6', '3/6', '4/6', '5/6', '6/6', '7/6'],
            datasets: [{
                label: 'Velocidad en m/s',
                data: [3, 5, 3.8, 2.5, 4, 2.1, 3.5],
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
            labels: ['1/6', '2/6', '3/6', '4/6', '5/6', '6/6', '7/6'],
            datasets: [{
                label: 'Distancia en km',
                data: [13, 12, 12.2, 12.89, 14, 12, 10],
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
    
    ctx = document.getElementById('grafico4').getContext('2d');
    const myChart4 = new Chart(ctx, {

        type: 'line',
        data: {
            labels: ['1/6', '2/6', '3/6', '4/6', '5/6', '6/6', '7/6', '8/6', '9/6', '10/6', '11/6', '12/6', '13/6', '14/6', '15/6', '16/6', '17/6', '18/6', '19/6', '20/6', '21/6', '22/6', '23/6', '24/6', '25/6', '26/6', '27/6', '28/6', '29/6', '30/6'],
            datasets: [{
                label: 'Velocidad en m/s',
                data: [3, 5, 3.8, 2.5, 4, 2.1, 3.5, 3, 5, 3.8, 2.5, 4, 2.1, 3.5, 3, 5, 3.8, 2.5, 4, 2.1, 3.5, 3, 5, 3.8, 2.5, 4, 2.1, 3.5, 3, 5, 3.8, 2.5, 4, 2.1],
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
            labels: ['1/6', '2/6', '3/6', '4/6', '5/6', '6/6', '7/6', '8/6', '9/6', '10/6', '11/6', '12/6', '13/6', '14/6', '15/6', '16/6', '17/6', '18/6', '19/6', '20/6', '21/6', '22/6', '23/6', '24/6', '25/6', '26/6', '27/6', '28/6', '29/6', '30/6'],
            datasets: [{
                label: '# of Votes',
                data: [13, 12, 12.2, 12.89, 14, 12, 13, 12, 12.2, 12.89, 14, 12, 13, 12, 12.2, 12.89, 14, 12, 13, 12, 12.2, 12.89, 14, 12, 13, 12, 12.2, 12.89, 14, 12, 13, 12, 12.2, 12.89, 14, 12],
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


@stop