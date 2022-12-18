<?php 
    require_once '../controller/cursoController.php';
    $obj = new CursoController();
    switch ($_POST["accion"]) {
        case 'agregar':
            $obj->insert($_POST["nombre_curso"]);
            break;
        case 'editar':
            $obj->edit($_POST["id"],$_POST["nombre_curso"]);
            break;
        case 'borrar':
            $obj->delete($_POST["id"]);
            break;
        default:
            break;
    }
    
?>