<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/png" href="<?php echo constant('URL')?>public/img/logo.png" />

    <title>Control Documentario SSMA - Inspección Planeada de Seguridad</title>
</head>
<body>
    <?php require 'views/header.php'; ?>
    <div id="wrap">
        <div class="page">
            <div class="cabeceraDoc">
                <div class="logo">
                    <img src="<?php echo constant('URL')?>public/img/logo.png" alt="">
                </div>
                <div class="titulo">
                    <p>INSPECCIÓN PLANEADA DE SEGURIDAD</p>
                </div>
                <div class="formato">
                    <p>PSPC-110-X-PR-001-FR-007</p>
                    <p>Revisión: 0</p>
                    <p>Emisión: 17/05/2019</p>
                    <p>Página: 1 de 1</p>
                </div>
            </div>
            <form method="POST" id="formSeguridad">
                <input type="text" name="ruta_foto" id="ruta_foto" class="oculto">
                <input type="file" id="image_file" name="image_file" multiple class="oculto" accept="image/jpg">
                <div class="manyInput">
                    <div class="flex1">
                        <label for="sede">Tipo de Inspección: </label>
                        <input type="radio" name="tipo" id="informal" value="1"><label for="informal"> Informal</label>
                        <input type="radio" name="tipo" id="planeada" value="1"><label for="planeada"> Planeada</label>	
                    </div>
                    <div class="flex1">
                        <label for="sede">Sede/Proyecto: </label>
                        <select name="sede" id="sede" class="w75p">
                            <option value="-1" class="oculto">Seleccione Opción</option>
                            <option value="01">Compresion</option>
                            <option value="02">Blending</option>
                            <option value="03">Pucallpa</option>
                            <option value="04">Lurin</option>
                            <option value="05">Lima</option>
                        </select>	
                    </div>
                </div>
                <div class="manyInput">
                    <div class="flex2">
                        <label for="sede">Lugar de Inspección: </label>
                        <input type="text" name="lugar" id="lugar" class="w75p">	
                    </div>
                    <div class="flex1">
                        <label for="sede">Fecha: </label>
                        <input type="date" name="fecha" id="fecha" class="w40p">	
                    </div>
                </div>
                <div class="manyInput">
                    <div class="flex1">
                        <label for="sede">Inspeccionado por  : </label>
                        <input type="text" name="inspeccionado" id="inspeccionado" class="w75p">	
                    </div>
                    <div class="flex1">
                        <label for="sede">Firma : </label>
                        <input type="text" name="firma1" id="firma1" class="w75p">	
                    </div>
                </div>
                <div class="manyInput">
                    <div class="flex1">
                        <label for="firma1">Responsable del área:</label>
                        <input type="text" name="responsable" id="responsable" class="w70p">	
                    </div>
                    <div class="flex1">
                        <label for="firma2">Firma : </label>
                        <input type="text" name="firma2" id="firma2" class="w75p">	
                    </div>
                </div>
                <table class="tablaConBordes w100p" id="tablaClasificacion">
                    <thead>
                        <tr>
                            <th rowspan="2" class="w40p">CONDICIÓN O PRACTICA SUBESTANDAR</th>
                            <th colspan="3">Clasificación</th>
                            <th rowspan="2" class="w10p">Acción Correctiva</th>
                            <th rowspan="2" class="w10p">Responsable</th>
                            <th rowspan="2" class="w5p">Fecha de cumplimiento</th>
                            <th rowspan="2" class="w10p">Seguimiento</th>
                        </tr>
                        <tr>
                            <th>A</th>
                            <th>B</th>
                            <th>C</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for($x=1;$x<=12;$x++){
                        ?>
                            <tr>
                                <td>
                                    <input type="text" class="w100p">
                                </td>
                                <td class="center">
                                    <input type="radio" name="<?php echo "cla".$x ?>" value="1">
                                </td>
                                <td class="center">
                                    <input type="radio" name="<?php echo "cla".$x ?>" value="2">
                                </td>
                                <td class="center">
                                    <input type="radio" name="<?php echo "cla".$x ?>" value="3">
                                </td>
                                <td>
                                    <input type="text" class="w100p">
                                </td>
                                <td>
                                    <input type="text" class="w100p">
                                </td>
                                <td>
                                    <input type="date" class="w100p">
                                </td>
                                <td>
                                    <input type="text" class="w100p">
                                </td>
                            </tr>
                        <?php        
                            }
                        ?>
                    </tbody>
                </table>
                </br>
                <table class="tablaConBordes w100p">
                    <thead>
                        <tr>
                            <th>Clasificación de las condiciones subestandar:</th>
                            <th>OBSERVACIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w50p">(A) Mayor: Se considera que el peligro encontrado, podría ocasionar daños mayores, o tiene un potencial de pérdida alto, por lo tanto existe un plazo máximo de levantamiento de la observación de 24 horas</td>
                            <td><textarea name="observacion0" id="observacion0" cols="30" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td class="w50p">(B) Serio: Se considera que el peligro encontrado, podría ocasionar daños regulares, o tiene un potencial de pérdida medio, por lo tanto existe un plazo máximo de levantamiento de la observación encontrada de 72 horas o 3 días.</td>
                            <td><textarea name="observacion1" id="observacion2" cols="30" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td class="w50p">(C) Menor: Se considera que el peligro encontrado, podría ocasionar daños menores, o tiene un potencial de pérdida bajo, por lo tanto existe un plazo máximo de levantamiento de la observación encontrada de 14 días.</td>
                            <td><textarea name="observacion2" id="observacion2" cols="30" rows="4"></textarea></td>
                        </tr>
                    </tbody>
                </table>
                <div class="center flexColumn">
                    <button id="btnFoto" class="botonUpload">Insertar Foto</button>
                    <img src="<?php echo constant('URL')?>public/img/noimagen.jpg" alt="" id="img_preview" class="conBorde imgPrevia">
                </div>
                <div class="buttonsPage">
                    <button type="submit" id="btnRegister"> <i class="far fa-calendar-check"></i> Registrar</button>
                    <button type="reset" id="btnCancel"><i class="fas fa-ban"></i> Cancelar</button>	
                </div>
            </form>
        </div>
    </div>

    <div class="floatingActionButton">
        <a href="<?php echo constant('URL')?>panel"><i class="fas fa-home"></i></a>
    </div>

    <div class="mensaje msj_info">
        <span>Datos ingresados correctamente</span>
    </div>

    <script src="<?php echo constant('URL');?>public/js/jquery.js"></script>
    <script src="<?php echo constant('URL');?>public/js/funciones.js"></script>
    <script src="<?php echo constant('URL');?>public/js/seguridad.js?v1.0.3"></script>
</body>
</html>