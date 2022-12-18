<?php 
session_start();
if(!isset($_SESSION["usuario"])){
    header('location: ../index.php');
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    </head>

    <body>
        <header>
            <div class="container bg-dark">
                <nav class="navbar navbar-expand navbar-dark ">
                    <div class="nav navbar-nav">
                        <a class="nav-item nav-link active" href="index.php" aria-current="page">Inicio</a>
                        <a class="nav-item nav-link" href="view_alumnos.php">Alumnos</a>
                        <a class="nav-item nav-link" href="view_cursos.php">Cursos</a>
                        <a class="nav-item nav-link" href="close.php">Cerrar sesion</a>
                    </div>
                </nav>
            </div>
        </header>
        <main>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                

            
