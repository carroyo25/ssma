<?php
    class PanelModel extends Model {
        public function __construct()
        {
            parent::__construct();
        }

        public function getMonth(){
            $mes = ["ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SETIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE"];

            return $mes[date('n')-1];
        }

        public function getValuesTops()
        {
            $items = [];

            try {
                $query = $this->db->connect()->query("SELECT Count(tops.sede) AS tops,general.nombre AS sede
                                                        FROM tops
                                                        INNER JOIN general ON tops.sede = general.cod
                                                        WHERE general.clase = '00'
                                                        GROUP BY tops.sede
                                                        ORDER BY general.nombre ");
                while($row = $query->fetch()){
                    $item = $row['tops'];

                    array_push($items,$item);
                }

                return $items;
            } catch (PDOException $e) {
                return [];
            }
        }

        public function getSedesTops(){
            $items = [];

            try {
                $query = $this->db->connect()->query("SELECT Count(tops.sede) AS tops,general.nombre AS sede
                                                        FROM tops
                                                        INNER JOIN general ON tops.sede = general.cod
                                                        WHERE general.clase = '00'
                                                        GROUP BY tops.sede
                                                        ORDER BY general.nombre ");
                while($row = $query->fetch()){
                    $item = $row['sede'];

                    array_push($items,$item);
                }

                return $items;
            } catch (PDOException $e) {
                return [];
            }
        }
    }
?>