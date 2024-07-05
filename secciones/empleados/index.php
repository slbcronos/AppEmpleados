<?php
include ("../../bd.php");

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    //buscar archivo relacionado con empleados
    $sentencia = $conexion->prepare("SELECT foto,cv FROM `tbl_empleados` WHERE id=:id");
    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();
    $registro_recuperado = $sentencia->fetch(PDO::FETCH_LAZY);

    //print_r($registro_recuperado);

    if(isset($registro_recuperado["foto"])&&$registro_recuperado["foto"]!=""){
        if (file_exists("./img/".$registro_recuperado["foto"])) {
            unlink("./img/".$registro_recuperado["foto"]);
            # code...
        }

    }
    if(isset($registro_recuperado["cv"])&&$registro_recuperado["cv"]!=""){
        if (file_exists("./pdf/".$registro_recuperado["cv"])) {
            unlink("./pdf/".$registro_recuperado["cv"]);
            # code...
        }

    }
 

    
    $sentencia = $conexion->prepare("DELETE  FROM tbl_empleados WHERE id =:id"); // elimina el id seleccionado
    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();
    //echo ("<meta http-equiv='refresh' content='1'>"); //Refresh by HTTP 'meta'
    $mensaje="Registro Eliminado";
    header("Location:index.php?mensaje=".$mensaje);
    
}


$sentencia = $conexion->prepare("SELECT *,
(SELECT nombredelpuesto 
FROM tbl_puestos 
WHERE tbl_puestos.id=tbl_empleados.idpuesto limit 1  ) as puesto 
FROM tbl_empleados");

$sentencia->execute();
$lista_tbl_empleados = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>


<?php include ('../../templates/header.php'); ?>

<br />


<div class="card">
    <div class="card-header">

        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Crear nuevo Empleado</a>

    </div>
    <div class="card-body">

        <div class="table-responsive-sm">
            <table class="table table-primary" id="tabla_id">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Foto</th>
                        <th scope="col">CV</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">Fecha Ingreso</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($lista_tbl_empleados as $empleado) { ?>
                        <tr class="">
                            <td><?php echo $empleado['id']; ?></td>
                            <td>
                                <?php echo $empleado['primernombre']; ?>
                                <?php echo $empleado['segundonombre']; ?>
                                <?php echo $empleado['primerapellido']; ?>
                                <?php echo $empleado['segundoapellido']; ?>
                            </td>
                            <td>
                                <img src="./img/<?php echo $empleado['foto']; ?>" alt="" class="img-fluid rounded"
                                    width="90" />

                            </td>
                            <td>
                                <a href="./pdf/<?php echo $empleado['cv']; ?>">
                                <?php echo $empleado['cv']; ?>
                                </a>
                                
                            </td>
                            <td><?php echo $empleado['puesto']; ?></td>
                            <td><?php echo $empleado['fechadeingreso']; ?></td>
                            <td>
                                <a name="" id="" class="btn btn-primary" href="carta_recomendacion.php?txtID= <?php echo $empleado['id']; ?>" role="button">Carta
                                    
                                </a>
                                <a name="" id="" class="btn btn-primary"
                                    href="editar.php?txtID= <?php echo $empleado['id']; ?>" role="button">Editar</a>
                                <a name="" id="" class="btn btn-danger"
                                    href="javascript:borrar(<?php echo $empleado['id']; ?>);" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


    </div>

</div>


<?php include ('../../templates/footer.php'); ?>