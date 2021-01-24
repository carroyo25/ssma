<?php
    class Seguridad extends Controller{
        function __construct()
        {
            parent::__construct();
        }

        function render(){
            session_start();
    
            $this->view->nombres = $_SESSION['nombres'];
            $this->view->render('seguridad/index');
        }

        function grabarDetalles(){
            $data = json_decode($_POST['data']);

            for ($i=0; $i < count($data); $i++) {
                $sid    = uniqid('se_');
                $idd    = $data[$i]->iddoc;
                $con    = $data[$i]->condicion;
                $cla    = $data[$i]->clasificacion;
                $acc    = $data[$i]->accion;
                $res    = $data[$i]->responsable;
                $fec    = $data[$i]->fecha;
                $seg    = $data[$i]->seguimiento;

                $datos = compact("sid","idd","con","cla","acc","res","fec","seg");

                $saveDoc = $this->model->insertDetails($datos);
            }            
        }

        function grabarDetalleMovil(){
                $sid    = uniqid();
                $idd    = $_POST['reg'];
                $con    = $_POST['condicion'];
                $cla    = $_POST['clasificacion'];
                $acc    = $_POST['accion'];
                $res    = $_POST['responsable'];
                $fec    = $_POST['fecha'];
                $seg    = $_POST['seguimiento'];

                $datos = compact("sid","idd","con","cla","acc","res","fec","seg");

                $saveDoc = $this->model->insertDetails($datos);

        }

        function grabarDocumento(){
            $reg  = isset($_POST['reg']) ? $_POST['reg'] : uniqid("se_");
            $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : null;
            $sede = $_POST['sede'];
            $luga = $_POST['lugar'];
            $fech = $_POST['fecha'];
            $insp = $_POST['inspeccionado'] ;
            $fir1 = $_POST['firma1'];
            $resp = $_POST['responsable'];
            $fir2 = $_POST['firma2'];
            $obs0 = $_POST['observacion0'];
            $obs1 = $_POST['observacion1'];
            $obs2 = $_POST['observacion2'];
            $foto = $_POST['ruta_foto'];

            $datos = compact("reg","tipo","sede","luga","fech","insp","fir1","resp","fir2","obs0","obs1","obs2","foto");

            $saveDoc = $this->model->insert($datos);

            if ($saveDoc) {
                echo $reg;
            }

            //$this->model->sendmail($sede);
        }

        function uploadImg(){
            $temporal	 = $_FILES['image_file']['tmp_name'];
            $nombre		 = $_FILES['image_file']['name'];
             
            if ( $_FILES['image_file']['type'] == 'image/jpeg') {
                $original 	= imagecreatefromjpeg($temporal);
            }
            else {
                die('Formato de archivo no valido');
            }

            $ancho_original	= imagesx($original);
		 	$alto_original	= imagesy($original);

		 	//crear el lienzo vacio 520*400
		 	$ancho_nuevo 	= 520;
		 	$alto_nuevo		= 400; //round($ancho_nuevo * $alto_original / $ancho_original);
		 	
		 	$copia = imagecreatetruecolor($ancho_nuevo,$alto_nuevo);

		 	//copiar original -> copia
		 	imagecopyresampled($copia, $original, 0, 0, 0, 0, $ancho_nuevo, 400, $ancho_original, $alto_original);

		 	//exportar guardar imagen
		 	imagejpeg($copia,"public/photos/".$nombre,50);
		 	
		 	//elimina los datos temporales
		 	imagedestroy($original);
		 	imagedestroy($copia);
        }
    }
?>