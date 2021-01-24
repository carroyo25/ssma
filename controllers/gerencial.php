<?php
    class Gerencial extends Controller{
        function __construct()
        {
            parent::__construct();
        }

        function render(){
            session_start();

            $this->view->nombres = $_SESSION['nombres'];
            $this->view->render('gerencial/index');
        }

        function grabarDocumento(){
            session_start();

            $iddoc              = uniqid("");
            $razonsocial        = $_POST['razonsocial'];
            $ruc                = $_POST['ruc'];
            $domicilio          = $_POST['domicilio'];
            $acteconomica       = $_POST['actividad'];
            $responsable1       = $_POST['resp1'];
            $responsable2       = $_POST['resp2'];
            $responsable3       = $_POST['resp3'];
            $responsable4       = $_POST['resp4'];
            $nrotrabajadores    = $_POST['trabajadores'];
            $areasinspeccion    = $_POST['areasinspec'];
            $fechainspeccion    = $_POST['fecinspeccion'];
            $respinspeccion     = $_POST['responsable'];
            $planeada           = isset($_POST['ckhplaneada']) ? $_POST['ckhplaneada'] : null;
            $noplaneada         = isset($_POST['ckhnoplaneada']) ? $_POST['ckhnoplaneada'] : null;
            $otros              = $_POST['otros'];
            $notas              = $_POST['notas'];
            $visita             = $_POST['visita'];
            $comedor            = isset($_POST['comedores']) ? $_POST['comedores'] : null;
            $comedordet         = $_POST['comedor'];
            $cocina             = isset($_POST['cocinas']) ? $_POST['cocinas'] : null;
            $cocinadet          = $_POST['cocina'];
            $catering           = isset($_POST['caterings']) ? $_POST['caterings']: null;
            $cateringdet        = $_POST['catering'];
            $deposito           = isset($_POST['depositos']) ? $_POST['depositos'] : null;
            $depositodet        = $_POST['deposito'];
            $alimentacion       = isset($_POST['alimentos']) ? $_POST['alimentos']: null;
            $alimentaciondet    = $_POST['alimento'];
            $consultorio        = isset($_POST['consultorios']) ? $_POST['consultorios'] : null;
            $consultoriodet     = $_POST['consultorio'];
            $medicamentos       = isset($_POST['medicamentos']) ? $_POST['medicamentos']: null;
            $medicamentosdet    = $_POST['medicamento'];
            $dormitorios        = isset($_POST['dormitorios']) ? $_POST['dormitorios']: null;
            $dormitoriosdet     = $_POST['dormitorio'];
            $politicas          = isset($_POST['politicas']) ? $_POST['politicas']: null;
            $politicasdet       = $_POST['politica'];
            $induccion          = isset($_POST['inducciones']) ? $_POST['inducciones']: null;
            $inducciondet       = $_POST['induccion'];
            $permiso            = isset($_POST['permisos']) ? $_POST['permisos']: null;
            $permisodet         = $_POST['permiso'];
            $ttop               = isset($_POST['tops']) ? $_POST['tops']: null;
            $topdet             = $_POST['top'];
            $planes             = isset($_POST['planes']) ? $_POST['planes']: null;
            $planesdet          = $_POST['plan'];
            $epp                = isset($_POST['epps']) ? $_POST['epps']: null;
            $eppdet             = $_POST['epp'];
            $campamento         = isset($_POST['campamentos']) ? $_POST['campamentos']: null;
            $campamentodet      = $_POST['campamento'];
            $areatrabajo        = isset($_POST['areas']) ? $_POST['areas']: null;
            $areatrabajodet     = $_POST['areatrabajo'];
            $extintores         = isset($_POST['extintores']) ? $_POST['extintores']: null;
            $extintoresdet      = $_POST['extintor'];
            $maquinas           = isset($_POST['maquinas']) ? $_POST['maquinas']: null;
            $maquinasdet        = $_POST['maquina'];
            $protectores        = isset($_POST['protectores']) ?$_POST['protectores']: null;
            $protectoresdet     = $_POST['protector'];
            $residuos           = isset($_POST['residuos']) ? $_POST['residuos']: null;
            $residuosdet        = $_POST['residuo'];
            $segregacion        = isset($_POST['segregaciones']) ? $_POST['segregaciones']: null;
            $segregaciondet     = $_POST['segregacion'];
            $residuales         = isset($_POST['aguasresiduales']) ? $_POST['aguasresiduales']: null;
            $residualesdet      = $_POST['aguasresidual'];
            $derrames           = isset($_POST['derrames']) ? $_POST['derrames']: null;
            $derramesdet        = $_POST['derrame'];
            $lubricantes        = isset($_POST['lubricantes']) ? $_POST['lubricantes']: null;
            $lubricantesdet     = $_POST['lubricante'];
            $conclusiones       = $_POST['conclusion'];
            $responsabletrabajo = $_POST['responsabletrabajo'];
            $responsablecargo   = $_POST['cargo'];
            $fecharegistro      = $_POST['fechareg'];
            $usuario            = $_SESSION['usuario'];

            $this->model->insert(['iddoc'=>$iddoc,
                                    'razonsocial'=>$razonsocial,
                                    'ruc'=>$ruc,
                                    'domicilio'=>$domicilio,
                                    'acteconomica'=>$acteconomica,
                                    'responsable1'=>$responsable1,
                                    'responsable2'=>$responsable2,
                                    'responsable3'=>$responsable3,
                                    'responsable4'=>$responsable4,
                                    'nrotrabajadores'=>$nrotrabajadores,
                                    'areasinspeccion'=>$areasinspeccion,
                                    'fechainspeccion'=>$fechainspeccion,
                                    'respinspeccion'=>$respinspeccion,
                                    'planeada'=>$planeada,
                                    'noplaneada'=>$noplaneada,
                                    'otros'=>$otros,
                                    'notas'=>$notas,
                                    'visita'=>$visita,
                                    'comedor'=>$comedor,
                                    'comedordet'=>$comedordet,
                                    'cocina'=>$cocina,
                                    'cocinadet'=>$cocinadet,
                                    'catering'=>$catering,
                                    'cateringdet'=>$cateringdet,
                                    'deposito'=>$deposito,
                                    'depositodet'=>$depositodet,
                                    'alimentacion'=>$alimentacion,
                                    'alimentaciondet'=>$alimentaciondet,
                                    'consultorio'=>$consultorio,
                                    'consultoriodet'=>$consultoriodet,
                                    'medicamentos'=>$medicamentos,
                                    'medicamentosdet'=>$medicamentosdet,
                                    'dormitorios'=>$dormitorios,
                                    'dormitoriosdet'=>$dormitoriosdet,
                                    'politicas'=>$politicas,
                                    'politicasdet'=>$politicasdet,
                                    'induccion'=>$induccion,
                                    'inducciondet'=>$inducciondet,
                                    'permiso'=>$permiso,
                                    'permisodet'=>$permisodet,
                                    'ttop'=>$ttop,
                                    'topdet'=>$topdet,
                                    'planes'=>$planes,
                                    'planesdet'=>$planesdet,
                                    'epp'=>$epp,
                                    'eppdet'=>$eppdet,
                                    'campamento'=>$campamento,
                                    'campamentodet'=>$campamentodet,
                                    'areatrabajo'=>$areatrabajo,
                                    'areatrabajodet'=>$areatrabajodet,
                                    'extintores'=>$extintores,
                                    'extintoresdet'=>$extintoresdet,
                                    'maquinas'=>$maquinas,
                                    'maquinasdet'=>$maquinasdet,
                                    'protectores'=>$protectores,
                                    'protectoresdet'=>$protectoresdet,
                                    'residuos'=>$residuos,
                                    'residuosdet'=>$residuosdet,
                                    'segregacion'=>$segregacion,
                                    'segregaciondet'=>$segregaciondet,
                                    'residuales'=>$residuales,
                                    'residualesdet'=>$residualesdet,
                                    'derrames'=>$derrames,
                                    'derramesdet'=>$derramesdet,
                                    'lubricantes'=>$lubricantes,
                                    'lubricantesdet'=>$lubricantesdet,
                                    'conclusiones'=>$conclusiones,
                                    'responsabletrabajo'=>$responsabletrabajo,
                                    'responsablecargo'=>$responsablecargo,
                                    'fecharegistro'=>$fecharegistro,
                                    'usuario'=>$usuario
                                ]);

        }
    }
?>