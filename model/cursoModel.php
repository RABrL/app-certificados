<?php

    class CursoModel{

        private $PDO;

        public function __construct()
        {
            require_once '../config/connection.php';
            $con = new Connection();
            $this->PDO = $con->connect();
        }

        public function insert($nombre_curso){
            $sql = 'INSERT INTO cursos VALUES(null,:nombre)';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':nombre',$nombre_curso);
            return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
        }

        public function list(){
            $sql = 'SELECT * FROM cursos';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll(): false ;
        }

        public function edit($id,$nombre_curso)
        {
            $sql = 'UPDATE cursos SET nombre_curso = :nombre WHERE id=:id';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':nombre',$nombre_curso);
            $statement->bindParam(':id',$id);
            return ($statement->execute()) ? $id : false ;
        }
        
        public function delete($id)
        {
            $sql = 'DELETE FROM cursos WHERE id = :id';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':id',$id);
            return ($statement->execute()) ? true : false;
        }
    }


?>