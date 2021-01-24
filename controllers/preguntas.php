<?php
    class Preguntas extends Controller{
        function __construct()
        {
            parent::__construct();
        }

        function render(){
            session_start();

            $this->view->usuario = $_SESSION['usuario'];
            $this->view->codpreg = uniqid();
            $this->view->render('preguntas/index');
        }

        function guardarPregunta(){
            $c = uniqid();
            $q = $_POST['quest'];
            $a = $_POST['answ'];
            $r = uniqid();

            $this->model->insertQuestion(['cod'=>$c,'quest'=>$q]);
            $this->model->insertAnswer(['cod'=>$c,'codres'=>$r,'answ'=>$a,]);
        }
    }
?>