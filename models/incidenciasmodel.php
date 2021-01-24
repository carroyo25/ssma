<?php
    class Trabajador{
        public $apellidos;
        public $nombres;
        public $domicilio;
        public $sexo;
    }

    class IncidenciasModel extends Model{
        public function __construct()
        {
            parent::__construct();
        }

        public function getWorkerbyDni($dni){
            $items = [];

            try {
                $query = $this->db->connect()->query("SELECT
                                                        tabla_aquarius.internal,
                                                        tabla_aquarius.dni,
                                                        tabla_aquarius.apellidos,
                                                        tabla_aquarius.nombres,
                                                        tabla_aquarius.estado,
                                                        tabla_aquarius.ccostos,
                                                        tabla_aquarius.csede,
                                                        tabla_aquarius.dcostos,
                                                        tabla_aquarius.dcargo,
                                                        nomina.sexo,
                                                        nomina.sangre,
                                                        nomina.gsangre,
                                                        nomina.estado_civil,
                                                        SUBSTR( nomina.fecha_nacimiento, 1, 10 ) AS fnacimiento,
                                                        nomina.dsede,
                                                        nomina.edad,
                                                        nomina.direccion,
                                                        lugar.departamento AS depa_nacim,
                                                        ubigeo.departamento AS depa_dom,
                                                        ubigeo.provincia AS prov_dom,
                                                        ubigeo.distrito AS dist_dom 
                                                    FROM
                                                        tabla_aquarius
                                                        LEFT JOIN nomina ON tabla_aquarius.dni = nomina.dni
                                                        LEFT JOIN ubigeo AS lugar ON nomina.ubigeo_lnacimiento = lugar.ubigeo
                                                        LEFT JOIN ubigeo ON nomina.ubigeo_domicilio = ubigeo.ubigeo 
                                                    WHERE
                                                        tabla_aquarius.dni = '$dni'");
                
                while($row = $query->fetch()){
                    $items = $row;
                }

                return $items;
            } catch (PDOexception $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function insert($datos){
            try{ 
                $query = $this->db->connect()->prepare('INSERT INTO INCIDENCIAS (iddoc,proyecto,cliente,materialmenor,materialmayor,
                                                                                    derramemenor,derramemayor,conherido,sinherido,vehicularmenor,
                                                                                    vehicularmayor,fac,mto,rwc,lti,
                                                                                    ftl,incidente,eo,lugar,fecha,
                                                                                    hora,persona,documento,sexo,edad,
                                                                                    nacimiento,domicilio,civil,dpto,prov,
                                                                                    dist,cargo,instruccion,descripcion,acciones,
                                                                                    elaborado,usuario,foto)
                                                        VALUES (:iddoc,:proyecto,:cliente,:materialmenor,:materialmayor,
                                                                :derramemenor,:derramemayor,:conherido,:sinherido,:vehicularmenor,
                                                                :vehicularmayor,:fac,:mto,:rwc,:lti,
                                                                :ftl,:incidente,:eo,:lugar,:fecha,
                                                                :hora,:persona,:documento,:sexo,:edad,
                                                                :nacimiento,:domicilio,:civil,:dpto,:prov,
                                                                :dist,:cargo,:instruccion,:descripcion,:acciones,
                                                                :elaborado,:usuario,:foto)');
                $query->execute([
                    'iddoc'             => $datos['iddoc'],
                    'proyecto'          => $datos['proyecto'],
                    'cliente'           => $datos['cliente'],
                    'materialmenor'     => $datos['materialmenor'],
                    'materialmayor'     => $datos['materialmayor'],
                    'derramemenor'      => $datos['derramemenor'],
                    'derramemayor'      => $datos['derramemayor'],
                    'conherido'         => $datos['conherido'],
                    'sinherido'         => $datos['sinherido'],
                    'vehicularmenor'    => $datos['vehicularmenor'],
                    'vehicularmayor'    => $datos['vehicularmayor'],
                    'fac'               => $datos['fac'],
                    'mto'               => $datos['mto'],
                    'rwc'               => $datos['rwc'],
                    'lti'               => $datos['lti'],
                    'ftl'               => $datos['ftl'],
                    'incidente'         => $datos['incidente'],
                    'eo'                => $datos['eo'],
                    'lugar'             => $datos['lugar'],
                    'fecha'             => $datos['fecha'],
                    'hora'              => $datos['hora'],
                    'persona'           => $datos['persona'],
                    'documento'         => $datos['documento'],
                    'sexo'              => $datos['sexo'],
                    'edad'              => $datos['edad'],
                    'nacimiento'        => $datos['nacimiento'],
                    'domicilio'         => $datos['domicilio'],
                    'civil'             => $datos['civil'],
                    'dpto'              => $datos['dpto'],
                    'prov'              => $datos['prov'],
                    'dist'              => $datos['dist'],
                    'cargo'             => $datos['cargo'],
                    'instruccion'       => $datos['instruccion'],
                    'descripcion'       => $datos['descripcion'],
                    'acciones'          => $datos['acciones'],
                    'elaborado'         => $datos['elaborado'],
                    'usuario'           => $datos['usuario'],
                    'foto'              => $datos['foto']
                ]);
                return true;
            }catch(PDOException $e){
               echo $e->getMessage();
               return false;
            }
        }
    }
?>