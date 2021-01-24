<?php 
    class SuspencionModel extends Model {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($datos) {
            //var_dump($datos);

            try{ 
                $query = $this->db->connect()->prepare('INSERT INTO SUSPENCION (iddoc,proyecto,lugar,fase,responsable,
                                                                    cargo,fecha,hora,conduccion,ptar,
                                                                    confinados,energias,excavaciones,altura,caliente,
                                                                    izaje,otros,descripcion,acciones,riesgo,
                                                                    duracion,jefe,nropersonas,observaciones,usuario)
                                                        VALUES (:iddoc,:proyecto,:lugar,:fase,:responsable,
                                                                :cargo,:fecha,:hora,:conduccion,:ptar,
                                                                :confinados,:energias,:excavaciones,:altura,:caliente,
                                                                :izaje,:otros,:descripcion,:acciones,:riesgo,
                                                                :duracion,:jefe,:nropersonas,:observaciones,:usuario)');
                
                $query->execute([
                    'iddoc'         =>$datos['iddoc'],
                    'proyecto'      =>$datos['proyecto'],
                    'lugar'         =>$datos['lugar'],
                    'fase'          =>$datos['fase'],
                    'responsable'   =>$datos['responsable'],
                    'cargo'         =>$datos['cargo'],
                    'fecha'         =>$datos['fecha'],
                    'hora'          =>$datos['hora'],
                    'conduccion'    =>$datos['conduccion'],
                    'ptar'          =>$datos['ptar'],
                    'confinados'    =>$datos['confinados'],
                    'energias'      =>$datos['energias'],
                    'excavaciones'  =>$datos['excavaciones'],
                    'altura'        =>$datos['altura'],
                    'caliente'      =>$datos['caliente'],
                    'izaje'         =>$datos['izaje'],
                    'otros'         =>$datos['otros'],
                    'descripcion'   =>$datos['descripcion'],
                    'acciones'      =>$datos['acciones'],
                    'riesgo'        =>$datos['riesgo'],
                    'duracion'      =>$datos['duracion'],
                    'jefe'          =>$datos['jefe'],
                    'nropersonas'   =>$datos['nropersonas'],
                    'observaciones' =>$datos['observaciones'],
                    'usuario'       =>$datos['usuario'],
                ]);
                return true;
            }catch(PDOException $e){
               echo $e->getMessage();
               return false;
            }
        }
    }
?>