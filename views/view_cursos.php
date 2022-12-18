<?php 
    require_once '../templates/header.php';
    require_once '../controller/cursoController.php';
    $obj = new CursoController();
    $rows = $obj->list();
?>

<div class="col-md-5">
    <form method="post" action="cursos.php" autocomplete="off">
        <div class="card">
            <div class="card-header">
                Cursos
            </div>
            <div class="card-body">
                <div class="mb-3 d-none">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" readonly value='<?php echo $_GET["id"]?>'
                    class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="El ID se asigna automaticamente">
                </div>
                <div class="mb-3">
                    <label for="nombre_curso" class="form-label">Nombre</label>
                    <input type="text" required autofocus
                    value="<?php foreach($rows as $row):if($row['id'] == $_GET["id"]): echo $row['nombre_curso']; break; endif; endforeach;?>"
                    class="form-control" name="nombre_curso" id="nombre_curso" aria-describedby="helpId" placeholder="Nombre del curso">
                </div>
                <div class="btn-group" role="group" aria-label="Button group name">
                    <button type="submit" name='accion' value="agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name='accion' value="editar" class="btn btn-warning">Editar</button>
                    <button type="submit" name='accion' value="borrar" class="btn btn-danger">Borrar</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="col-md-7 mt-4">

    <div class="table-responsive">
        <table class="table table-light">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre del curso</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if($rows):?>
                    <?php foreach($rows as $row):?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['nombre_curso'] ?></td>
                            <td><a href='?id=<?= $row['id'] ?>' class="btn btn-info">Seleccionar</a></td>
                        </tr>
                    <?php endforeach;?> 
                    <?php else:?>
                        <tr>
                            <td colspan="3" class="text-center fw-lighter">No hay cursos disponibles</td>
                        </tr>   
                <?php endif;?>        
            </tbody>
        </table>
    </div>

</div>
<?php 
    require_once '../templates/footer.php';
?>