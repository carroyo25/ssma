<?php
    class Juegos extends Controller{
        function __construct()
        {
            parent::__construct();
        }

        function render(){
            session_start();
            $question = $this->model->getQuestion();

            $resp = $question->codigo;

            $answer = $this->model->getAnwers($resp);

            $this->view->pregunta = $question;
            $this->view->respuestas = $answer;

            $this->view->nombres = $_SESSION['nombres'];
            $this->view->usuario = $_SESSION['usuario'];

            $this->view->render('juegos/index');
        }

        function guardarScore(){
            $id               = uniqid();
            $usuario          = $_POST['user'];
            $pregunta         = $_POST['quest'];
            $respuesta        = $_POST['answer'];

            $this->model->saveAnswerTrivia(['id'=>$id,
                                            'usuario'   =>$usuario,
                                            'pregunta'  =>$pregunta,
                                            'respuesta' =>$respuesta]);
        }

        function QuestionTrivia(){
            $question = $this->model->getQuestion();

            $salidajson = array("IdQuest"=>$question->codigo,
                                "Question"=>$question->texto);

            echo json_encode($salidajson,JSON_UNESCAPED_UNICODE);
        }

        function AnwersTrivia(){
            $resp  = $_POST['respuesta'];

            $answer = $this->model->getAnwers($resp);

            $salidajson = array("CodAnswer01"=>$answer[0]->codigo,
                                "Answer01"=>$answer[0]->respuesta,
                                "CodAnswer02"=>$answer[1]->codigo,
                                "Answer02"=>$answer[1]->respuesta,
                                "CodAnswer03"=>$answer[2]->codigo,
                                "Answer03"=>$answer[2]->respuesta,
                                "CodAnswer04"=>$answer[3]->codigo,
                                "Answer04"=>$answer[3]->respuesta);
            
            echo json_encode($salidajson,JSON_UNESCAPED_UNICODE);
        }
    }
?>