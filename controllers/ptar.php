<?php
    class Ptar extends Controller{
        function __construct()
        {
            parent::__construct();
        }

        function render(){
            session_start();

            $this->view->nombres = $_SESSION['nombres'];
            $this->view->render('ptar/index');
        }

        function grabarDocumento(){
            session_start();

            $iddoc                  = uniqid();
            $fechaElaboracion       = $_POST['fecha'];
            $proyecto               = $_POST['proyecto'];
            $cliente                = $_POST['cliente'];
            $semana                 = $_POST['semana'];
            $fase                   = $_POST['fase'];
            $datosGeneralesPt       = isset($_POST['chkpt01']) ? '1' : '0';
            $procedimientos         = isset($_POST['chkpt02']) ? '1' : '0';
            $equipos                = isset($_POST['chkpt03']) ? '1' : '0';
            $epp                    = isset($_POST['chkpt04']) ? '1' : '0';
            $listaVerificacion      = isset($_POST['chkpt05']) ? '1' : '0';
            $explosividad           = isset($_POST['chkpt06']) ? '1' : '0';
            $comprobacionEquipo     = isset($_POST['chkpt07']) ? '1' : '0';
            $colindante             = isset($_POST['chkpt08']) ? '1' : '0';
            $firmasIncompletasPt    = isset($_POST['chkpt09']) ? '1' : '0';
            $noregistrohora         = isset($_POST['chkpt10']) ? '1' : '0';
            $cierreInadecuado       = isset($_POST['chkpt11']) ? '1' : '0';
            $datosGeneralesAst      = isset($_POST['chkast01']) ? '1' : '0';
            $analisisFaltante       = isset($_POST['chkast02']) ? '1' : '0';
            $descripcionFaltante    = isset($_POST['chkast03']) ? '1' : '0';
            $firmasIncompletasAst   = isset($_POST['chkast04']) ? '1' : '0';
            $numeropersonas         = isset($_POST['chkast05']) ? '1' : '0';
            $valoracion             = isset($_POST['chkast06']) ? '1' : '0';
            $peligros               = isset($_POST['chkast07']) ? '1' : '0';
            $medidasnoapropiadas    = isset($_POST['chkast08']) ? '1' : '0';
            $medidasinsuficientes   = isset($_POST['chkast09']) ? '1' : '0';
            $otros1                 = isset($_POST['chkast10']) ? '1' : '0';
            $otros2                 = isset($_POST['chkast11']) ? '1' : '0';
            $otros3                 = isset($_POST['chkast12']) ? '1' : '0';
            $otros1Det              = $_POST['detast10'];
            $otros2Det              = $_POST['detast11'];
            $otros3Det              = $_POST['detast12'];
            $realizado              = $_POST['realizado'];
            $usuario                = $_SESSION['usuario'];


            $this->model->insert(['iddoc'=>$iddoc,
                                 'fechaElaboracion'=>$fechaElaboracion,
                                 'proyecto'=>$proyecto,
                                 'cliente'=>$cliente,
                                 'semana'=>$semana,
                                 'fase'=>$fase,
                                 'datosGeneralesPt'=>$datosGeneralesPt,
                                 'procedimientos'=>$procedimientos,
                                 'equipos'=>$equipos,
                                 'epp'=>$epp,
                                 'listaVerificacion'=>$listaVerificacion,
                                 'explosividad'=>$explosividad,
                                 'comprobacionEquipo'=>$comprobacionEquipo,
                                 'colindante'=>$colindante,
                                 'firmasIncompletasPt'=>$firmasIncompletasPt,
                                 'noregistrohora'=>$noregistrohora,
                                 'cierreInadecuado'=>$cierreInadecuado,
                                 'datosGeneralesAst'=>$datosGeneralesAst,
                                 'analisisFaltante'=>$analisisFaltante,
                                 'descripcionFaltante'=>$descripcionFaltante,
                                 'firmasIncompletasAst'=>$firmasIncompletasAst,
                                 'numeropersonas'=>$numeropersonas,
                                 'valoracion'=>$valoracion,
                                 'peligros'=>$peligros,
                                 'medidasnoapropiadas'=>$medidasnoapropiadas,
                                 'medidasinsuficientes'=>$medidasinsuficientes,
                                 'otros1'=>$otros1,
                                 'otros2'=>$otros2,
                                 'otros3'=>$otros3,
                                 'otros1Det'=>$otros1Det,
                                 'otros2Det'=>$otros2Det,
                                 'otros3Det'=>$otros3Det,
                                 'realizado'=>$realizado,
                                 'usuario'=>$usuario]);

        }
    }
?>