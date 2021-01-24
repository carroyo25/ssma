<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Documentario SSMA - Capacitaciones</title>
</head>
<body>
    <?php require 'views/header.php'; ?>
    <div class="modalInterno">
        <a href="" id="closeModal">X</a>
		<div class="preview">
			<video src="" width=100%  height=100% controlslist="nodownload" controls>
				Lo sentimos. Este vídeo no puede ser reproducido en tu navegador.<br> 
			</video>
		</div>
    </div>
    <div id="wrapTotal">
        <div class="pageCapas">
            <div class="capas">
                <h3>COVID 19</h3>
                <ul>
                    <li><a href="COVIDV1.mp4"><img src="<?php echo constant('URL');?>public/capasimg/COVID 19 M1.jpg" alt=""></a></li>
                    <li><a href="COVIDV2.mp4"><img src="<?php echo constant('URL');?>public/capasimg/COVID 19 M2.jpg" alt=""></a></li>
                    <li><a href="COVIDV3.mp4"><img src="<?php echo constant('URL');?>public/capasimg/COVID 19 M3.jpg" alt=""></a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="floatingActionButton">
        <a href="<?php echo constant('URL')?>panel"><i class="fas fa-home"></i></a>
    </div>

    <div class="mensaje msj_info">
        <span></span>
    </div>

    <script src="<?php echo constant('URL');?>public/js/jquery.js"></script>
    <script src="<?php echo constant('URL');?>public/js/funciones.js"></script>
    <script src="<?php echo constant('URL');?>public/js/capacitacion.js"></script>
</body>
</html>