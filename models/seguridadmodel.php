<?php
    class SeguridadModel extends Model {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($datos){
            try {
                $query = $this->db->connect()->prepare('INSERT INTO seguridad (IDDOC,TIPO,SEDE,LUGAR,FECHA,INSPECCIONADO,RESPONSABLE,OBSER01,OBSER02,OBSER03,FOTO)
                                                     VALUES (:doc,:tip,:sed,:lug,:fec,:ins,:res,:ob1,:ob2,:ob3,:fot)');
                $query->execute(['doc'=>$datos['reg'],
                                 'tip'=>$datos['tipo'],
                                 'sed'=>$datos['sede'],
                                 'lug'=>$datos['luga'],
                                 'fec'=>$datos['fech'],
                                 'ins'=>$datos['insp'],
                                 'res'=>$datos['resp'],
                                 'ob1'=>$datos['obs0'],
                                 'ob2'=>$datos['obs1'],
                                 'ob3'=>$datos['obs2'],
                                 'fot'=>$datos['foto']]);
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function insertDetails($datos){
            try {
                $query = $this->db->connect()->prepare('INSERT INTO detseguridad (IDREG,IDDOC,CONDICION,CLASIFICACION,ACCION,RESPONSABLE,FECHA,SEGUIMIENTO)
                                                        VALUES(:reg,:doc,:con,:cla,:acc,:res,:fec,:seg)');
                
                $query->execute(['reg'=>$datos['sid'],
                                 'doc'=>$datos['idd'],
                                 'con'=>$datos['con'],
                                 'cla'=>$datos['cla'],
                                 'acc'=>$datos['acc'],
                                 'res'=>$datos['res'],
                                 'fec'=>$datos['fec'],
                                 'seg'=>$datos['seg']]);
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function enviarMail($sede) {
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
            $mail->addCC('mgarcia@sepcon.net', 'Inspeccion Planedad de Seguridad');
            $mail->addCC('svela@sepcon.net', 'Inspeccion Planedad de Seguridad');
            $mail->addCC('lramirez@sepcon.net', 'Inspeccion Planedad de Seguridad');

            if ( $sede == "01") {
                $mail->addCC('dponte@sepcon.net', 'Inspeccion de Seguridad');
                $mail->addCC('asalvador@sepcon.net', 'Inspeccion de Seguridad');
                $mail->addCC('asistente_ssma_whcp21@sepcon.net', 'Inspeccion de Seguridad');
                $mail->addCC('hguardia@sepcon.net', 'Inspeccion de Seguridad');
                $mail->addCC('ctomasello@sepcon.net', 'Inspeccion de Seguridad');
                $mail->addCC('rcarbonell@sepcon.net', 'Tarjetas Top');
            }elseif ( $sede == "03") {
                $mail->addCC('pguzman@sepcon.net', 'Inspeccion de Seguridad');
                $mail->addCC('jrobeiro@sepcon.net', 'Inspeccion de Seguridad');
                $mail->addCC('drios@sepcon.net', 'Inspeccion de Seguridad');
            }

            $mail->Subject = 'Inspeccion Planedad de Seguridad';
            $message  = "<html><body>";
            $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
            $message .= "<tr><td>";
            $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
            $message .= "<thead>
                <tr height='80'>
                <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:red; font-size:34px;' >Tarjeta TOP</th>
                </tr></thead>";
            $message .= "<tbody><tr>
                    <td colspan='4' style='padding:15px;'>
                        <p style='font-size:20px;'>Estimado(a):</p>
                        <hr />
                        <p style='font-size:25px;'>Se envia este mensaje de registro de inspeccion planeada de seguridad realizada</p>
                        <p style='font-size:25px;'>Detalle de la inspeccion de seguridad :</p>
                        <img src='public/img/mail.jpg' style='height:auto; width:100%; max-width:100%;'/>
                        <p style='font-size:15px; font-family:Verdana, Geneva, sans-serif; text-align: center; '>SSMMA - Registro Documentario</p>
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
    }
?>