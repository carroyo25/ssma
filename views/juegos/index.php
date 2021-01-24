<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/png" href="<?php echo constant('URL')?>public/img/logo.png" />

    <title>Control Documentario SSMA - Juegos</title>
</head>
<body>
    <?php require 'views/header.php'; ?>

    <div id="wrap">
        
        <div class="info_time">
            <p class="tiempo">Tiempo : <span>15</span></p>
        </div>
        <div class="info_score oculto">
            <p class="puntaje">Puntaje : <span>00</span></p>
        </div>
        
        <div class="question w90p">
            <div class="pregunta">
               <h1 data-codigo="<?php echo $this->pregunta->codigo ?>"><?php echo $this->pregunta->texto ?></h1>
               <span class="oculto" id="idus"><?php echo $this->usuario; ?></span>
            </div>
        <div class="respuestas">
            <?php 
                include_once "models/anwers.php";

                foreach($this->respuestas as $row){
                    $resp = new Respuesta();
                    $resp = $row;
            ?>
                <button id="<?php echo $resp->codigo; ?>"><?php echo $resp->respuesta; ?></button>
            <?php
                }    
            ?>
        </div>
        <div class="descripgame">
            <h3>Trivia</h3>
            <span>Selecciona la respuesta correcta, tienes 15 segundos para intentarlo</span>
        </div>
        </div>   
    </div>

    <div class="floatingActionButton">
        <a href="<?php echo constant('URL')?>panel"><i class="fas fa-home"></i></a>
    </div>

    <script src="<?php echo constant('URL');?>public/js/jquery.js"></script>
    <script src="<?php echo constant('URL');?>public/js/funciones.js"></script>
    <script src="<?php echo constant('URL');?>public/js/juegos.js"></script>
</body>
</html>