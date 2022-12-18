<?php 

class AlumnoController{
    private $model;
    
    public function __construct()
    {
        require_once '../model/alumnoModel.php';
        $this->model = new AlumnoModel();
    }
    
    public function insert($nombre,$apellido)
    {
        $id_alumno = $this->model->insert($nombre,$apellido);
        return ($id_alumno) ? $id_alumno : header('location:view_alumnos.php') ;
    }

    public function list()
    {   
        return $this->model->list();
    }

    public function edit($id,$nombre,$apellido)
    {
        $this->model->edit($id,$nombre,$apellido);
    }

    public function delete($id)
    {
        return ($this->model->delete($id)) ? header('location:view_alumnos.php') : header('location:view_alumnos.php');
    }

    public function showCursos($id_alumno)
    {
        return $this->model->showCursos($id_alumno);
    }

    public function crearCertificado($id_alumno,$id_curso)
    {
        return $this->model->crearCertificado($id_alumno,$id_curso);
    }
}

?>