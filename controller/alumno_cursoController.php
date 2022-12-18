<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class Alumno_cursoController{
    private $model;
    
    public function __construct()
    {
        require_once '../model/alumno_cursoModel.php';
        $this->model = new Alumno_cursoModel();
    }

    public function insert($id_alumno,$id_curso)
    {
        $this->model->insert($id_alumno,$id_curso);
    }

    public function listByAlumno($id_alumno){
        return $this->model->listByAlumno($id_alumno);
    }

    public function delete($id_alumno)
    {
        $this->model->delete($id_alumno);
        header('location: view_alumnos.php');
    }
}

?>