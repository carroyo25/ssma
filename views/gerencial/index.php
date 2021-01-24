<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Documentario SSMA - Inspeccion Gerencial</title>
</head>
<body>
    <?php require 'views/header.php'; ?>
    <div class="leyenda">
        <ul>
            <li><span class="indicacion">B</span><span> - Bueno</span></li>
            <li><span class="indicacion">RC</span><span> - Requiere Corrección</span></li>
            <li><span class="indicacion">SV</span><span> - Sin Verificar</span></li>
            <li><span class="indicacion">Hig.</span><span> - Higiene</span></li>
            <li><span class="indicacion">Ord.</span><span> -  Orden</span></li>
            <li><span class="indicacion">Limp.</span><span> - Limpieza</span></li>
            <li><span class="indicacion">Señal</span><span> - Señalización</span></li>
        </ul>
    </div>
    <div id="wrap">
        <div class="page">
            <div class="cabeceraDoc">
                <div class="logo">
                    <img src="<?php echo constant('URL')?>public/img/logo.png" alt="">
                </div>
                <div class="titulo">
                    <p>LISTA DE VERIFICACIÓN DE VISITAS GERENCIALES</p>
                </div>
                <div class="formato">
                    <p>PSPC-110-X-PR-002-FR-001</p>
                    <p>Revisión: 0</p>
                    <p>Emisión: 17/05/19</p>
                    <p>Página: 1 de 2</p>
                </div>
            </div>
            <form method="POST" id="formGerencial">
                <div class="secction center">
                     <p>A. DATOS DEL EMPLEADOR</p>
                </div>
                <div class="twoColumns">
                    <div class="lColumn w50p">
                        <div>
                            <label for="razonsocial">Razón Social: </label>
                            <input type="text" name="razonsocial" id="razonsocial" class="w75p" value="SERVICIOS PETROLEROS Y CONSTRUCCIONES SEPCON S.A.C.">
                        </div>
                        <div>
                            <label for="ruc">RUC: </label>
                            <input type="text" name="ruc" id="ruc" value="20504898173">
                        </div>
                        <div> 
                            <label for="domicilio">Domicilio: </label>
                            <input type="text" name="domicilio" id="domicilio" class="w80p" value="AV. SAN BORJA NORTE NRO. 445 URB. SAN BORJA LIMA - LIMA - SAN BORJA">
                        </div>
                        <div>
                            <label for="">Tipo de actividad económica: </label>
                            <input type="text" name="actividad" id="actividad" class="w50p">
                        </div>
                        <div class="modoColumna">
                            <label>Responsables de las áreas inspeccionadas:</label>
                            <input type="text" class="inputLista h35px" name="resp1" id="resp1">
                            <input type="text" class="inputLista h35px" name="resp2" id="resp2">
                            <input type="text" class="inputLista h35px" name="resp3" id="resp3">
                            <input type="text" class="inputLista h35px" name="resp4" id="resp4">
                        </div>
                    </div>
                    <div class="RColumn w50p">
                        <div>
                            <label for="trabajadores">Nro de Trabajadores en el Proyecto / Sede: </label>
                            <input type="text" name="trabajadores" id="trabajadores" class="w20p">
                        </div>
                        <div>
                            <label for="areasinspec">Areas Inspeccionadas: </label>
                            <input type="text" name="areasinspec" id="areasinspec" class="w65p">
                        </div>
                        <div>
                            <label for="fecinspeccion">Fecha de Inspección: </label>
                            <input type="date" name="fecinspeccion" id="fecinspeccion" value="<?php echo date("Y-m-d");?>">
                        </div>
                        <div>
                            <label for="responsable">Responsable de la Inspección:</label>
                            <input type="text" name="responsable" id="responsable" class="w60p">
                        </div>
                        <div>
                            <table class="w100p">
                                <caption>
                                <span>Tipo de Inspección (Marcar con X)</span>
                                </caption>
                                <tbody>
                                    <tr>
                                        <td>Planeada</td>
                                        <td>No Planeada</td>
                                        <td>Otros detallar:</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="ckhplaneada" id="ckhplaneada"></td>
                                        <td><input type="checkbox" name="ckhnoplaneada" id="ckhnoplaneada"></td>
                                        <td><input type="textbox" name="otros" id="otros" class="sinBordes"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <div>
                            <p>Notas</p>
                            <textarea name="notas" id="notas" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="secction center">
                    <p>B. OBJETIVO  (VISITA DE LA INSPECCIÓN INTERNA)</p>
                </div>
                <div class="secction">
                    <textarea name="visita" id="visita" rows="4"></textarea>
                </div>
                <div class="secction center">
                    <p>C. RESULTADOS DE LA INSPECCIÓN:</p>
                </div>
                <div class="secction center">
                    <p>SALUD OCUPACIONAL</p>
                </div>
                <div>
                    <table class="tablaConBordes w100p">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="w5p">B</th>
                                <th class="w5p">RC</th>
                                <th class="w5p">SV</th>
                                <th>Comentarios (Descripción de la causa de la observación)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Ord./Limp. Comedor</td>
                                <td class="center"><input type="radio" name="comedores" id="com1" value="1"></td>
                                <td class="center"><input type="radio" name="comedores" id="com2" value="2"></td>
                                <td class="center"><input type="radio" name="comedores" id="com3" value="3"></td>
                                <td><input type="text" name="comedor" id="comedor" class="w100p"></td>
                            </tr>
                            <tr>
                                <td>Ord./Limp. Cocina</td>
                                <td class="center"><input type="radio" name="cocinas" id="coc1" value="1"></td>
                                <td class="center"><input type="radio" name="cocinas" id="coc2" value="2"></td>
                                <td class="center"><input type="radio" name="cocinas" id="coc3" value="3"></td>
                                <td><input type="text" name="cocina" id="cocina" class="w100p"></td>
                            </tr>
                            <tr>
                                <td>Aseo y uso de EPP del Personal de Catering</td>
                                <td class="center"><input type="radio" name="caterings" id="cat1" value="1"></td>
                                <td class="center"><input type="radio" name="caterings" id="cat2" value="2"></td>
                                <td class="center"><input type="radio" name="caterings" id="cat3" value="3"></td>
                                <td><input type="text" name="catering" id="catering" class="w100p"></td>                        
                            </tr>
                            <tr>
                                <td>Limp. Depósito / Alimentos / Agua Potable</td>
                                <td class="center"><input type="radio" name="depositos" id="dep1" value="1"></td>
                                <td class="center"><input type="radio" name="depositos" id="dep2" value="2"></td>
                                <td class="center"><input type="radio" name="depositos" id="dep3" value="3"></td>
                                <td><input type="text" name="deposito" id="deposito" class="w100p"></td>
                            </tr>
                            <tr>
                                <td>Calidad de  Alimentación</td>
                                <td class="center"><input type="radio" name="alimentos" id="ali1" value="1"></td>
                                <td class="center"><input type="radio" name="alimentos" id="ali2" value="2"></td>
                                <td class="center"><input type="radio" name="alimentos" id="ali3" value="3"></td>
                                <td><input type="text" name="alimento" id="alimento" class="w100p"></td>
                            </tr>
                            <tr>
                                <td>Hig./Ord./Limp. Consultorio Médico</td>
                                <td class="center"><input type="radio" name="consultorios" id="con1" value="1"></td>
                                <td class="center"><input type="radio" name="consultorios" id="con2" value="2"></td>
                                <td class="center"><input type="radio" name="consultorios" id="con3" value="3"></td>
                                <td><input type="text" name="consultorio" id="consultorio" class="w100p"></td>
                            </tr>
                            <tr>
                                <td>Cantidad / Surtido de Medicamentos</td>
                                <td class="center"><input type="radio" name="medicamentos" id="med1" value="1"></td>
                                <td class="center"><input type="radio" name="medicamentos" id="med2" value="2"></td>
                                <td class="center"><input type="radio" name="medicamentos" id="med3" value="3"></td>
                                <td><input type="text" name="medicamento" id="medicamento" class="w100p"></td>
                            </tr>
                            <tr>
                                <td>Ord./Limp. Dormitorios</td>
                                <td class="center"><input type="radio" name="dormitorios" id="dor1" value="1"></td>
                                <td class="center"><input type="radio" name="dormitorios" id="dor2" value="2"></td>
                                <td class="center"><input type="radio" name="dormitorios" id="dor3" value="3"></td>
                                <td><input type="text" name="dormitorio" id="dormitorio" class="w100p"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="secction center">
                    <p>SEGURIDAD</p>
                </div>
                <div>
                <table class="tablaConBordes w100p">
                     <thead>
                        <tr>
                            <th class="w40p"></th>
                            <th class="w5p">B</th>
                            <th class="w5p">RC</th>
                            <th class="w5p">SV</th>
                            <th>Comentarios (Descripción de la causa de la observación)</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                            <td>Las Políticas son las vigentes y están disponibles.</td>
                            <td class="center"><input type="radio" name="politicas" id="pol1" value="1"></td>
                            <td class="center"><input type="radio" name="politicas" id="pol2" value="2"></td>
                            <td class="center"><input type="radio" name="politicas" id="pol3" value="3"></td>
                            <td><input type="text" name="politica" id="politica" class="w100p"></td>
                        </tr>
                        <tr>
                            <td>Se realiza la Inducción Inicial para Visitantes</td>
                            <td class="center"><input type="radio" name="inducciones" id="ind1" value="1"></td>
                            <td class="center"><input type="radio" name="inducciones" id="ind2" value="2"></td>
                            <td class="center"><input type="radio" name="inducciones" id="ind3" value="3"></td>
                            <td><input type="text" name="induccion" id="induccion" class="w100p"></td>
                        </tr>
                        <tr>
                            <td>Se realiza el Analisis de Riesgo/Permiso de Trabajo/Charla Diaria para todas las Actividades</td>
                            <td class="center"><input type="radio" name="permisos" id="per1" value="1"></td>
                            <td class="center"><input type="radio" name="permisos" id="per2" value="2"></td>
                            <td class="center"><input type="radio" name="permisos" id="per3" value="3"></td>
                            <td><input type="text" name="permiso" id="permiso" class="w100p"></td>                        
                        </tr>
                        <tr>
                            <td>Se evidencia el llenado de Tarjetas TOP</td>
                            <td class="center"><input type="radio" name="tops" id="top1" value="1"></td>
                            <td class="center"><input type="radio" name="tops" id="top2" value="2"></td>
                            <td class="center"><input type="radio" name="tops" id="top3" value="3"></td>
                            <td><input type="text" name="top" id="top" class="w100p"></td>
                        </tr>
                        <tr>
                            <td>Los Planes de Emergencia / MEDEVAC están actualizados y disponibles.</td>
                            <td class="center"><input type="radio" name="planes" id="pla1" value="1"></td>
                            <td class="center"><input type="radio" name="planes" id="pla2" value="2"></td>
                            <td class="center"><input type="radio" name="planes" id="pla3" value="3"></td>
                            <td><input type="text" name="plan" id="plan" class="w100p"></td>
                        </tr>
                        <tr>
                            <td>Estado y adecuado uso  de EPP por los Trabajadores</td>
                            <td class="center"><input type="radio" name="epps" id="epp1" value="1"></td>
                            <td class="center"><input type="radio" name="epps" id="epp2" value="2"></td>
                            <td class="center"><input type="radio" name="epps" id="epp3" value="3"></td>
                            <td><input type="text" name="epp" id="epp" class="w100p"></td>
                        </tr>
                        <tr>
                            <td>Señal./Ord./Limp. Campamento / Talleres/Areas Operativas.</td>
                            <td class="center"><input type="radio" name="campamentos" id="cam1" value="1"></td>
                            <td class="center"><input type="radio" name="campamentos" id="cam2" value="2"></td>
                            <td class="center"><input type="radio" name="campamentos" id="cam3" value="3"></td>
                            <td><input type="text" name="campamento" id="campamento" class="w100p"></td>
                        </tr>
                        <tr>
                            <td>Señal./Ord./Limp. Área de Trabajo</td>
                            <td class="center"><input type="radio" name="areas" id="are1" value="1"></td>
                            <td class="center"><input type="radio" name="areas" id="are2" value="2"></td>
                            <td class="center"><input type="radio" name="areas" id="are3" value="3"></td>
                            <td><input type="text" name="areatrabajo" id="areatrabajo" class="w100p"></td>
                        </tr>
                        <tr>
                            <td>Estado de Extintores, Botiquines, Camillas,Lava ojos</td>
                            <td class="center"><input type="radio" name="extintores" id="ext1" value="1"></td>
                            <td class="center"><input type="radio" name="extintores" id="ext2" value="2"></td>
                            <td class="center"><input type="radio" name="extintores" id="ext3" value="3"></td>
                            <td><input type="text" name="extintor" id="extintor" class="w100p"></td>
                        </tr>
                        <tr>
                            <td>Estado de Máquinas / Herramientas</td>
                            <td class="center"><input type="radio" name="maquinas" id="maq1" value="1"></td>
                            <td class="center"><input type="radio" name="maquinas" id="maq2" value="2"></td>
                            <td class="center"><input type="radio" name="maquinas" id="maq3" value="3"></td>
                            <td><input type="text" name="maquina" id="maquina" class="w100p"></td>
                        </tr>
                        <tr>
                            <td>Estado y uso de Protectores / Guardas de los Equipos</td>
                            <td class="center"><input type="radio" name="protectores" id="pro1" value="1"></td>
                            <td class="center"><input type="radio" name="protectores" id="pro2" value="2"></td>
                            <td class="center"><input type="radio" name="protectores" id="pro3" value="3"></td>
                            <td><input type="text" name="protector" id="protector" class="w100p"></td>
                        </tr>
                     </tbody>
                 </table>
                </div>
                <div class="cabeceraDoc">
                    <div class="logo">
                        <img src="<?php echo constant('URL')?>public/img/logo.png" alt="">
                    </div>
                    <div class="titulo">
                        <p>LISTA DE VERIFICACIÓN DE VISITAS GERENCIALES</p>
                    </div>
                    <div class="formato">
                        <p>PSPC-110-X-PR-002-FR-001</p>
                        <p>Revisión: 0</p>
                        <p>Emisión: 17/05/19</p>
                        <p>Página: 2 de 2</p>
                    </div>
                </div>
                <div class="secction center">
                    <p>MEDIO AMBIENTE:</p>
                </div>
                <div>
                <table class="tablaConBordes w100p">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="w5p">B</th>
                                <th class="w5p">RC</th>
                                <th class="w5p">SV</th>
                                <th>Comentarios (Descripción de la causa de la observación)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Estado de los depósitos de residuos</td>
                                <td class="center"><input type="radio" name="residuos" id="res1" value="1"></td>
                                <td class="center"><input type="radio" name="residuos" id="res2" value="2"></td>
                                <td class="center"><input type="radio" name="residuos" id="res3" value="3"></td>
                                <td><input type="text" name="residuo" id="residuo" class="w100p"></td>
                            </tr>
                            <tr>
                                <td>Clasificación / Segregación de los Residuos</td>
                                <td class="center"><input type="radio" name="segregaciones" id="seg1" value="1"></td>
                                <td class="center"><input type="radio" name="segregaciones" id="seg2" value="2"></td>
                                <td class="center"><input type="radio" name="segregaciones" id="seg3" value="3"></td>
                                <td><input type="text" name="segregacion" id="segregacion" class="w100p"></td>
                            </tr>
                            <tr>
                                <td>Tratamiento / Descarga de Aguas Residuales</td>
                                <td class="center"><input type="radio" name="aguasresiduales" id="agu1" value="1"></td>
                                <td class="center"><input type="radio" name="aguasresiduales" id="agu2" value="2"></td>
                                <td class="center"><input type="radio" name="aguasresiduales" id="agu3" value="3"></td>
                                <td><input type="text" name="aguasresidual" id="aguasresidual" class="w100p"></td>                        
                            </tr>
                            <tr>
                                <td>La Disposición de equipos de emergencia para derrames</td>
                                <td class="center"><input type="radio" name="derrames" id="der1" value="1"></td>
                                <td class="center"><input type="radio" name="derrames" id="der2" value="2"></td>
                                <td class="center"><input type="radio" name="derrames" id="der3" value="3"></td>
                                <td><input type="text" name="derrame" id="derrame" class="w100p"></td>
                            </tr>
                            <tr>
                                <td>Depósitos de combustibles y lubricantes</td>
                                <td class="center"><input type="radio" name="lubricantes" id="lub1" value="1"></td>
                                <td class="center"><input type="radio" name="lubricantes" id="lub2" value="2"></td>
                                <td class="center"><input type="radio" name="lubricantes" id="lub3" value="3"></td>
                                <td><input type="text" name="lubricante" id="lubricante" class="w100p"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="secction center">
                    <p>D. CONCLUSIONES Y RECOMENDACIONES</p>
                </div>
                <div class="secction">
                    <textarea name="conclusion" id="conclusion" rows="5"></textarea>
                </div>
                <div class="secction center">
                     <p>E. RESPONSABLE DEL REGISTRO</p>
                </div>
                <div class="manyInput">
                        <div class="conBordes">
                            <label for="responsabletrabajo" class="fondoblanco">Responsable Frente/Área de Trabajo : </label>
                            <input type="text" name="responsabletrabajo" id="responsabletrabajo">	
                        </div>
                        <div class="conBordes fl3">
                            <label for="lugar" class="fondoblanco ">Cargo : </label>
                            <input type="text" name="cargo" id="cargo">	
                        </div>
                        <div class="conBordes">
                            <label for="fecha" class="fondoblanco">fecha : </label>
                            <input type="date" name="fechareg" id="fechareg" value="<?php echo date("Y-m-d");?>">	
                        </div>
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
    <script src="<?php echo constant('URL');?>public/js/gerencial.js"></script>
</body>
</html>