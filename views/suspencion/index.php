<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Documentario SSMA - Tarjetas TOP</title>
</head>
<body>
    <?php require 'views/header.php'; ?>
    <div class="leyenda">
        <ul>
            <li><br>
                <p><h3>Potencial de perdida</h3></p>
            </li>
            <li><br>
                <p><strong>Alto: </strong> considera que el peligro encontrado, podría </br> ocasionar daños mayores, o tiene un </br> potencial de pérdida alto.</p>
            </li>
            <li><br>
                <p><strong>Medio:</strong>  Se considera que el peligro encontrado, podría </br> ocasionar daños regulares, o tiene un </br> potencial de pérdida medio.</p>
            </li>
            <li><br>
                <p><strong>Bajo:</strong> Se considera que el peligro encontrado, podría </br> ocasionar daños menores, o </br> tiene un potencial de pérdida bajo.</p>
            </li>
        </ul>
    </div>
    <div id="wrap">
        <div class="page">
            <div class="cabeceraDoc">
                <div class="logo">
                    <img src="<?php echo constant('URL')?>public/img/logo.png" alt="">
                </div>
                <div class="titulo">
                    <p>SUSPENCIÓN DE TRABAJOS</p>
                </div>
                <div class="formato">
                    <p>PSPC-110-X-PR-014-FR-002</p>
                    <p>Revisión: 0</p>
                    <p>Emisión: 28/06/19</p>
                    <p>Página: 1 de 1</p>
                </div>
            </div>
            <form method="POST" id="formSuspencion">
                    <div class="manyInput">
                        <div class="flex2">
                            <label for="sede">Sede/Proyecto : </label>
                            <input type="text" name="sede" id="sede" class="w85p">	
                        </div>
                        <div class="divGray">
                            <label for="lugar">Lugar : </label>
                            <input type="text" name="lugar" id="lugar">	
                        </div>
                    </div>
                    <div class="manyInput">
                        <div class="flex2 divGray">
                            <label for="frente">Frente de Trabajo / Área / Fase : </label>
                            <input type="text" name="frente" id="frente" class="w75p">	
                        </div>
                    </div>
                    <div class="manyInput">
                        <div class="flex2 divGray">
                            <label for="responsable">Responsable Frente/Área de Trabajo : </label>
                            <input type="text" name="responsable" id="responsable" class="w65p">	
                        </div>
                        <div class="divGray">
                            <label for="lugar">Cargo : </label>
                            <input type="text" name="cargo" id="cargo">	
                        </div>
                    </div>
                    <div class="manyInput">
                        <div class="divGray flex1">
                            <label for="responsable">Fecha : </label>
                            <input type="date" name="fecha" id="fecha" value="<?php echo date("Y-m-d");?>">	
                        </div>
                        <div class="divGray flex1">
                            <label for="lugar">Hora : </label>
                            <input type="time" name="hora" id="hora" value="<?php echo date("H:i");?>">	
                        </div>
                    </div>
                    <div class="secction">
                        <p>CRITERIOS  REFERENCIALES ASOCIADOS A LA SUSPENSIÓN DE TRABAJOS (MARCAR CON "X"):</p>
                        <div>
                            <div>
                                <input type="checkbox" name="chkOpt1" id="chkOpt1">
                                <label for="chkOpt1"> CONDUCCIÓN SEGURA </label>
                            </div>
                            <div>
                                <input type="checkbox" name="chkOpt2" id="chkOpt2">
                                <label for="chkOpt2">  EXCAVACIONES</label>	
                            </div>
                        </div>
                        <div>
                            <div>
                                <input type="checkbox" name="chkOpt3" id="chkOpt3">
                                <label for="chkOpt3">  PERMISO DE TRABAJO Y AST </label>
                            </div>
                            <div>
                                <input type="checkbox" name="chkOpt4" id="chkOpt4">
                                <label for="chkOpt4">  TRABAJOS EN ALTURA</label>	
                            </div>
                        </div>
                        <div>
                            <div>
                                <input type="checkbox" name="chkOpt5" id="chkOpt5">
                                <label for="chkOpt5">  ESPACIOS CONFINADOS </label>
                            </div>
                            <div>
                                <input type="checkbox" name="chkOpt6" id="chkOpt6">
                                <label for="chkOpt6">  TRABAJOS EN CALIENTE</label>	
                            </div>
                        </div>
                        <div>
                            <div>
                                <input type="checkbox" name="chkOpt7" id="chkOpt7">
                                <label for="chkOpt7">  ENERGÍAS PELIGROSAS </label>
                            </div>
                            <div>
                                <input type="checkbox" name="chkOpt8" id="chkOpt8">
                                <label for="chkOpt8">  OPERACIONES DE IZAJE</label>	
                            </div>
                        </div>
                    </div>
                    <div class="manyInputVerticalEntry">
                        <label for="otros">OTROS (ESPECIFICAR):</label>
                        <input type="text" name="otros" id="otros">
                    </div>
                    <div class="secction">
                        <p>DESCRIPCIÓN DE LO OCURRIDO:</p>
                        <textarea name="ocurrido" id="ocurrido" rows="4"></textarea>
                    </div>
                    <div class="secction">
                        <p>ACCIONES CORRECTIVAS INMEDIATAS TOMADAS:</p>
                        <textarea name="acciones" id="acciones" rows="4"></textarea>
                    </div>
                    <div class="secction">
                        <p>DATOS:</p>
                    </div>
                    <div class="manyInput">
                        <div class="flex1">
                            <label class="fondoblanco" for="frente">Nivel de riesgo: </label>	
                        </div>
                        <div class="flex1 multiInlineCheck w30p">
                            <label for="riesgoalto" class="fondorojo">ALTO</label>
                            <input type="radio" name="riesgo" id="riesgoalto" value="1">
                            <label for="riesgomedio" class="fondoamarillo">MEDIO</label>
                            <input type="radio" name="riesgo" id="riesgomedio" value="1">
                            <label for="riesgobajo" class="fondoverde">BAJO</label>
                            <input type="radio" name="riesgo" id="riesgobajo" value="1">
                        </div>
                        
                        <div>
                            <label class="fondoblanco" for="duracion">Tiempo de Duración de la suspención: </label>
                            <input type="text" name="duracion" id="duracion" class="w40p">	
                        </div>
                    </div>
                    <div class="manyInput">
                        <div class="flex2">
                            <label class="fondoblanco" for="frente">Nombres del Jefe Directo / Cargo: </label>
                            <input type="text" name="jefe" id="jefe" class="w75p">	
                        </div>
                    </div>
                    <div class="manyInput">
                        <div class="flex2">
                            <label class="fondoblanco" for="frente">N° personas en el frente / Área de Trabajo: </label>
                            <input type="text" name="personas" id="personas">	
                        </div>
                    </div>
                    <div class="secction">
                        <p>OBSERVACIONES:</p>
                        <textarea name="observaciones" id="observaciones" rows="4"></textarea>
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
    <script src="<?php echo constant('URL');?>public/js/suspencion.js"></script>
</body>
</html>