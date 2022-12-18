<?php 

    class CursoController{
        private $model;

        public function __construct()
        {
            require_once '../model/cursoModel.php';
            $this->model = new CursoModel();
        }

        public function insert($nombre_curso)
        {
            $id = $this->model->insert($nombre_curso);
            return ($id) ? header('location:view_cursos.php') : header('location:view_cursos.php') ;
        }

        public function list()
        {   
            return ($this->model->list()) ? $this->model->list(): false ;
        }

        public function edit($id,$nombre_curso)
        {
            return ($this->model->edit($id,$nombre_curso)) ? header('location:view_cursos.php'): header('location:view_cursos.php');
        }

        public function delete($id)
        {
            return ($this->model->delete($id)) ? header('location:view_cursos.php') : header('location:view_cursos.php');
        }
    }

?>