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
    <div class="leyenda">
        <ul>
            <li>
                <p><h3>Definiciones de la observación</h3></p>
            </li>
            <li><br>
                <h4>Condiciones inseguras (DS 005-2012)</h4>
                <p>Es toda condición en el entorno del trabajo </br> que puede causar un accidente.</p>
            </li>
            <li><br>
                <h4>Actos inseguros (DS 005-2012)</h4>
                <p>Es toda acción o práctica incorrecta ejecutada </br> por el trabajador que puede causar un accidente.</p>
            </li>
            <li><br>
                <h4>Acto seguro</h4>
                <p>Acto o practica que cumple con el procedimiento.</p>
            </li>
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
                    <p>TOP</p>
                    <p>Tarjeta de Observación Preventiva</p>
                </div>
                <div class="formato">
                    <p>PSPC-110-X-PR-002-FR-001</p>
                    <p>Revisión: 0</p>
                    <p>Emisión: 31/05/19</p>
                    <p>Página: 1 de 1</p>
                </div>
            </div>
            <form method="POST" id="formTop">
                    <input type="text" name="ruta_foto" id="ruta_foto" class="oculto">
                    <input type="file" id="image_file" name="image_file" multiple class="oculto" accept="image/jpg">
                    <input type="hidden" name="usuario" id="usuario" value="<?php echo $this->usuario;?>">
                    <div class="inputentry mb15px">
                            <label for="sede" class="obligatorio">Obra/Sede :</label>
                            <select name="sltSede" id="sltSede" class="w95p">
                                <option value="-1" class="oculto">Seleccione Opción</option>
                                <option value="01">Compresion</option>
                                <option value="02">Blending</option>
                                <option value="03">Pucallpa</option>
                                <option value="04">Lurin</option>
                                <option value="05">Lima</option>
                            </select>	
                    </div>
                    <div class="inputentry mb15px">
                        <label for="lugar" class="obligatorio">Lugar :</label>
                        <input type="text" name="txtLugar" id="txtLugar" class="w95p" >	
                    </div>
                    <div class="inputentry mb15px">
                        <label for="txtRepor" class="obligatorio">Reportado por (solo un nombre y un apellido):</label>
                        <input type="text" id="txtRepor" name="txtRepor" class="w95p" value="<?php echo $this->nombres;?>" required>	
                    </div>
                    <div class="inputentry mb15px">
                        <label for="area" class="obligatorio">Area:</label>
                        <select name="sltArea" id="sltArea" class="w95p">
                            <?php echo $this->areas; ?>
                        </select>	
                    </div>
                    <div class="inputentry mb15px">
                        <label for="area" class="obligatorio">Ubicación:</label>
                        <select name="sltUbicacion" id="sltUbicacion" class="w95p">
                            <option value="-1" class="oculto">Seleccione Opción</option>
                        </select>	
                    </div>
                    <div class="inputentry mb15px">
                        <label for="txtFecha" class="obligatorio">Fecha :</label>
                        <input type="date" name="txtFecha" id="txtFecha" value="<?php echo date("Y-m-d");?>" 
                            min="<?php echo date("Y-m-d",strtotime(date("Y-m-d")." - 2 days"));?>" 
                            max="<?php echo date("Y-m-d") ; ?>" 
                            onkeydown="return false">	
                    </div>
                    <div class="inputentry mb15px">
                        <label for="obser" class="obligatorio">Elija según su observación :</label>

                        <div class="radioentry" id="rgObser">
                            <input type="radio" name="rbObser" id="rbObser01" value="01">
                            <label for="rbObser01">Actos inseguros</label>
                            <input type="radio" name="rbObser" id="rbObser02" value="02">
                            <label for="rbObser02">Condiciones inseguras</label>
                            <input type="radio" name="rbObser" id="rbObser03" value="03">
                            <label for="rbObser03">Acto Seguro</label>
                        </div>
                    </div>
                    
                    <div class="inputentry oculto mb15px" id="divActIns">
                        <label class="obligatorio">Actos Sub estándar</label>
                        <div class="radioentry" id="rgacsues">
                            <input type="radio" name="rbacsues" id="rbacsues01" value="01">
                            <label for="rbacsues01">Operar equipos sin autorización</label>
                            <input type="radio" name="rbacsues" id="rbacsues02" value="02">
                            <label for="rbacsues02">Operar equipos a velocidad incorrecta</label>
                            <input type="radio" name="rbacsues" id="rbacsues03" value="03">
                            <label for="rbacsues03">Deficiencia en el aislamiento y bloqueo</label>
                            <input type="radio" name="rbacsues" id="rbacsues04" value="04">
                            <label for="rbacsues04">Inutilizar / retirar dispositivos o controles de seguridad</label>
                            <input type="radio" name="rbacsues" id="rbacsues05" value="05">
                            <label for="rbacsues05">Utilizar equipos / herramientas defectuosos</label>
                            <input type="radio" name="rbacsues" id="rbacsues06" value="06">
                            <label for="rbacsues06">Almacenamiento inadecuado</label>
                            <input type="radio" name="rbacsues" id="rbacsues07" value="07">
                            <label for="rbacsues07">Levantamiento incorrecto de equipos, materiales o herramientas</label>
                            <input type="radio" name="rbacsues" id="rbacsues08" value="08">
                            <label for="rbacsues08">Posición inadecuada para la tarea</label>
                            <input type="radio" name="rbacsues" id="rbacsues09" value="09">
                            <label for="rbacsues09">Acerca del EPP (detallar)</label>
                            <input type="radio" name="rbacsues" id="rbacsues10" value="10">
                            <label for="rbacsues10">Uso incorrecto de equipos / materiales</label>
                            <input type="radio" name="rbacsues" id="rbacsues11" value="11">
                            <label for="rbacsues11">Falla de advertir o comunicar</label>
                            <input type="radio" name="rbacsues" id="rbacsues12" value="12">
                            <label for="rbacsues12">Falla de identificar o reconocer</label>
                            <input type="radio" name="rbacsues" id="rbacsues13" value="13">
                            <label for="rbacsues13">Desvío / Incumplimiento del procedimiento</label>
                            <input type="radio" name="rbacsues" id="rbacsues14" value="14">
                            <label for="rbacsues14">Permisos / Check list (no realizado/incompleto)</label>
                            <input type="radio" name="rbacsues" id="rbacsues15" value="15">
                            <label for="rbacsues15">AR/ER (no realizado o incompleto)</label>
                            <input type="radio" name="rbacsues" id="rbacsues16" value="16">
                            <label for="rbacsues16">Transitar bajo la carga suspendida</label>
                            <input type="radio" name="rbacsues" id="rbacsues17" value="17">
                            <label for="rbacsues17">Transitar cerca a vehículos en movimiento</label>
                            <input type="radio" name="rbacsues" id="rbacsues18" value="18">
                            <label for="rbacsues18">OTROS</label>
                        </div>
                    </div>
                    
                    <div class="inputentry oculto mb15px" id="divConIns">
                        <label for="conin" class="obligatorio">Condición Sub estándar</label>
                        <div class="radioentry" id="rgcosues">
                            <input type="radio" name="rbcosues" id="rbcosues01" value="01">
                            <label for="rbcosues01">Guardas o barreras inadecuadas</label>
                            <input type="radio" name="rbcosues" id="rbcosues02" value="02">
                            <label for="rbcosues02">Herramientas, equipos o materiales defectuosos</label>
                            <input type="radio" name="rbcosues" id="rbcosues03" value="03">
                            <label for="rbcosues03">Área congestionada - accionar restringido</label>
                            <input type="radio" name="rbcosues" id="rbcosues04" value="04">
                            <label for="rbcosues04">Advertencia - Señalética faltante / incorrecta</label>
                            <input type="radio" name="rbcosues" id="rbcosues05" value="05">
                            <label for="rbcosues05">Peligros de incendio y explosión</label>
                            <input type="radio" name="rbcosues" id="rbcosues06" value="06">
                            <label for="rbcosues06">Desorden / Desaseo</label>
                            <input type="radio" name="rbcosues" id="rbcosues07" value="07">
                            <label for="rbcosues07">Exposición a ruido</label>
                            <input type="radio" name="rbcosues" id="rbcosues08" value="08">
                            <label for="rbcosues08">Exposición a la radiación</label>
                            <input type="radio" name="rbcosues" id="rbcosues09" value="09">
                            <label for="rbcosues09">Temperaturas extremas</label>
                            <input type="radio" name="rbcosues" id="rbcosues10" value="10">
                            <label for="rbcosues10">Iluminación inadecuada</label></br>
                            <input type="radio" name="rbcosues" id="rbcosues11" value="11">
                            <label for="rbcosues11">Ventilación inadecuada</label>
                            <input type="radio" name="rbcosues" id="rbcosues12" value="12">
                            <label for="rbcosues12">Condiciones atmosféricas / ambientales peligrosas</label>
                            <input type="radio" name="rbcosues" id="rbcosues13" value="13">
                            <label for="rbcosues13">EPP incorrectos o deficientes</label>
                            <input type="radio" name="rbcosues" id="rbcosues14" value="14">
                            <label for="rbcosues14">Accesos deficientes / incompletos</label>
                            <input type="radio" name="rbcosues" id="rbcosues15" value="15">
                            <label for="rbcosues15">Estructuras incompletas / mal ubicadas</label>
                            <input type="radio" name="rbcosues" id="rbcosues16" value="16">
                            <label for="rbcosues16">Desvío / Incumplimiento del procedimiento</label>
                            <input type="radio" name="rbcosues" id="rbcosues17" value="17">
                            <label for="rbcosues17">OTROS</label>
                        </div>
                    </div>
                    
                    <div class="inputentry oculto mb15px" id="divActSeg">
                        <label class="obligatorio">Actos Seguros :</label>
                        <div class="radioentry" id="rgactseg">
                            <input type="radio" name="rbactseg" id="rbactseg01" value="01">
                            <label for="rbactseg01">Trabaja de acuerdo al procedimiento</label>
                            <input type="radio" name="rbactseg" id="rbactseg02" value="02">
                            <label for="rbactseg02">Usar sus EPPs correctamente</label>
                            <input type="radio" name="rbactseg" id="rbactseg03" value="03">
                            <label for="rbactseg03">Mantiene su área de trabajo limpia y ordenada</label>
                            <input type="radio" name="rbactseg" id="rbactseg04" value="04">
                            <label for="rbactseg04">Operar equipos de manera adecuada</label>
                            <input type="radio" name="rbactseg" id="rbactseg05" value="05">
                            <label for="rbactseg05">Uso de herramientas inspeccionadas y en buen estado</label>
                            <input type="radio" name="rbactseg" id="rbactseg06" value="06">
                            <label for="rbactseg06">Carga adecuada</label>
                            <input type="radio" name="rbactseg" id="rbactseg07" value="07">
                            <label for="rbactseg07">Posición adecuada para la tarea</label>
                            <input type="radio" name="rbactseg" id="rbactseg08" value="08">
                            <label for="rbactseg08">OTROS</label>
                        </div>
                    </div>

                    <div class="inputentry oculto mb15px" id="divOtros">
                        <label for="txtOtros" class="obligatorio">Especificar en caso de OTROS:</label>	
                        <input type="text" name="txtOtros" id="txtOtros" class="w95p" >
                    </div>
                    
                    <div class="inputentry oculto mb15px" id="divRelac">
                        <label for="relac" class="obligatorio">Relacionado con :</label>
                        <div class="radioentry" id="rgrelac">
                            <input type="radio" name="rbrelac" id="rbrelac01" value="01">
                            <label for="rbrelac01">Trabajos en altura</label>
                            <input type="radio" name="rbrelac" id="rbrelac02" value="02">
                            <label for="rbrelac02">Andamio</label>
                            <input type="radio" name="rbrelac" id="rbrelac03" value="03">
                            <label for="rbrelac03">Trabajos en Caliente</label>
                            <input type="radio" name="rbrelac" id="rbrelac04" value="04">
                            <label for="rbrelac04">Trabajos electricos</label>
                            <input type="radio" name="rbrelac" id="rbrelac05" value="05">
                            <label for="rbrelac05">Equipos móviles</label>
                            <input type="radio" name="rbrelac" id="rbrelac06" value="06">
                            <label for="rbrelac06">Ergonomía</label>
                            <input type="radio" name="rbrelac" id="rbrelac07" value="07">
                            <label for="rbrelac07">Espacio confinado</label>
                            <input type="radio" name="rbrelac" id="rbrelac08" value="08">
                            <label for="rbrelac08">Excavación</label>
                            <input type="radio" name="rbrelac" id="rbrelac09" value="09">
                            <label for="rbrelac09">Guardas</label>
                            <input type="radio" name="rbrelac" id="rbrelac10" value="10">
                            <label for="rbrelac10">Izaje</label>
                            <input type="radio" name="rbrelac" id="rbrelac11" value="11">
                            <label for="rbrelac11">Epp</label>
                            <input type="radio" name="rbrelac" id="rbrelac12" value="12">
                            <label for="rbrelac12">Tormentas Eléctricas</label>
                            <input type="radio" name="rbrelac" id="rbrelac13" value="13">
                            <label for="rbrelac13">Materiales peligrosos</label>
                            <input type="radio" name="rbrelac" id="rbrelac14" value="14">
                            <label for="rbrelac14">Gestión de residuos</label>
                            <input type="radio" name="rbrelac" id="rbrelac15" value="15">
                            <label for="rbrelac15">Aislamiento de energía</label>
                            <input type="radio" name="rbrelac" id="rbrelac16" value="16">
                            <label for="rbrelac16">Herramientas</label>
                            <input type="radio" name="rbrelac" id="rbrelac17" value="17">
                            <label for="rbrelac17">No aplica</label>
                        </div>
                    </div>

                    <div class="inputentry oculto mb15px" id="divTipEpp">
                        <label class="obligatorio">Tipo de EPP :</label>
                        <div class="radioentry" id="rgtipepp">
                            <input type="radio" name="rbtipepp" id="rbtipepp01" value="01">
                            <label for="rbtipepp01">Guante</label>
                            <input type="radio" name="rbtipepp" id="rbtipepp02" value="02">
                            <label for="rbtipepp02">Lentes</label>
                            <input type="radio" name="rbtipepp" id="rbtipepp03" value="03">
                            <label for="rbtipepp03">Respirador</label>
                            <input type="radio" name="rbtipepp" id="rbtipepp04" value="04">
                            <label for="rbtipepp04">Filtro / Cartucho</label>
                            <input type="radio" name="rbtipepp" id="rbtipepp05" value="05">
                            <label for="rbtipepp05">Calzado</label>
                            <input type="radio" name="rbtipepp" id="rbtipepp06" value="06">
                            <label for="rbtipepp06">Careta</label>
                            <input type="radio" name="rbtipepp" id="rbtipepp07" value="07">
                            <label for="rbtipepp07">Casco</label>
                            <input type="radio" name="rbtipepp" id="rbtipepp08" value="08">
                            <label for="rbtipepp08">Ropa</label>
                            <input type="radio" name="rbtipepp" id="rbtipepp09" value="09">
                            <label for="rbtipepp09">Barbiquejo</label>
                            <input type="radio" name="rbtipepp" id="rbtipepp10" value="10">
                            <label for="rbtipepp10">Arnés</label>
                            <input type="radio" name="rbtipepp" id="rbtipepp11" value="11">
                            <label for="rbtipepp11">Capotin</label>
                            <input type="radio" name="rbtipepp" id="rbtipepp12" value="12">
                            <label for="rbtipepp12">Auditivo</label>
                            <input type="radio" name="rbtipepp" id="rbtipepp13" value="13">
                            <label for="rbtipepp13">Chaleco</label>
                        </div>	
                    </div>
                    
                    <div class="inputentry oculto mb15px" id="divConEpp">
                        <label class="obligatorio">Condición del EPP :</label>
                        <div class="radioentry" id="rgconepp">
                            <input type="radio" name="rbconepp" id="rbconepp01" value="01">
                            <label for="rbconepp01">No uso de Epp</label>
                            <input type="radio" name="rbconepp" id="rbconepp02" value="02">
                            <label for="rbconepp02">Uso incorrecto de epp</label>
                            <input type="radio" name="rbconepp" id="rbconepp03" value="03">
                            <label for="rbconepp03">Epp en mal estado</label>
                            <input type="radio" name="rbconepp" id="rbconepp04" value="04">
                            <label for="rbconepp04">Epp inadecuado</label>
                        </div>
                    </div>
                    
                    <div class="inputentry mb15px">
                        <label for="txtPreve" class="obligatorio">Breve descripción de la observación preventiva:</label>
                        <input type="text" name="txtPreve" id="txtPreve" class="w95p" >	
                    </div>
                    <div class="inputentry mb15px">
                        <label for="txtCorre" class="no_obligatorio">Qué medidas correctivas se tomarón? :</label>	
                        <input type="text" name="txtCorre" id="txtCorre" class="w95p" >
                    </div>
                    <div class="inputentry mb15px">
                        <label for="txtPerdi" class="obligatorio">Cuál es el potencial de pérdida?</label>
                        <div class="radioentry" id="rgPerdi">
                            <input type="radio" name="rbPerdi" id="rbPerdi01" value="01">
                            <label for="rbPerdi01">Potencial alto</label><br>
                            <input type="radio" name="rbPerdi" id="rbPerdi02" value="02">
                            <label for="rbPerdi02">Potencial Medio</label><br>
                            <input type="radio" name="rbPerdi" id="rbPerdi03" value="03">
                            <label for="rbPerdi03">Potencial Bajo</label>	
                        </div>
                    </div>
                    <div class="center flexColumn">
                        <button id="btnFoto" class="botonUpload">Insertar Foto</button>
                        <img src="<?php echo constant('URL')?>public/img/noimagen.jpg" alt="" id="img_preview" class="conBorde imgPrevia">
                    </div>
                    <div class="buttonsPage">
                        <!-- <button type="submit" id="btnRegisterOther"> <i class="far fa-calendar-plus"></i> Registrar Otra TOP</button> -->
                        <button type="submit" id="btnRegister"> <i class="far fa-calendar-check"></i> Registrar </button>
                        <button type="reset" id="btnCancel"><i class="fas fa-ban"></i> Cancelar</button>	
                    </div>
            </form>
            
           <div class="messageFooter">
                <h1>UN DIA SIN ACCIDENTES, ES UN BUEN DIA</h1>
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
    <script src="<?php echo constant('URL');?>public/js/top.js?v1.0.3"></script>
</body>
</html>