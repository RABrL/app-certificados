<?php 
    require_once '../controller/alumnoController.php';
    require_once '../controller/alumno_cursoController.php';
    $alum_curObj = new Alumno_cursoController();
    $obj = new AlumnoController();
    
    if($_POST["nombre"]=='' || $_POST["apellidos"]==''){
        $_POST["accion"]='';
    } 

    switch ($_POST["accion"]) {
        case 'agregar':
            $id_alumno = $obj->insert($_POST["nombre"],$_POST["apellidos"]);//Recupero el Id del alumno que acabo de agregar a la db
            foreach($_POST["cursos"] as $curso){//Itero sobre el array de cursos que me trae el formulario para recuperar el id
                $alum_curObj->insert($id_alumno,$curso);// Inserto en la db de alumnos_cursos cuantos cursos halla en el array
            }
            header('location: view_alumnos.php');
            break;
        case 'editar':
            $obj->edit($_POST["id"],$_POST["nombre"],$_POST["apellidos"]);
            $alum_curObj->delete($_POST["id"]);
            foreach($_POST["cursos"] as $curso){//Itero sobre el array de cursos que me trae el formulario para recuperar el id
                $alum_curObj->insert($_POST["id"],$curso);// Inserto en la db de alumnos_cursos cuantos cursos halla en el array
            }
            break;
        case 'borrar':
            $obj->delete($_POST["id"]);
            break;
        default:
            header('location: view_alumnos.php');
            break;
    }
    ?>