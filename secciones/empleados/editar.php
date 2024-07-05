<?php
include ("../../bd.php");

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    $sentencia = $conexion->prepare("SELECT * FROM tbl_empleados WHERE id =:id"); // elimina el id seleccionado
    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();


    $registro = $sentencia->fetch(PDO::FETCH_LAZY);


    $primernombre = $registro["primernombre"];
    $segundonombre = $registro["segundonombre"];
    $primerapellido = $registro["primerapellido"];
    $segundoapellido = $registro["segundoapellido"];

    $foto = $registro["foto"];
    $cv = $registro["cv"];

    $idpuesto = $registro["idpuesto"];
    $fechadeingreso = $registro["fechadeingreso"];

    //selector para puestos
    $sentencia = $conexion->prepare("SELECT * FROM tbl_puestos");
    $sentencia->execute();
    $lista_tbl_puestos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

}
if ($_POST) {


    //validamos que la variable nombredepuesto es enviada por POST, ? SI NO, la variable esta "" (vacia).
    $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $primernombre = (isset($_POST['primernombre']) ? $_POST['primernombre'] : '');
    $segundonombre = (isset($_POST['segundonombre']) ? $_POST['segundonombre'] : '');
    $primerapellido = (isset($_POST['primerapellido']) ? $_POST['primerapellido'] : '');
    $segundoapellido = (isset($_POST['segundoapellido']) ? $_POST['segundoapellido'] : '');
    $idpuesto = (isset($_POST['idpuesto']) ? $_POST['idpuesto'] : '');
    $fechadeingreso = (isset($_POST['fechadeingreso']) ? $_POST['fechadeingreso'] : '');

    //sentencia de modificar datos
    $sentencia = $conexion->prepare("
    UPDATE tbl_empleados 
    SET 
        primernombre=:primernombre,
        segundonombre=:segundonombre,
        primerapellido=:primerapellido,
        segundoapellido=:segundoapellido,
        idpuesto=:idpuesto,
        fechadeingreso=:fechadeingreso
    WHERE id=:id
    ");

    $sentencia->bindParam(':primernombre', $primernombre);
    $sentencia->bindParam(':segundonombre', $segundonombre);
    $sentencia->bindParam(':primerapellido', $primerapellido);
    $sentencia->bindParam(':segundoapellido', $segundoapellido);
    $sentencia->bindParam(':idpuesto', $idpuesto);
    $sentencia->bindParam(':fechadeingreso', $fechadeingreso);
    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();


    //Actualizar la Foto
    $foto = (isset($_FILES['foto']['name']) ? $_FILES['foto']['name'] : '');

    $fecha_ = new DateTime();
    $nombreArchivo_foto = ($foto != '') ? $fecha_->getTimestamp() . "_" . $_FILES['foto']['name'] : "";
    $tmp_foto = $_FILES['foto']['tmp_name'];
    if ($tmp_foto != '') {
        move_uploaded_file($tmp_foto, "./img/" . $nombreArchivo_foto);
        //busca la foto antigua
        $sentencia = $conexion->prepare("SELECT foto FROM `tbl_empleados` WHERE id=:id");
        $sentencia->bindParam(':id', $txtID);
        $sentencia->execute();
        $registro_recuperado = $sentencia->fetch(PDO::FETCH_LAZY);

        if (isset($registro_recuperado["foto"]) && $registro_recuperado["foto"] != "") {
            if (file_exists("./img/" . $registro_recuperado["foto"])) {
                unlink("./img/" . $registro_recuperado["foto"]);
            }
        }

        $sentencia = $conexion->prepare("UPDATE tbl_empleados SET foto=:foto WHERE id=:id");
        $sentencia->bindParam(':foto', $nombreArchivo_foto);
        $sentencia->bindParam(':id', $txtID);
        $sentencia->execute();
    }
    //fin fotos

    //Actualizar la cv
    $cv = (isset($_FILES['cv']['name']) ? $_FILES['cv']['name'] : '');

    $nombreArchivo_cv = ($cv != '') ? $fecha_->getTimestamp() . "_" . $_FILES['cv']['name'] : "";
    $tmp_cv = $_FILES['cv']['tmp_name'];
    if ($tmp_cv != '') {
        move_uploaded_file($tmp_cv, "./pdf/" . $nombreArchivo_cv);

        //buscar archivo relacionado con empleados
        $sentencia = $conexion->prepare("SELECT cv FROM `tbl_empleados` WHERE id=:id");
        $sentencia->bindParam(':id', $txtID);
        $sentencia->execute();
        $registro_recuperado = $sentencia->fetch(PDO::FETCH_LAZY);

        if (isset($registro_recuperado["cv"]) && $registro_recuperado["cv"] != "") {
            if (file_exists("./pdf/" . $registro_recuperado["cv"])) {
                unlink("./pdf/" . $registro_recuperado["cv"]);
                # code...
            }
        }

        $sentencia = $conexion->prepare("UPDATE tbl_empleados SET cv=:cv WHERE id=:id");
        $sentencia->bindParam(':cv', $nombreArchivo_cv);
        $sentencia->bindParam(':id', $txtID);
        $sentencia->execute();
    }

    $mensaje="Registro Actualizado";
    header("Location:index.php?mensaje=".$mensaje);
    //echo ("<meta http-equiv='refresh' content='1'>"); //Refresh by HTTP 'meta'

}

?>

<?php include ('../../templates/header.php'); ?>

<br />
<div class="card">
    <div class="card-header"><strong>Datos del Empleado</strong></div>
    <div class="card-body">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="txtID" class="form-label"><strong>ID:</strong></label>
                <input readonly value="<?php echo $txtID; ?>" type="text" class="form-control" name="txtID" id="txtID"
                    aria-describedby="helpId" placeholder="ID" />

            </div>

            <div class="mb-3">
                <label for="primernombre" class="form-label"><strong>Primer nombre</strong></label>
                <input value="<?php echo $primernombre; ?>" type="text" class="form-control" name="primernombre"
                    id="primernombre" aria-describedby="helpId" placeholder="Primer nombre" />
            </div>

            <div class="mb-3">
                <label for="segundonombre" class="form-label"><strong>Segundo nombre</strong></label>
                <input value="<?php echo $segundonombre; ?>" type="text" class="form-control" name="segundonombre"
                    id="segundonombre" aria-describedby="helpId" placeholder="Segundo nombre" />
            </div>

            <div class="mb-3">
                <label for="primerapellido" class="form-label"><strong>Primer Apellido</strong></label>
                <input value="<?php echo $primerapellido; ?>" type="text" class="form-control" name="primerapellido"
                    id="primerapellido" aria-describedby="helpId" placeholder="Primer Apellido" />
            </div>

            <div class="mb-3">
                <label for="segundoapellido" class="form-label"><strong>Segundo Apellido</strong></label>
                <input value="<?php echo $segundoapellido; ?>" type="text" class="form-control" name="segundoapellido"
                    id="segundoapellido" aria-describedby="helpId" placeholder="Segundo Apellido" />
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label"><strong>Foto</strong></label>
                <br />
                <img class="img-fluid" src="./img/<?php echo $foto; ?>" width="150" alt="Foto" />
                <br /><br />
                <input type="file" class="form-control" name="foto" id="foto" aria-describedby="helpId"
                    placeholder="Foto" />
            </div>

            <div class="mb-3">
                <label for="cv" class="form-label"><strong>CV(PDF)</strong></label>
                <br />
                <a href="./pdf/<?php echo $cv; ?>">./pdf/<?php echo $cv; ?></a>
                <br /><br />
                <input type="file" class="form-control" name="cv" id="cv" aria-describedby="helpId" placeholder="CV" />
            </div>

            <div class="mb-3">
                <label for="idpuesto" class="form-label"><strong>Puesto</strong></label>

                <select class="form-select form-select-sm" name="idpuesto" id="idpuesto">
                    <?php foreach ($lista_tbl_puestos as $puesto) { ?>
                        <option <?php echo ($idpuesto == $puesto['id']) ? "selected" : "" ?>
                            value="<?php echo $puesto['id']; ?>">
                            <?php echo $puesto['nombredelpuesto']; ?>
                        </option>

                    <?php } ?>
                </select>

            </div>

            <div class="mb-3">
                <label for="fechadeingreso" class="form-label"><strong>Fecha de Ingreso</strong></label>
                <input value="<?php echo $fechadeingreso; ?>" type="date" class="form-control" name="fechadeingreso"
                    id="fechadeingreso" aria-describedby="emailHelpId" placeholder="Fecha de ingreso a la empresa" />

            </div>

            <button type="submit" class="btn btn-primary">
                Actualizar Registro
            </button>

            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>

        </form>

    </div>

</div>

<?php include ('../../templates/footer.php'); ?>