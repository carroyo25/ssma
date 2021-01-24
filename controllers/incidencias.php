<?php
    class Incidencias extends Controller{
        function __construct()
        {
            parent::__construct();
        }

        function render(){
            session_start();

            $this->view->nombres = $_SESSION['nombres'];
            $this->view->render('Incidencias/index');
        }

        function obtainWorkerData(){
            $dni = $_POST['dni'];

            $getName = $this->model->getWorkerbyDni($dni);
            
            if ($getName) {
                $salidajson = array("id"=>$getName['internal'],
                                    "dni"=>$getName['dni'],
                                    "apellidos"=>$getName['apellidos'],
                                    "nombres"=>$getName['nombres'],
                                    "dcargo"=>$getName['dcargo'],
                                    "sexo"=>$getName['sexo'],
                                    "sangre"=>$getName['sangre'],
                                    "gsangre"=>$getName['gsangre'],
                                    "civil"=>$getName['estado_civil'],
                                    "nacimiento"=>$getName['fnacimiento'],
                                    "dsede"=>$getName['dsede'],
                                    "edad"=>$getName['edad'],
                                    "direccion"=>$getName['direccion'],
                                    "depanacim"=>$getName['depa_nacim'],
                                    "depadom"=>$getName['depa_dom'],
                                    "provdom"=>$getName['prov_dom'],
                                    "distdom"=>$getName['dist_dom'],
                                    "domiclio"=>$getName['direccion']);
                echo json_encode($salidajson,JSON_UNESCAPED_UNICODE);
            }
        }

        function obtainWorkerDataMovil(){
            $dni = $_POST['dni'];

            $getName = $this->model->getWorkerbyDni($dni);
            
            if ($getName) {
                $salidajson = array("Id"=>$getName['internal'],
                                    "Dni"=>$getName['dni'],
                                    "Apellidos"=>$getName['apellidos'],
                                    "Nombres"=>$getName['nombres'],
                                    "Cargo"=>$getName['dcargo'],
                                    "Sexo"=>$getName['sexo'],
                                    "Civil"=>$getName['estado_civil'],
                                    "Nacimiento"=>$getName['fnacimiento'],
                                    "Sede"=>$getName['dsede'],
                                    "Edad"=>$getName['edad'],
                                    "Direccion"=>$getName['direccion'],
                                    "Depanacim"=>$getName['depa_nacim'],
                                    "Depadom"=>$getName['depa_dom'],
                                    "Provdom"=>$getName['prov_dom'],
                                    "Distdom"=>$getName['dist_dom'],
                                    "Domiclio"=>$getName['direccion'],
                                    "Resultado"=>true);
                echo json_encode($salidajson,JSON_UNESCAPED_UNICODE);
            }
        }

        function grabarDocumento(){
            session_start();

            $iddoc              = uniqid("pc_");
            $proyecto           = $_POST['proyecto'];
            $cliente            = $_POST['cliente'];
            $materialmenor      = isset($_POST['chktip01']) ? '1' : '0';
            $materialmayor      = isset($_POST['chktip02']) ? '1' : '0';
            $derramemenor       = isset($_POST['chktip03']) ? '1' : '0';
            $derramemayor       = isset($_POST['chktip04']) ? '1' : '0';
            $conherido          = isset($_POST['chktip05']) ? '1' : '0';
            $sinherido          = isset($_POST['chktip06']) ? '1' : '0';
            $vehicularmenor     = isset($_POST['chktip07']) ? '1' : '0';
            $vehicularmayor     = isset($_POST['chktip08']) ? '1' : '0';
            $fac                = isset($_POST['chktip09']) ? '1' : '0';
            $mto                = isset($_POST['chktip10']) ? '1' : '0';
            $rwc                = isset($_POST['chktip11']) ? '1' : '0';
            $lti                = isset($_POST['chktip12']) ? '1' : '0';
            $ftl                = isset($_POST['chktip13']) ? '1' : '0';
            $incidente          = isset($_POST['chktip14']) ? '1' : '0';
            $eo                 = isset($_POST['chktip16']) ? '1' : '0';
            $lugar              = $_POST['lugar'];
            $fecha              = $_POST['fecha'];
            $hora               = $_POST['hora'];
            $persona            = isset($_POST['persona']) ? $_POST['persona'] : null;
            $documento          = isset($_POST['documento']) ? $_POST['documento'] : null;
            $sexo               = isset($_POST['sexo']) ? $_POST['sexo'] : null;
            $edad               = isset($_POST['edad']) ? $_POST['edad'] : null;
            $nacimiento         = isset($_POST['nacimiento']) ? $_POST['nacimiento'] : null;
            $domicilio          = isset($_POST['domicilio']) ? $_POST['domicilio'] : null;
            $civil              = isset($_POST['civil']) ? $_POST['civil'] : null;
            $dpto               = isset($_POST['dpto']) ? $_POST['dpto'] : null;
            $prov               = isset($_POST['prov']) ? $_POST['prov'] : null;
            $dist               = isset($_POST['dist']) ? $_POST['dist'] : null;
            $cargo              = isset($_POST['cargo']) ? $_POST['cargo'] : null;
            $instruccion        = $_POST['instruccion'];
            $descripcion        = $_POST['descripcion'];
            $acciones           = $_POST['acciones'];
            $elaborado          = $_POST['elaborado'];
            $usuario            = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
            $foto               = $_POST['ruta_foto'];

            $this->model->insert(['iddoc' => $iddoc,
                'proyecto' => $proyecto,
                'cliente' => $cliente,
                'materialmenor' => $materialmenor,
                'materialmayor' => $materialmayor,
                'derramemenor' => $derramemenor,
                'derramemayor' => $derramemayor,
                'conherido' => $conherido,
                'sinherido' => $sinherido,
                'vehicularmenor' => $vehicularmenor,
                'vehicularmayor' => $vehicularmayor,
                'fac' => $fac,
                'mto' => $mto,
                'rwc' => $rwc,
                'lti' => $lti,
                'ftl' => $ftl,
                'incidente' => $incidente,
                'eo' => $eo,
                'lugar' => $lugar,
                'fecha' => $fecha,
                'hora' => $hora,
                'persona' => $persona,
                'documento' => $documento,
                'sexo' => $sexo,
                'edad' => $edad,
                'nacimiento' => $nacimiento,
                'domicilio' => $domicilio,
                'civil' => $civil,
                'dpto' => $dpto,
                'prov' => $prov,
                'dist' => $dist,
                'cargo' => $cargo,
                'instruccion' => $instruccion,
                'descripcion' => $descripcion,
                'acciones' => $acciones,
                'elaborado' => $elaborado,
                'usuario' => $usuario,
                'foto' => $foto
            ]);

            $this->enviarMail($descripcion,$persona,$proyecto);
        }

        function grabarDocumentoMovil(){
            session_start();

            $iddoc              = uniqid("mo_");
            $proyecto           = $_POST['proyecto'];
            $cliente            = $_POST['cliente'];
            $materialmenor      = $_POST['chktip01'];
            $materialmayor      = $_POST['chktip02'];
            $derramemenor       = $_POST['chktip03'];
            $derramemayor       = $_POST['chktip04'];
            $conherido          = $_POST['chktip05'];
            $sinherido          = $_POST['chktip06'];
            $vehicularmenor     = $_POST['chktip07'];
            $vehicularmayor     = $_POST['chktip08'];
            $fac                = $_POST['chktip09'];
            $mto                = $_POST['chktip10'];
            $rwc                = $_POST['chktip11'];
            $lti                = $_POST['chktip12'];
            $ftl                = $_POST['chktip13'];
            $incidente          = $_POST['chktip14'];
            $eo                 = $_POST['chktip16'];
            $lugar              = $_POST['lugar'];
            $fecha              = $_POST['fecha'];
            $hora               = $_POST['hora'];
            $persona            = $_POST['persona'];
            $documento          = $_POST['documento'];
            $sexo               = $_POST['sexo'];
            $edad               = $_POST['edad'];
            $nacimiento         = $_POST['nacimiento'];
            $domicilio          = $_POST['domicilio'];
            $civil              = $_POST['civil'];
            $dpto               = $_POST['dpto'];
            $prov               = $_POST['prov'];
            $dist               = $_POST['dist'];
            $cargo              = $_POST['cargo'];
            $instruccion        = $_POST['instruccion'];
            $descripcion        = $_POST['descripcion'];
            $acciones           = $_POST['acciones'];
            $elaborado          = $_POST['elaborado'];
            $usuario            = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

            $this->model->insert(['iddoc' => $iddoc,
                'proyecto' => $proyecto,
                'cliente' => $cliente,
                'materialmenor' => $materialmenor,
                'materialmayor' => $materialmayor,
                'derramemenor' => $derramemenor,
                'derramemayor' => $derramemayor,
                'conherido' => $conherido,
                'sinherido' => $sinherido,
                'vehicularmenor' => $vehicularmenor,
                'vehicularmayor' => $vehicularmayor,
                'fac' => $fac,
                'mto' => $mto,
                'rwc' => $rwc,
                'lti' => $lti,
                'ftl' => $ftl,
                'incidente' => $incidente,
                'eo' => $eo,
                'lugar' => $lugar,
                'fecha' => $fecha,
                'hora' => $hora,
                'persona' => $persona,
                'documento' => $documento,
                'sexo' => $sexo,
                'edad' => $edad,
                'nacimiento' => $nacimiento,
                'domicilio' => $domicilio,
                'civil' => $civil,
                'dpto' => $dpto,
                'prov' => $prov,
                'dist' => $dist,
                'cargo' => $cargo,
                'instruccion' => $instruccion,
                'descripcion' => $descripcion,
                'acciones' => $acciones,
                'elaborado' => $elaborado,
                'usuario' => $usuario
            ]);

            $this->enviarMail($descripcion,$persona,$proyecto);
        }

        function enviarMail($m,$pe,$pr){
            require_once 'public/PHPMailer/PHPMailerAutoload.php';
            
            $destino = "hminaya@sepcon.net";
            $origen = "ssma@sepcon.net";

            $remitente = "fichas@sepcon.net";

            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 2;
            $mail->Debugoutput = 'html';
            $mail->Host = 'mail.sepcon.net';
            $mail->Port = 587;
            $mail->SMTPOptions = array (
                'ssl' => array(
                    'verify_peer'  => true,
                    'verify_depth' => 3,
                    'allow_self_signed' => true,
                    'peer_name' => 'mail.sepcon.net',
                )
            );
            $mail->SMTPAuth = true;
            $mail->Username = "fichas@sepcon.net";
            $mail->Password = "a9Hj4Ph9";
            $mail->setFrom($origen, $remitente);
            $mail->addAddress($destino,$destino);
            $mail->addCC('mgarcia@sepcon.net', 'Reporte de Incidencias');
            $mail->addCC('svela@sepcon.net', 'Reporte de Incidencias');
            $mail->addCC('jtaborga@sepcon.net', 'Reporte de Incidencias');
            $mail->addCC('jopaniagua@sepcon.net', 'Reporte de Incidencias');
            $mail->addCC('smonteza@sepcon.net', 'Reporte de Incidencias');

            if ( $pr == "01") {
                $mail->addCC('asalvador@sepcon.net', 'Inspeccion de Seguridad');
                $mail->addCC('asistente_ssma_whcp21@sepcon.net', 'Inspeccion de Seguridad');
                $mail->addCC('hguardia@sepcon.net', 'Inspeccion de Seguridad');
                $mail->addCC('ctomasello@sepcon.net', 'Inspeccion de Seguridad');
                $mail->addCC('sreyes@sepcon.net', 'Inspeccion de Seguridad');
            }elseif ( $pr == "03") {
                $mail->addCC('pguzman@sepcon.net', 'Inspeccion de Seguridad');
                $mail->addCC('jribeiro@sepcon.net', 'Inspeccion de Seguridad');
                $mail->addCC('drios@sepcon.net', 'Inspeccion de Seguridad');
            }
        
            $mail->addCC('svela@sepcon.net', 'Reporte de Incidencias');
            $mail->Subject = 'Reporte de Incidencia';
            $message  = "<html><body>";
            $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
            $message .= "<tr><td>";
            $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
            $message .= "<thead>
                <tr height='80'>
                <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:red; font-size:34px;' >Reporte de Incidencia</th>
                </tr></thead>";
            $message .= "<tbody><tr>
                    <td colspan='4' style='padding:15px;'>
                        <p style='font-size:16px;'>Estimado(a):</p>
                        <p style='font-size:16px;'>Persona Involucrada: $pe</p>
                        <hr />
                        <p style='font-size:16px;'>DESCRIPCIÓN DEL ACCIDENTE/INCIDENTE/ENFERMEDAD OCUPACIONAL</p>
                        <p style='font-size:16px;'>$m</p>
                        <img src='public/img/mail.jpg' style='height:auto; width:100%; max-width:100%;'/>
                        <p style='font-size:15px; font-family:Verdana, Geneva, sans-serif; text-align: center; '>SSMMA - Reporte de Incidencias</p>
                    </td>
                    </tr></tbody>";
            $message .= "</table>";
            $message .= "</td></tr>";
            $message .= "</table>";
            $message .= "</body></html>";

            $mail->msgHTML(utf8_decode($message));
            $mail->SMTPDebug = 0;

            if($mail->send()){
                $salidajson = array("respuesta"=>true);
            }else{
                $salidajson = array("respuesta"=>false);
            }
            echo json_encode($salidajson);
            $mail->ClearAddresses();
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
    }
?>