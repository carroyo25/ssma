<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Documentario SSMA - Tarjetas TOP</title>
</head>
<body>
    <div class="modal modalInterno" id="modalWait">
        <div class="loader"></div>
    </div>
    <?php require 'views/header.php'; ?>
    <div id="wrap">
        <div class="page">
            <div class="cabeceraDoc">
                <div class="logo">
                    <img src="<?php echo constant('URL')?>public/img/logo.png" alt="">
                </div>
                <div class="titulo">
                    <p>REPORTE PRELIMINAR DE ACCIDENTE, INCIDENTE Y ENFERMEDAD OCUPACIONAL</p>
                </div>
                <div class="formato">
                    <p>PSPC-100-X-PR-006-FR-001</p>
                    <p>Revisión: 0</p>
                    <p>Emisión: 30/05/19</p>
                    <p>Página: 1 de 1</p>
                </div>
            </div>       
            <form method="POST" id="formIncidencia">
                <input type="text" name="ruta_foto" id="ruta_foto" class="oculto">
                <input type="file" id="image_file" name="image_file" multiple class="oculto" accept="image/jpg">
                <div class="manyInput">
                    <div class="flex2 divGray">
                        <label for="proyecto" class="fondoblanco">Proyecto / Sede : </label>
                        <select name="proyecto" id="proyecto" class="w75p">
                            <option value="-1" class="oculto">Seleccione Opción</option>
                            <option value="01">Compresion</option>
                            <option value="02">Blending</option>
                            <option value="03">Pucallpa</option>
                            <option value="04">Lurin</option>
                            <option value="05">Lima</option>
                        </select>
                    </div>
                    <div class="flex2 divGray">
                        <label for="cliente" class="fondoblanco">Cliente : </label>
                        <input type="text" name="cliente" id="cliente" class="w85p" >	
                    </div>
                </div>
                <div class="secction center fondoblanco">
                    <p>TIPIFICACIÓN DEL ACCIDENTE/INCIDENTE/ENFERMEDAD OCUPACIONAL</p>
                </div>
                <div>
                    <table class="tablaConBordesExternos w100p" >
                        <tbody>
                            <tr>
                                <td class="w20p center"><input type="checkbox" name="chktip01" id="chktip01"></td>
                                <td>Daño Material < 500 $</td>
                                <td class="w20p center"><input type="checkbox" name="chktip09" id="chktip09"></td>
                                <td>(F.A.C) Caso de Primeros Auxilios</td>
                            </tr>
                            <tr>
                                <td class="w20p center"><input type="checkbox" name="chktip02" id="chktip02"></td>
                                <td>Daño Material > 500 $</td>
                                <td class="w20p center"><input type="checkbox" name="chktip10" id="chktip10"></td>
                                <td>(M.T.O) Accidente Con Tratamiento Médico</td>
                            </tr>
                            <tr>
                                <td class="w20p center"><input type="checkbox" name="chktip03" id="chktip03"></td>
                                <td>Derrame de Hidrocarburos < 2 m3</td>
                                <td class="w20p center"><input type="checkbox" name="chktip11" id="chktip11"></td>
                                <td>(R.W.C) Accidente Con Trabajo Restringido</td>
                            </tr>
                            <tr>
                                <td class="w20p center"><input type="checkbox" name="chktip04" id="chktip04"></td>
                                <td>Derrame de Hidrocarburos > 2 m3</td>
                                <td class="w20p center"><input type="checkbox" name="chktip12" id="chktip12"></td>
                                <td>(L.T.I) Accidente Con Pérdida de Jornada</td>
                            </tr>
                            <tr>
                                <td class="w20p center"><input type="checkbox" name="chktip05" id="chktip05"></td>
                                <td>Accidente Vehicular con Herido</td>
                                <td class="w20p center"><input type="checkbox" name="chktip13" id="chktip13"></td>
                                <td>(F.T.L) Fatalidad</td>
                            </tr>
                            <tr>
                                <td class="w20p center"><input type="checkbox" name="chktip06" id="chktip06"></td>
                                <td>Accidente Vehicular sin Herido</td>
                                <td class="w20p center"><input type="checkbox" name="chktip14" id="chktip14"></td>
                                <td>Incidente</td>
                            </tr>
                            <tr>
                                <td class="w20p center"><input type="checkbox" name="chktip07" id="chktip07"></td>
                                <td>Accidente Vehicular < 500 $</td>
                                <td class="w20p center"><input type="checkbox" name="chktip15" id="chktip15"></td>
                                <td>(E.O)  Enfermedad Ocupacional</td>
                            </tr>
                            <tr>
                                <td class="w20p center"><input type="checkbox" name="chktip08" id="chktip08"></td>
                                <td>Accidente Vehicular > 500 $ </td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <span class="nota">* Los Accidentes Vehiculares con Herido deberán ser clasificados acorde de la gravedad del daño material ( $ ) y gravedad de la lesión (F.A.C, M.T.O, R.W.C, L.T.I, F.T.L)</span>
                </div>
                <div class="secction center fondoblanco">
                    <p>LUGAR Y HORA DEL ACCIDENTE/INCIDENTE/ENFERMEDAD OCUPACIONAL</p>
                    <input type="hidden" name="accidentado" id="accidentado">
                </div>
                <div class="manyInput">
                    <div class="flex3 divGray">
                        <label for="lugar" class="fondoblanco">Lugar : </label>
                        <input type="text" name="lugar" id="lugar" class="w85p">	
                    </div>
                    <div class="flex2 divGray">
                        <label for="fecha" class="fondoblanco">Fecha : </label>
                        <input type="date" name="fecha" id="fecha" value="<?php echo date("Y-m-d");?>" class="w50p">	
                    </div>
                    <div class="flex2 divGray">
                        <label for="hora" class="fondoblanco">Hora : </label>
                        <input type="time" name="hora" id="hora" value="<?php echo date("H:i");?>" class="w50p">	
                    </div>
                </div>
                <div class="secction center fondoblanco">
                    <p>DATOS DE LA PERSONA INVOLUCRADA EN EL ACCIDENTE/INCIDENTE/ENFERMEDAD OCUPACIONAL</p>
                </div>
                <div class="manyInput">
                    <div class="flex3 divGray">
                        <label for="persona" class="fondoblanco">NOMBRE DE LA PERSONA INVOLUCRADA:</label>
                        <input type="text" name="persona" id="persona"  class="w55p">	
                    </div>
                    <div class="flex2 divGray">
                        <label for="documento" class="fondoblanco">DNI/CE : </label>
                        <input type="text" name="documento" id="documento" class="w75p">	
                    </div>
                </div>
                <div class="manyInput">
                    <div class="divGray flex1">
                        <label for="sexo" class="fondoblanco">SEXO (F/ M): </label>
                        <select name="sexo" id="sexo">
                            <option value="MA">Masculino</option>
                            <option value="FE">Femenino</option>
                        </select>	
                    </div>
                    <div class="divGray flex1">
                        <label for="edad" class="fondoblanco"> EDAD: </label>
                        <input type="number" name="edad" id="edad" class="w30p" min="16" max="65">	
                    </div>
                    <div class="divGray">
                        <label for="seguro" class="fondoblanco"> CUENTA CON SEGURO (SI/NO) ESPECIFICAR:</label>
                        <input type="text" name="seguro" id="seguro" class="w35p">	
                    </div>
                </div>
                <div class="manyInput">
                    <div class="divGray flex1">
                        <label for="nacimiento" class="fondoblanco">LUGAR Y FECHA DE NACIMIENTO: </label>
                        <input type="text" name="nacimiento" id="nacimiento" class="w75p">
                    </div>
                </div>
                <div class="manyInput">
                    <div class="divGray flex1">
                        <label for="domicilio" class="fondoblanco">DOMICILIO: </label>
                        <input type="text" name="domicilio" id="domicilio" class="w80p">
                    </div>
                    <div class="divGray flex1">
                        <label for="civil" class="fondoblanco">ESTADO CIVIL: </label>
                        <select name="civil" id="civil">
                            <option value="CA">Casado</option>
                            <option value="CO">Coviviente</option>
                            <option value="DI">Divorciado</option>
                            <option value="SO">Soltero</option>
                            <option value="VI">Viudo</option>
                            <option value="OT">Otro</option>
                        </select>
                    </div>
                </div>
                <div class="manyInput">
                    <div class="divGray flex1">
                        <label for="dpto" class="fondoblanco">DEPARTAMENTO: </label>
                        <input type="text" name="dpto" id="dpto" class="w65p">
                    </div>
                    <div class="divGray flex1">
                        <label for="prov" class="fondoblanco">PROVINCIA: </label>
                        <input type="text" name="prov" id="prov" class="w70p">
                    </div>
                    <div class="divGray flex1">
                        <label for="dist" class="fondoblanco">DISTRITO: </label>
                        <input type="text" name="dist" id="dist" class="w75p">
                    </div>
                </div>
                <div class="manyInput">
                    <div class="divGray flex1">
                        <label for="cargo" class="fondoblanco">CARGO: </label>
                        <input type="text" name="cargo" id="cargo" class="w80p">
                    </div>
                    <div class="divGray flex1">
                        <label for="instruccion" class="fondoblanco">INSTRUCCIÓN: </label>
                        <input type="text" name="instruccion" id="instruccion" class="w80p">
                    </div>
                </div>
                <div class="secction center fondoblanco">
                    <p>DESCRIPCIÓN Y TOMA DE ACCIÓN</p>
                </div>
                <div class="secction fondoblanco">
                    <p>DESCRIPCIÓN DEL ACCIDENTE/INCIDENTE/ENFERMEDAD OCUPACIONAL</p>
                    <p>(Incluyendo nombres y cargos de las personas involucradas)</p>
                    <textarea name="descripcion" id="descripcion" rows="4"></textarea>
                    <p>ACCIONES INMEDIATAS DESPUES DEL ACCIDENTE/INCIDENTE/ENFERMEDAD OCUPACIONAL</p>
                    <p>(Atención médica, evacuación, reparación de daños materiales, acciones correctivas, etc)</p>
                    <textarea name="acciones" id="acciones" rows="4"></textarea>
                </div>
                <div class="manyInput">
                    <div class="flex1 divGray">
                        <label for="realizado" class="fondoblanco">Elaborado por : </label>
                        <input type="text" name="elaborado" id="elaborado" class="w80p" value="<?php echo $this->nombres;?>">	
                    </div>
                </div>
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
    <script src="<?php echo constant('URL');?>public/js/incidencias.js?v1.0.3"></script>
</body>
</html>