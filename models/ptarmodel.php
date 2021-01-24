<?php
    class PtarModel extends Model {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($datos){
           try{ 
                $query = $this->db->connect()->prepare('INSERT INTO PTAR (iddoc,fechaElaboracion,proyecto,cliente,semana,
                                                                    fase,datosGeneralesPt,procedimientos,equipos,epp,
                                                                    listaVerificacion,explosividad,comprobacionEquipo,colindante,firmasIncompletasPt,
                                                                    noregistrohora,cierreInadecuado,datosGeneralesAst,analisisFaltante,descripcionFaltante,
                                                                    firmasIncompletasAst,numeropersonas,valoracion,peligros,medidasnoapropiadas,
                                                                    medidasinsuficientes,otros1,otros2,otros3,otros1Det,
                                                                    otros2Det,otros3Det,realizado,usuario)
                                                        VALUES (:iddoc,:fechaElaboracion,:proyecto,:cliente,:semana,
                                                                :fase,:datosGeneralesPt,:procedimientos,:equipos,:epp,
                                                                :listaVerificacion,:explosividad,:comprobacionEquipo,:colindante,:firmasIncompletasPt,
                                                                :noregistrohora,:cierreInadecuado,:datosGeneralesAst,:analisisFaltante,:descripcionFaltante,
                                                                :firmasIncompletasAst,:numeropersonas,:valoracion,:peligros,:medidasnoapropiadas,
                                                                :medidasinsuficientes,:otros1,:otros2,:otros3,:otros1Det,
                                                                :otros2Det,:otros3Det,:realizado,:usuario)');
                
                $query->execute(['iddoc'              => $datos['iddoc'],
                                'fechaElaboracion'    => $datos['fechaElaboracion'],
                                'proyecto'            => $datos['proyecto'],
                                'cliente'             => $datos['cliente'],
                                'semana'              => $datos['semana'],
                                'fase'                => $datos['fase'],
                                'datosGeneralesPt'    => $datos['datosGeneralesPt'],
                                'procedimientos'      => $datos['procedimientos'],
                                'equipos'             => $datos['equipos'],
                                'epp'                 => $datos['epp'],
                                'listaVerificacion'   => $datos['listaVerificacion'],
                                'explosividad'        => $datos['explosividad'],
                                'comprobacionEquipo'  => $datos['comprobacionEquipo'],
                                'colindante'          => $datos['colindante'],
                                'firmasIncompletasPt' => $datos['firmasIncompletasPt'],
                                'noregistrohora'      => $datos['noregistrohora'],
                                'cierreInadecuado'    => $datos['cierreInadecuado'],
                                'datosGeneralesAst'   => $datos['datosGeneralesAst'],
                                'analisisFaltante'    => $datos['analisisFaltante'],
                                'descripcionFaltante' => $datos['descripcionFaltante'],
                                'firmasIncompletasAst'=> $datos['firmasIncompletasAst'],
                                'numeropersonas'      => $datos['numeropersonas'],
                                'valoracion'          => $datos['valoracion'],
                                'peligros'            => $datos['peligros'],
                                'medidasnoapropiadas' => $datos['medidasnoapropiadas'],
                                'medidasinsuficientes'=> $datos['medidasinsuficientes'],
                                'otros1'              => $datos['otros1'],
                                'otros2'              => $datos['otros2'],
                                'otros3'              => $datos['otros3'],
                                'otros1Det'           => $datos['otros1Det'],
                                'otros2Det'           => $datos['otros2Det'],
                                'otros3Det'           => $datos['otros3Det'],
                                'realizado'           => $datos['realizado'],
                                'usuario'             => $datos['usuario']]);
                return true;
            }catch(PDOException $e){
               echo $e->getMessage();
               return false;
            }
        }

    }
?>