<?php
    class GerencialModel extends Model {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($datos){
           try{
                $query = $this->db->connect()->prepare('INSERT INTO INSPECCION (iddoc,razonsocial,ruc,domicilio,acteconomica,
                                                                                responsable1,responsable2,responsable3,responsable4,nrotrabajadores,
                                                                                areasinspeccion,fechainspeccion,respinspeccion,planeada,noplaneada,
                                                                                otros,notas,visita,comedor,comedordet,
                                                                                cocina,cocinadet,catering,cateringdet,deposito,
                                                                                depositodet,alimentacion,alimentaciondet,consultorio,consultoriodet,
                                                                                medicamentos,medicamentosdet,dormitorios,dormitoriosdet,politicas,
                                                                                politicasdet,induccion,inducciondet,permiso,permisodet,
                                                                                ttop,topdet,planes,planesdet,epp,
                                                                                eppdet,campamento,campamentodet,areatrabajo,areatrabajodet,
                                                                                extintores,extintoresdet,maquinas,maquinasdet,protectores,
                                                                                protectoresdet,residuos,residuosdet,segregacion,segregaciondet,
                                                                                residuales,residualesdet,derrames,derramesdet,lubricantes,
                                                                                lubricantesdet,conclusiones,responsabletrabajo,responsablecargo,fecharegistro,
                                                                                usuario) 
                                                        VALUES (:iddoc,:razonsocial,:ruc,:domicilio,:acteconomica,
                                                                :responsable1,:responsable2,:responsable3,:responsable4,:nrotrabajadores,
                                                                :areasinspeccion,:fechainspeccion,:respinspeccion,:planeada,:noplaneada,
                                                                :otros,:notas,:visita,:comedor,:comedordet,
                                                                :cocina,:cocinadet,:catering,:cateringdet,:deposito,
                                                                :depositodet,:alimentacion,:alimentaciondet,:consultorio,:consultoriodet,
                                                                :medicamentos,:medicamentosdet,:dormitorios,:dormitoriosdet,:politicas,
                                                                :politicasdet,:induccion,:inducciondet,:permiso,:permisodet,
                                                                :ttop,:topdet,:planes,:planesdet,:epp,
                                                                :eppdet,:campamento,:campamentodet,:areatrabajo,:areatrabajodet,
                                                                :extintores,:extintoresdet,:maquinas,:maquinasdet,:protectores,
                                                                :protectoresdet,:residuos,:residuosdet,:segregacion,:segregaciondet,
                                                                :residuales,:residualesdet,:derrames,:derramesdet,:lubricantes,
                                                                :lubricantesdet,:conclusiones,:responsabletrabajo,:responsablecargo,:fecharegistro,
                                                                :usuario)');
                
                $query->execute(['iddoc'            =>$datos['iddoc'],
                                'razonsocial'       =>$datos['razonsocial'],
                                'ruc'               =>$datos['ruc'],
                                'domicilio'         =>$datos['domicilio'],
                                'acteconomica'      =>$datos['acteconomica'],
                                'responsable1'      =>$datos['responsable1'],
                                'responsable2'      =>$datos['responsable2'],
                                'responsable3'      =>$datos['responsable3'],
                                'responsable4'      =>$datos['responsable4'],
                                'nrotrabajadores'   =>$datos['nrotrabajadores'],
                                'areasinspeccion'   =>$datos['areasinspeccion'],
                                'fechainspeccion'   =>$datos['fechainspeccion'],
                                'respinspeccion'    =>$datos['respinspeccion'],
                                'planeada'          =>$datos['planeada'],
                                'noplaneada'        =>$datos['noplaneada'],
                                'otros'             =>$datos['otros'],
                                'notas'             =>$datos['notas'],
                                'visita'            =>$datos['visita'],
                                'comedor'           =>$datos['comedor'],
                                'comedordet'        =>$datos['comedordet'],
                                'cocina'            =>$datos['cocina'],
                                'cocinadet'         =>$datos['cocinadet'],
                                'catering'          =>$datos['catering'],
                                'cateringdet'       =>$datos['cateringdet'],
                                'deposito'          =>$datos['deposito'],
                                'depositodet'       =>$datos['depositodet'],
                                'alimentacion'      =>$datos['alimentacion'],
                                'alimentaciondet'   =>$datos['alimentaciondet'],
                                'consultorio'       =>$datos['consultorio'],
                                'consultoriodet'    =>$datos['consultoriodet'],
                                'medicamentos'      =>$datos['medicamentos'],
                                'medicamentosdet'   =>$datos['medicamentosdet'],
                                'dormitorios'       =>$datos['dormitorios'],
                                'dormitoriosdet'    =>$datos['dormitoriosdet'],
                                'politicas'         =>$datos['politicas'],
                                'politicasdet'      =>$datos['politicasdet'],
                                'induccion'         =>$datos['induccion'],
                                'inducciondet'      =>$datos['inducciondet'],
                                'permiso'           =>$datos['permiso'],
                                'permisodet'        =>$datos['permisodet'],
                                'ttop'              =>$datos['ttop'],
                                'topdet'            =>$datos['topdet'],
                                'planes'            =>$datos['planes'],
                                'planesdet'         =>$datos['planesdet'],
                                'epp'               =>$datos['epp'],
                                'eppdet'            =>$datos['eppdet'],
                                'campamento'        =>$datos['campamento'],
                                'campamentodet'     =>$datos['campamentodet'],
                                'areatrabajo'       =>$datos['areatrabajo'],
                                'areatrabajodet'    =>$datos['areatrabajodet'],
                                'extintores'        =>$datos['extintores'],
                                'extintoresdet'     =>$datos['extintoresdet'],
                                'maquinas'          =>$datos['maquinas'],
                                'maquinasdet'       =>$datos['maquinasdet'],
                                'protectores'       =>$datos['protectores'],
                                'protectoresdet'    =>$datos['protectoresdet'],
                                'residuos'          =>$datos['residuos'],
                                'residuosdet'       =>$datos['residuosdet'],
                                'segregacion'       =>$datos['segregacion'],
                                'segregaciondet'    =>$datos['segregaciondet'],
                                'residuales'        =>$datos['residuales'],
                                'residualesdet'     =>$datos['residualesdet'],
                                'derrames'          =>$datos['derrames'],
                                'derramesdet'       =>$datos['derramesdet'],
                                'lubricantes'       =>$datos['lubricantes'],
                                'lubricantesdet'    =>$datos['lubricantesdet'],
                                'conclusiones'      =>$datos['conclusiones'],
                                'responsabletrabajo'=>$datos['responsabletrabajo'],
                                'responsablecargo'  =>$datos['responsablecargo'],
                                'fecharegistro'     =>$datos['fecharegistro'],
                                'usuario'           =>$datos['usuario']]);
                return true;
            }catch(PDOException $e){
               echo $e->getMessage();
               return false;
            }
        }

    }
?>