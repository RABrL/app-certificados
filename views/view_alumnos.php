<?php 
    require_once '../templates/header.php';
    require_once '../controller/alumnoController.php';
    require_once '../controller/cursoController.php';
    require_once '../controller/alumno_cursoController.php';
    $alumno_cursoObj = new Alumno_cursoController();
    $alumnObj = new AlumnoController();
    $cursoObj = new CursoController();
    $alumnos = $alumnObj->list();
    $cursos = $cursoObj->list(); 
    
    
?>
<div class="col-md-5">
    <form method="post" action="alumnos.php" autocomplete="off">
        <div class="card">
            <div class="card-header">
                Alumnos
            </div>
            <div class="card-body">
                <div class="mb-3 d-none">
                  <label for="id" class="form-label">ID</label>
                  <input type="text" readonly value="<?php echo $_GET["id"] ?>"
                    class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="El ID se asigna automaticamente">
                </div>
                <div class="mb-3">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" value="<?php foreach($alumnos as $alumno):if($alumno['id'] == $_GET["id"]): echo $alumno['nombre']; break; endif; endforeach;?>" autofocus
                    class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Escriba su nombre..">
                </div>
                <div class="mb-3">
                  <label for="apellidos" class="form-label">Apellidos</label>
                  <input type="text" value="<?php foreach($alumnos as $alumno):if($alumno['id'] == $_GET["id"]): echo $alumno['apellido']; break; endif; endforeach;?>"
                    class="form-control" name="apellidos" id="apellidos" aria-describedby="helpId" placeholder="Escriba sus apellidos..">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Curso del alumno:</label>
                    <select multiple class="form-control" name="cursos[]" id="listaCursos">
                        <option disabled>Seleccione una opcion:</option>
                        <?php foreach($cursos as  $curso):?>
                        <option 
                        <?php 
                            $cursosAlumno = $alumno_cursoObj->listByAlumno($_GET["id"]);
                            if($cursosAlumno):
                                if(in_array($curso['id'],$cursosAlumno)):
                                    echo 'selected';
                                endif;
                            endif;
                            ?>
                        value="<?= $curso['id']?>"><?php echo $curso['nombre_curso']?></option>
                        <?php endforeach;?>
                    </select>
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
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cursos</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if($alumnos):?>
                <?php foreach($alumnos as $alumno):?>
                <tr class="">
                    <td scope="row"><?= $alumno['id'] ?></td>
                    <td scope="row"><?= $alumno['nombre'].' '.$alumno['apellido'] ?></td>
                    <td scope='row'>
                        <?php 
                        $cursos = $alumnObj->showCursos($alumno['id']);
                        foreach($cursos as $curso):?>
                        <a href="certificado.php?idCurso=<?php echo $curso['id']?>&idAlumno=<?php echo $alumno['id'] ?>"><i class="bi bi-file-pdf text-danger"></i> <?php echo $curso['nombre_curso'];?></a><br>
                        <?php endforeach;?>
                    </td>
                    <td scope='row'><a href='?id=<?= $alumno['id'] ?>' class="btn btn-info">Seleccionar</a></td>
                </tr>
                <?php endforeach;?>
                <?php else:?>
                    <tr>
                        <td colspan="3" class="text-center fw-lighter">No hay alumnos registrados</td>
                    </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

<script>
    let settings = {
		plugins: ['remove_button'],
		create: true,
		onItemAdd:function(){
			this.setTextboxValue('');
			this.refreshOptions();
		}
    };
    new TomSelect('#listaCursos',settings);
</script>

<?php 
    require_once '../templates/footer.php';
?>