<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/png" href="<?php echo constant('URL')?>public/img/logo.png" />

    <title>Control Documentario SSMA</title>
</head>
<body>
    <?php require 'views/header.php'; ?>

    <div class="modal">
        <div class="login">
            <div class="logo">
                <img src="<?php echo constant('URL')?>public/img/woman.png">
            </div>
            <form action="<?php echo constant('URL')?>main/loginUser" method="POST" autocomplete>
                <div class="formlogin">
                    <label for="usuario"><i class="fas fa-user"></i> Usuario</label>
                    <input type="text" class="dataEntry dataEntryWhite" name="usuario" required>

                    <label for="usuario"><i class="fas fa-key"></i> Clave</label>
                    <input type="password" class="dataEntry dataEntryWhite" name="clave" required>

                    <button class="buttonLogin">Ingresar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>