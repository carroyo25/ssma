<?php 
    class Panel extends Controller{
        function __construct()
        {
            parent::__construct();
        }

        function render(){
            session_start();

            $this->view->mensaje    = $_SESSION['iniciales'] ;
            $this->view->nivel      = $_SESSION['nivel'] ;
            $this->view->nombres    = $_SESSION['nombres'] ;
            $this->view->mes       = $this->model->getMonth();
            $this->view->sedes     = $this->model->getSedesTops();
            $this->view->valores   = $this->model->getValuesTops();

            $this->view->render('panel/index');
        }
    }
?>