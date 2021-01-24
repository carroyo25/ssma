<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Control Documentario SSMA - Trivia</title>
</head>
<body>
    <?php require 'views/header.php'; ?>

    <div id="wrap">
        <div class="trivia w70p">
            <div class="pregunta">
              <h1>Escriba la pregunta</h1>
              <input type="text" name="preguntaTexto" id="preguntaTexto">
            </div>
            <div class="respuesta">
                <h2>Indique la respuesta correcta</h2>
                <input type="text" name="respuestaTexto" id="respuestaTexto">
            </div>
        </div>
        <div class="buttonsPage">
            <button type="submit" id="btnRegister"> <i class="far fa-calendar-check"></i> Registrar</button>
            <button type="reset" id="btnCancel"><i class="fas fa-ban"></i> Cancelar</button>	
        </div>   
    </div>

    <div class="floatingActionButton">
        <a href="<?php echo constant('URL')?>panel"><i class="fas fa-home"></i></a>
    </div>

    <script src="<?php echo constant('URL');?>public/js/jquery.js"></script>
    <script src="<?php echo constant('URL');?>public/js/funciones.js"></script>
    <script src="<?php echo constant('URL');?>public/js/preguntas.js"></script>
</body>
</html>