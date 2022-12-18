<?php 

class Alumno_cursoModel{

    private $PDO;

    public function __construct()
    {
        require_once '../config/connection.php';
        $con = new Connection();
        $this->PDO = $con->connect();
    }

    public function insert($id_alumno, $id_curso){
        $sql = 'INSERT INTO alumnos_cursos VALUES(:id_curso,:id_alumno)';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':id_alumno',$id_alumno);
        $statement->bindParam(':id_curso',$id_curso);
        return $statement->execute();
    }

    public function listByAlumno($id_alumno)
    {
        $sql = 'SELECT id_curso FROM alumnos_cursos WHERE id_alumno=:id_alumno';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':id_alumno',$id_alumno);
        $statement->execute();
        $cursosAlumno = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($cursosAlumno as $curso){
            $arregloCursos[]=$curso['id_curso'];
        }
        return $arregloCursos;
    }

    public function delete($id_alumno){
        $sql = 'DELETE FROM alumnos_cursos WHERE id_alumno = :id_alumno';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':id_alumno',$id_alumno);
        $statement->execute();
    }
}


?>