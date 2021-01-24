<?php 
    class Top extends Controller{
        function __construct()
        {
            parent::__construct();
        }

        function render(){
            session_start();

            $this->view->nombres = $_SESSION['nombres'];
            $this->view->usuario = $_SESSION['usuario'];
            $this->view->areas  = $this->model->getAreas();
            $this->view->render('top/index');
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

        function deleteImg() {
            $img = $_POST['img'];

            $file = 'public/photos/'.$img;

            if (file_exists($file)) { unlink($file); }
        }

        function guardarTop(){
            $topid          = uniqid('pc_');
            $sede           = $_POST['sltSede'];
            $lugar          = $_POST['txtLugar'];
            $reportado      = $_POST['txtRepor'];
            $fecha          = $_POST['txtFecha'];
            $observacion    = $_POST['rbObser'];
            $acsues         = $_POST['rbacsues'] ?: '00';
            $cosues         = $_POST['rbcosues'] ?: '00';
            $actseg         = $_POST['rbactseg'] ?: '00';
            $otros          = $_POST['txtOtros'];
            $relacion       = $_POST['rbrelac'] ?: '00';
            $tipepp         = $_POST['rbtipepp'] ?: '00';
            $conepp         = $_POST['rbconepp'] ?: '00';
            $preventiva     = $_POST['txtPreve'];
            $correctiva     = $_POST['txtCorre'];
            $perdida        = $_POST['rbPerdi'];
            $area           = $_POST['sltArea'];
            $foto           = $_POST['ruta_foto'];
            $user           = $_POST['usuario'];

            $this->model->insert(   ['idtop'        =>$topid,
                                    'sede'          =>$sede,
                                    'lugar'         =>$lugar,
                                    'reportado'     =>$reportado,
                                    'fecha'         =>$fecha,
                                    'observacion'   =>$observacion,
                                    'acsues'        =>$acsues,
                                    'cosues'        =>$cosues,
                                    'actseg'        =>$actseg,
                                    'otros'         =>$otros,
                                    'relacion'      =>$relacion,
                                    'tipepp'        =>$tipepp,
                                    'conepp'        =>$conepp,
                                    'preventiva'    =>$preventiva,
                                    'correctiva'    =>$correctiva,
                                    'perdida'       =>$perdida,
                                    'area'          =>$area,
                                    'foto'          =>$foto,
                                    'user'          =>$user
                                    ]  );

            if ($perdida == '01') {
                $this->model->enviarMail($preventiva,$sede);
            }
        }

        function consultarTop(){

        }

        function eliminarTop(){

        }

        function UploadPhotoMovil(){
            $isGood = false;
            try{
                $uploaddir = 'public/photos/';
                $fileName = basename($_FILES['fileToUpload']['name']);
                $uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);
                
                //CHECK IF ITS AN IMAGE OR NOT
                $allowed_types = array ('image/jpeg', 'image/png', 'image/bmp', 'image/gif' );
                $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
                $detected_type = finfo_file( $fileInfo, $_FILES['fileToUpload']['tmp_name'] );
                if ( !in_array($detected_type, $allowed_types) ) {
                    die ( '{"status" : "Bad", "reason" : "Not a valid image"}' );
                }
            
                if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile)) {
                    //echo "File is valid, and was successfully uploaded.\n";
                    echo '{"status" : "Success", "reason" "'. $fileName .'"}';
                    $isGood = true;
                } else {
                    //echo "Possible file upload attack!\n";
                    echo '{"status" : "Bad", "reason" : "Unable to Upload Profile Image"}';
                }
            
            }
            catch(Exception $e) {
                echo '{"status" : "Bad", "reason" : "'.$e->getMessage().'"}';
            }
        }

        function guardarMovil(){
            $topid          = uniqid('mo_');
            $sede           = $_POST['sede'];
            $lugar          = $_POST['lugar'];
            $reportado      = $_POST['reportado'];
            $fecha          = $_POST['fecha'];
            $observacion    = $_POST['observacion'];
            $acsues         = $_POST['acsues'] ?: '00';
            $cosues         = $_POST['cosues'] ?: '00';
            $actseg         = $_POST['actseg'] ?: '00';
            $otros          = $_POST['otros'];
            $relacion       = $_POST['relacion'] ?: '00';
            $tipepp         = $_POST['tipepp'] ?: '00';
            $conepp         = $_POST['conepp'] ?: '00';
            $preventiva     = $_POST['preventiva'];
            $correctiva     = $_POST['correctiva'];
            $perdida        = $_POST['perdida'] ?: '00';
            $area           = $_POST['sltArea'];
            $foto           = $_POST['ruta_foto'];
            $user           = $_POST['usuario'];


            $insert = $this->model->insertMovil(   ['idtop'        =>$topid,
                                    'sede'          =>$sede,
                                    'lugar'         =>$lugar,
                                    'reportado'     =>$reportado,
                                    'fecha'         =>$fecha,
                                    'observacion'   =>$observacion,
                                    'acsues'        =>$acsues,
                                    'cosues'        =>$cosues,
                                    'actseg'        =>$actseg,
                                    'otros'         =>$otros,
                                    'relacion'      =>$relacion,
                                    'tipepp'        =>$tipepp,
                                    'conepp'        =>$conepp,
                                    'preventiva'    =>$preventiva,
                                    'correctiva'    =>$correctiva,
                                    'perdida'       =>$perdida,
                                    'area'          =>$area,
                                    'foto'          =>$foto,
                                    'user'          =>$user
                                    ]  );

            if ($perdida == '01') {
                $this->model->enviarMail($preventiva,$sede);
            }

            if ($insert) {
                echo "Guardado desde Celular";
            }
        }
        
        function ubicaciones(){
            $area = $_POST['area'];

            $result = $this->model->getUbics($area);

            echo $result;
        }
    }
?>