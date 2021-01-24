<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" type="image/png" href="<?php echo constant('URL')?>public/img/logo.png" />

    <title>Control Documentario SSMA - Panel Principal</title>
</head>
<body>
    <div class="modalInterno" id="modalReporte">
        <div id="reporte">
            <a href="#" id="closeReporte"><i class="far fa-window-close"></i></a>
            <h3>Reportes</h3>
            <hr>
            <div class="reporteMenu">
                <div><a href="#">Tarjetas Top</a></div>
                <div><a href="#">Inspección Gerencial</a></div>
                <div><a href="#">Suspeción de Trabajos</a></div>
                <div><a href="#">Auditoria PTAR</a></div>
                <div><a href="#">Inspección Planeada de Seguridad</a></div>
                <div><a href="#">Reporte de Incidencias</a></div>
                <div><a href="#">Inspección Planeada de Seguridad</a></div>
            </div>
        </div>
    </div>

    <?php require 'views/header.php'; ?>

    <div id="wrap-panel">
        <div class="main-options">
            <div class="options">
                <div class="menuItem" id="top">
                    <p><i class="fas fa-calendar-week"></i></p>
                    <a href="<?php echo constant('URL')?>top">Tarjetas Top</a>
                </div>
                <div class="menuItem" id="inspecciones">
                    <p><i class="fas fa-chalkboard-teacher"></i></p>    
                    <a href="<?php echo constant('URL')?>gerencial">Inspección Gerencial</a>
                </div>
                <div class="menuItem" id="auditoria">
                    <p><i class="fas fa-clipboard-list"></i></p>    
                    <a href="<?php echo constant('URL')?>ptar">Auditoria PTAR</a>
                </div>
                <div class="menuItem" id="incidencias">
                    <p><i class="fas fa-car-crash"></i></p>
                    <a href="<?php echo constant('URL')?>incidencias">Reporte de Indicencias</a>
                </div>
                <div class="menuItem" id="suspencion">
                    <p><i class="fas fa-cloud-sun-rain"></i></p>
                    <a href="<?php echo constant('URL')?>suspencion">Suspensión de Trabajos</a>
                </div>
                <div class="menuItem" id="seguridad">
                    <p><i class="fas fa-inbox"></i></p>
                    <a href="<?php echo constant('URL')?>seguridad">Inspección Planeada de Seguridad</a>
                </div>
                <div class="menuItem" id="capacitacion">
                    <p><i class="fas fa-swatchbook"></i></p>
                    <a href="<?php echo constant('URL')?>capacitacion">Capacitaciones</a>
                </div>
                <div class="menuItem" id="juegos">
                    <p><i class="fas fa-gamepad"></i></p>
                    <a href="<?php echo constant('URL')?>juegos">Juegos</a>
                </div>
            </div>
            <div class="infos">
                <div class="divInfo">
                    <h1>Tarjetas Top (<?php echo $this->mes?>)</h1>
                    <hr>
                    <canvas id="Tops" width="220px" height="100%"></canvas>
                </div>
                <div class="divInfo">
                    <h1>Trivia</h1>
                    <hr>
                    <canvas id="Trivia" width="220px" height="100%"></canvas>
                </div>
                <div class="divInfo">
                    <h1>Top trivia</h1>
                    <hr>
                    <canvas id="TopTrivia" width="220px" height="100%"></canvas>
                </div>
                <div class="divInfo">
                    <h1>Inspecciones</h1>
                    <hr>
                    <canvas id="Inspecciones" width="220px" height="100%"></canvas>
                </div>
            </div>
            
        </div>

        <?php if($this->nivel == '2') {
            require 'views/floatingAdmin.php';
        }else{
            require 'views/floating.php';
        } ?>
    </div>
    <script src="<?php echo constant('URL');?>public/js/jquery.js"></script>
    <script src="<?php echo constant('URL');?>public/js/main.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.min.js"></script>
    <script>
        var ctx = document.getElementById('Tops');
        var myChart = new Chart(ctx, {
            type: 'horizontalBar',
            data: {
                labels: [<?php 
                    foreach($this->sedes as $rs) {
                        echo "'".$rs."',";
                    }
                 ?>],
                datasets: [{
                    label: '# Tarjetas Top',
                    data: [
                        <?php 
                        foreach($this->valores as $rs) {
                            echo $rs.",";
                        }
                    ?> 
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options:{
                scales:{
                    xAxes:[{
                        ticks:{
                            beginAtZero:true
                        }
                    }]
                }
            }
        });

        var ctx = document.getElementById('Trivia');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Correctas', 'Incorrectas'],
                datasets: [{
                    label: 'Trivia Personal',
                    data: [ 3, 5],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
        });

        var ctx = document.getElementById('TopTrivia');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Helena', 'Dante', 'Cesar', 'Jaime', 'Nilson'],
                datasets: [{
                    label: 'Mejores jugadores trivia',
                    data: [12, 19, 3, 5, 25],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',

                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var ctx = document.getElementById('Inspecciones');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
                datasets: [{
                    label: 'Inspecciones Anuales',
                    data: [2, 19, 23, 55, 25, 30],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>