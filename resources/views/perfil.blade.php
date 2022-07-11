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

                        <div class="btn-responsive">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarProceso">Agregar</button>
                        </div>

                    </div>

                    <!-- Agregar nuevo progreso -->
                    <form class="modal fade" id="agregarProceso">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ingresar registro</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>                                                
                                    <div class="form-group">
                                        <label class="col-form-label" for="fecha">Fecha:</label>
                                        <input type="date" name="fecha" id="fecha">
                                    </div>        

                                    <div class="form-group">
                                        <label for="horas">Tiempo:</label>                                        
                                        <div class="form-group--horizontal">
                                            
                                            <div class="form-group form-group--horizontal">
                                                <input type="number" class="form-control" id="horas" placeholder="0">
                                                <label for="horas" class="col-form-label">H</label>
                                            </div>
                                            <div class="form-group form-group--horizontal">
                                                <input type="number" class="form-control" id="minutos" placeholder="0">
                                                <label for="minutos">M</label>
                                            </div>
                                            <div class="form-group form-group--horizontal">
                                                <input type="number" class="form-control" id="segundos" placeholder="0">
                                                <label for="segundos">S</label>
                                            </div>
                                            
                                        </div>
                                    </div>   

                                    <div class="form-group">
                                        <label for="kilometros" class="col-form-label">Distancia:</label>
                                        <div class="form-group--horizontal">
                                            
                                            <div class="form-group form-group--horizontal">
                                                <input type="number" class="form-control" id="kilometros" placeholder="0">
                                                <label for="kilometros" class="col-form-label">Km</label>
                                            </div>
                                            <div class="form-group form-group--horizontal">
                                                <input type="number" class="form-control" id="metros" placeholder="0">
                                                <label for="metros">m</label>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="comentario" class="col-form-label">Comentario:</label>
                                        <textarea class="form-control" id="comentario"></textarea>
                                    </div>                                                  

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Guardar</button>
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
                            <p>Distancia total: 9 km</p>
                            <p>Velocidad promedio: 3 m/s</p>
                            <p>Mejor velocidad: 5 m/s (9:30)</p>                              
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

<script>
    let ctx = document.getElementById('grafico1').getContext('2d');
    const myChart = new Chart(ctx, {

        type: 'line',
        data: {
            labels: ['16:20', '16:22', '16:24', '16:25', '16:26', '16:28'],
            datasets: [{
                label: 'Velocidad en m/s',
                data: [3, 5, 3.8, 2.5, 4, 2.1],
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
</script>


@stop