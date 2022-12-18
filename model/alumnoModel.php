<?php

class AlumnoModel{

    private $PDO;

    public function __construct()
    {
        require_once '../config/connection.php';
        $con = new Connection();
        $this->PDO = $con->connect();
    }

    public function insert($nombre, $apellido){
        $sql = 'INSERT INTO alumnos VALUES(null,:nombre,:apellido)';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':nombre',$nombre);
        $statement->bindParam(':apellido',$apellido);
        return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
    }

    public function list(){
        $sql = 'SELECT * FROM alumnos';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll(): false ;
    }

    public function edit($id,$nombre,$apellido)
    {
        $sql = 'UPDATE alumnos SET nombre =:nombre , apellido = :apellido WHERE id=:id';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':nombre',$nombre);
        $statement->bindParam(':apellido',$apellido);
        $statement->bindParam(':id',$id);
        return ($statement->execute()) ? $id : false ;
    }
    
    public function delete($id)
    {
        $sql = 'DELETE FROM alumnos WHERE id = :id';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':id',$id);
        return ($statement->execute()) ? true : false;
    }

    public function showCursos($id_alumno)
    {
        $sql = 'SELECT * FROM cursos WHERE id IN (SELECT id_curso FROM alumnos_cursos WHERE id_alumno=:id_alumno)';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':id_alumno',$id_alumno);
        return $statement->execute() ? $statement->fetchAll(): false;
    }

    public function crearCertificado($id_alumno,$id_curso)
    {
        $sql = 'SELECT alumnos.nombre, alumnos.apellido, cursos.nombre_curso FROM alumnos, cursos 
        WHERE alumnos.id = :id_alumno AND cursos.id = :id_curso';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':id_alumno',$id_alumno);
        $statement->bindParam(':id_curso',$id_curso);
        return $statement->execute() ? $statement->fetch(PDO::FETCH_ASSOC) : false;
    }
}


?>