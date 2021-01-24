<?php
    class PreguntasModel extends Model{
        public function __construct()
        {
            parent::__construct();
        }

        public function insertQuestion($datos){
            try{
                $query = $this->db->connect()->prepare('INSERT INTO PREGUNTAS (CODPRE,PREGUNTA) 
                                        VALUES (:codigo,:pregunta)');
                $query->execute(['codigo'=>$datos['cod'],'pregunta'=>$datos['quest']]);


                return true;
            }catch(PDOException $e){
               echo $e->getMessage();
               return false;
            }
        }

        public function insertAnswer($datos){
            try{
                $query = $this->db->connect()->prepare('INSERT INTO RESPUESTAS (CODRES,CODPRE,RESPUESTA) 
                                        VALUES (:codres,:codpre,:respuesta)');
                $query->execute(['codres'=>$datos['codres'],'codpre' =>$datos['cod'],'respuesta' =>$datos['answ']]);

                return true;
            }catch(PDOException $e){
               echo $e->getMessage();
               return false;
            }
        }
    }
?>