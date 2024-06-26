<?php
include ("../../bd.php");

if($_POST){

    //print_r($_POST);
    //print_r($_FILES);

    //validamos que la variable nombredepuesto es enviada por POST, ? SI NO, la variable esta "" (vacia).
    $primernombre =(isset($_POST['primernombre'])?$_POST['primernombre']:'');
    $segundonombre =(isset($_POST['segundonombre'])?$_POST['segundonombre']:'');
    $primerapellido =(isset($_POST['primerapellido'])?$_POST['primerapellido']:'');
    $segundoapellido =(isset($_POST['segundoapellido'])?$_POST['segundoapellido']:'');

    $foto =(isset($_FILES['foto']['name'])?$_FILES['foto']['name']:'');
    $cv =(isset($_FILES['cv']['name'])?$_FILES['cv']['name']:'');

    $idpuesto =(isset($_POST['idpuesto'])?$_POST['idpuesto']:'');
    $fechadeingreso =(isset($_POST['fechadeingreso'])?$_POST['fechadeingreso']:'');

    //sentencia de agregar datos
    $sentencia=$conexion->prepare("INSERT INTO `tbl_empleados` (`id`, `primernombre`, `segundonombre`, `primerapellido`, `segundoapellido`, `foto`, `cv`, `idpuesto`, `fechadeingreso`) 
    VALUES (NULL, :primernombre, :segundonombre,:primerapellido,:segundoapellido,:foto,:cv,:idpuesto,:fechadeingreso);");

    $sentencia->bindParam(':primernombre', $primernombre);
    $sentencia->bindParam(':segundonombre', $segundonombre);
    $sentencia->bindParam(':primerapellido', $primerapellido);
    $sentencia->bindParam(':segundoapellido', $segundoapellido);
        //adjuntar foto
        $fecha_=new DateTime();
        $nombreArchivo_foto = ($foto!='')?$fecha_->getTimestamp() . "_" . $_FILES['foto']['name']:"";
        $tmp_foto = $_FILES['foto']['tmp_name'];    
        if ($tmp_foto!='') {
            move_uploaded_file($tmp_foto, "./img/".$nombreArchivo_foto);
        }
    $sentencia->bindParam(':foto', $nombreArchivo_foto);

    
    $nombreArchivo_cv = ($cv!='')?$fecha_->getTimestamp() . "_" . $_FILES['cv']['name']:"";
    $tmp_cv = $_FILES['cv']['tmp_name'];    
    if ($tmp_cv!='') {
        move_uploaded_file($tmp_cv, "./pdf/".$nombreArchivo_cv);
    }
    $sentencia->bindParam(':cv', $nombreArchivo_cv);
    $sentencia->bindParam(':idpuesto', $idpuesto);
    $sentencia->bindParam(':fechadeingreso', $fechadeingreso);

    $sentencia->execute();


}

//selector para puestos
$sentencia = $conexion->prepare("SELECT * FROM tbl_puestos");
$sentencia->execute();
$lista_tbl_puestos = $sentencia->fetchAll(PDO::FETCH_ASSOC);


?>

<?php include ('../../templates/header.php'); ?>
<br/>
<div class="card">
    <div class="card-header"><strong>Datos del Empleado</strong></div>
    <div class="card-body">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="primernombre" class="form-label"><strong>Primer nombre</strong></label>
            <input
                type="text"
                class="form-control"
                name="primernombre"
                id="primernombre"
                aria-describedby="helpId"
                placeholder="Primer nombre"
            />
        </div>

        <div class="mb-3">
            <label for="segundonombre" class="form-label"><strong>Segundo nombre</strong></label>
            <input
                type="text"
                class="form-control"
                name="segundonombre"
                id="segundonombre"
                aria-describedby="helpId"
                placeholder="Segundo nombre"
            />
        </div>

        <div class="mb-3">
            <label for="primerapellido" class="form-label"><strong>Primer Apellido</strong></label>
            <input
                type="text"
                class="form-control"
                name="primerapellido"
                id="primerapellido"
                aria-describedby="helpId"
                placeholder="Primer Apellido"
            />
        </div>

        <div class="mb-3">
            <label for="segundoapellido" class="form-label"><strong>Segundo Apellido</strong></label>
            <input
                type="text"
                class="form-control"
                name="segundoapellido"
                id="segundoapellido"
                aria-describedby="helpId"
                placeholder="Segundo Apellido"
            />
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label"><strong>Foto</strong></label>
            <input
                type="file"
                class="form-control"
                name="foto"
                id="foto"
                aria-describedby="helpId"
                placeholder="Foto"
            />
        </div>

        <div class="mb-3">
            <label for="cv" class="form-label"><strong>CV(PDF)</strong></label>
            <input
                type="file"
                class="form-control"
                name="cv"
                id="cv"
                aria-describedby="helpId"
                placeholder="CV"
            />
        </div>

        <div class="mb-3">
            <label for="idpuesto" class="form-label"><strong>Puesto</strong></label>
            <select class="form-select form-select-sm"name="idpuesto"id="idpuesto">
            <?php foreach($lista_tbl_puestos as $puesto) { ?>
                <option value="<?php echo $puesto['id']; ?>">
                    <?php echo $puesto['nombredelpuesto']; ?></option>

                <?php }?>
            </select>
            
        </div>
        
        <div class="mb-3">
            <label for="fechadeingreso" class="form-label"><strong>Fecha de Ingreso</strong></label>
            <input
                type="date"
                class="form-control"
                name="fechadeingreso"
                id="fechadeingreso"
                aria-describedby="emailHelpId"
                placeholder="Fecha de ingreso a la empresa"
            />
            
        </div>
        
        <button
            type="submit"
            class="btn btn-primary"
        >
            Agregar Registro
        </button>

        <a
            name=""
            id=""
            class="btn btn-danger"
            href="index.php"
            role="button"
            >Cancelar</a
        >
        
        
        
        </form>

    </div>
  
</div>


<?php include ('../../templates/footer.php'); ?>