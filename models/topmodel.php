<?php
    class Topmodel extends Model{
        public function __construct()
        {
            parent::__construct();
        }

        public function getAreas(){
            try {
                $salida = '<option value="-1" class="oculto">Seleccione Opción</option>';
                $query = $this->db->connect()->query("SELECT idubic,descripcion FROM areas_trabajo WHERE idarea = 00");
                $query->execute();
                $rowcount = $query->rowcount();

                if ($rowcount > 0) {
                    while($row = $query->fetch()){
                        $salida .='<option value="'.$row['idubic'].'">'.strtoupper($row['descripcion']).'</option>';
                    }
                }

                return $salida;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getUbics($area) {
            try {
                $salida = '<option value="-1" class="oculto">Seleccione Opción</option>';
                $query = $this->db->connect()->prepare("SELECT idubic,descripcion FROM areas_trabajo WHERE idarea != 00 AND idubic=:area");
                $query->execute(["area"=>$area]);
                $rowcount = $query->rowcount();

                if ($rowcount > 0) {
                    while($row = $query->fetch()){
                        $salida .='<option value="'.$row['idarea'].'">'.strtoupper($row['descripcion']).'</option>';
                    }
                }

                return $salida;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function insert($datos){
            try{
                $query = $this->db->connect()->prepare('INSERT INTO TOPS (IDTOP,SEDE,LUGAR,REPORTADO,FECHA,
                                                                            OBSERVACION,ACTINS,CONINS,ACTSEG,RELACION,
                                                                            DESCRIPCION,MEDIDAS,POTENCIAL,CONEPP,TIPEPP,
                                                                            OTROS,AREA,FOTO,IDUSER) 
                                        VALUES (:idtop,:sede,:lugar,:reportado,:fecha,
                                                :observacion,:acsues,:cosues,:actseg,:relacion,
                                                :preventiva,:correctiva,:perdida,:conepp,:tipepp,
                                                :otros,:area,:foto,:user)');
                $query->execute(['idtop'    =>$datos['idtop'],
                                 'sede'     =>$datos['sede'],
                                 'lugar'    =>$datos['lugar'],
                                 'reportado'=>$datos['reportado'],
                                 'fecha'    =>$datos['fecha'],
                                 'observacion'=>$datos['observacion'],
                                 'acsues'   =>$datos['acsues'],
                                 'cosues'   =>$datos['cosues'],
                                 'actseg'   =>$datos['actseg'],
                                 'otros'    =>$datos['otros'],
                                 'relacion' =>$datos['relacion'],
                                 'tipepp'   =>$datos['tipepp'],
                                 'conepp'   =>$datos['conepp'],
                                 'preventiva'=>$datos['preventiva'],
                                 'correctiva'=>$datos['correctiva'],
                                 'perdida'   =>$datos['perdida'],
                                 'area'      =>$datos['area'],
                                 'foto'      =>$datos['foto'],
                                 'user'      =>$datos['user']
                                 ]);
                return true;
            }catch(PDOException $e){
               echo $e->getMessage();
               return false;
            }
        }

        public function insertMovil($datos){
            try{
                $query = $this->db->connect()->prepare('INSERT INTO TOPS (IDTOP,SEDE,LUGAR,REPORTADO,FECHA,
                                                                            OBSERVACION,ACTINS,CONINS,ACTSEG,RELACION,
                                                                            DESCRIPCION,MEDIDAS,POTENCIAL,CONEPP,TIPEPP,
                                                                            OTROS,AREA,FOTO,IDUSER) 
                                            VALUES (:idtop,:sede,:lugar,:reportado,:fecha,
                                                :observacion,:acsues,:cosues,:actseg,:relacion,
                                                :preventiva,:correctiva,:perdida,:conepp,:tipepp,
                                                :otros,:area,:foto,:user)');
                $query->execute(['idtop'        =>$datos['idtop'],
                                 'sede'         =>str_pad($datos['sede'],2,"0",STR_PAD_LEFT),
                                 'lugar'        =>$datos['lugar'],
                                 'reportado'    =>$datos['reportado'],
                                 'fecha'        =>$datos['fecha'],
                                 'observacion'  =>str_pad($datos['observacion'],2,"0",STR_PAD_LEFT),
                                 'acsues'       =>str_pad($datos['acsues'],2,"0",STR_PAD_LEFT),
                                 'cosues'       =>str_pad($datos['cosues'],2,"0",STR_PAD_LEFT),
                                 'actseg'       =>str_pad($datos['actseg'],2,"0",STR_PAD_LEFT),
                                 'otros'        =>$datos['otros'],
                                 'relacion'     =>str_pad($datos['relacion'],2,"0",STR_PAD_LEFT),
                                 'tipepp'       =>str_pad($datos['tipepp'],2,"0",STR_PAD_LEFT),
                                 'conepp'       =>str_pad($datos['conepp'],2,"0",STR_PAD_LEFT),
                                 'preventiva'   =>$datos['preventiva'],
                                 'correctiva'   =>$datos['correctiva'],
                                 'perdida'      =>str_pad($datos['perdida'],2,"0",STR_PAD_LEFT),
                                 'area'         =>str_pad($datos['area'],2,"0",STR_PAD_LEFT),
                                 'foto'         =>substr($datos['foto'],strlen($datos['foto'])-23),
                                 'user'         =>$datos['user']
                                 ]);
                return true;
            }catch(PDOException $e){
               echo $e->getMessage();
               return false;
            }            
        }

        public function enviarMail($mensaje,$sede){
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
            $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');

            if ( $sede == "01") {
                $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
                $mail->addCC('asistente_ssma_whcp21@sepcon.net', 'Tarjetas Top');
                $mail->addCC('hguardia@sepcon.net', 'Tarjetas Top');
                $mail->addCC('ctomasello@sepcon.net', 'Tarjetas Top');
                $mail->addCC('svela@sepcon.net', 'Tarjetas Top');
                $mail->addCC('rcarbonell@sepcon.net', 'Tarjetas Top');
                $mail->addCC('sreyes@sepcon.net', 'Tarjetas Top');
            }elseif ( $sede == "03") {
                $mail->addCC('pguzman@sepcon.net', 'Tarjetas Top');
                $mail->addCC('jrobeiro@sepcon.net', 'Tarjetas Top');
                $mail->addCC('drios@sepcon.net', 'Tarjetas Top');
            }
            $mail->Subject = 'Tarjeta Top - Potencial Alto';
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
                        <p style='font-size:25px;'>Se envia este mensaje de registro de Tarjeta TOP con potencial alto</p>
                        <p style='font-size:25px;'>Detalle de la observación preventiva :</p>
                        <p style='font-size:25px;'>$mensaje</p>
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