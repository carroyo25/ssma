<?php
    require_once 'models/questions.php';
    require_once 'models/anwers.php';

    class JuegosModel extends Model{
        public $codigoPregunta;

        public function __construct()
        {
            parent::__construct();
        }

        public function getQuestion(){
           $item = new Pregunta();

            try{
                $query = $this->db->connect()->query("SELECT codpre, pregunta FROM preguntas ORDER BY RAND() LIMIT 1");
                
                while($row = $query->fetch()){
                    $item->codigo = $row["codpre"];
                    $item->texto  = $row["pregunta"];
                }

                return $item;
            }catch(PDOException $e){
                return [];
            }
        }

        public function getAnwers($resp){
            $items=[];
            $item = new Respuesta();

            try{
                $query = $this->db->connect()->query("SELECT * FROM respuestas WHERE codpre = '$resp'");
                while($row = $query->fetch()){

                    $item->codigo = $row["codpre"];
                    $item->respuesta = $row["respuesta"];

                    array_push($items,$item);
                }

                $query = $this->db->connect()->query("SELECT * FROM respuestas WHERE codpre != '$resp' ORDER BY RAND() LIMIT 3");
                  
                while($row = $query->fetch()){
                    $item = new Respuesta();

                    $item->codigo = $row["codpre"];
                    $item->respuesta = $row["respuesta"];

                    array_push($items,$item);
                }

                shuffle($items);
                
                return $items;

            }catch(PDOException $e){
                return [];
            }

        }

        public function saveAnswerTrivia($datos) {
            try{
                $query = $this->db->connect()->prepare('INSERT INTO TRIVIA (IDREG,USUARIO,PREGUNTA,RESPUESTA) 
                                        VALUES (:id,:usuario,:pregunta,:respuesta)');
                $query->execute(['id'           =>$datos['id'],
                                 'usuario'      =>$datos['usuario'],
                                 'pregunta'     =>$datos['pregunta'],
                                 'respuesta'    =>$datos['respuesta'],
                                 ]);
                return true;
            }catch(PDOException $e){
               echo $e->getMessage();
               return false;
            }
        }
    }
?>