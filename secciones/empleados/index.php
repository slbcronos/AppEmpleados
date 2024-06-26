<?php
include ("../../bd.php");


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
            <table class="table table-primary">
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

                <?php foreach($lista_tbl_empleados as $empleado) { ?>
                    <tr class="">
                        <td><?php  echo $empleado['id']; ?></td>
                        <td>
                            <?php  echo $empleado['primernombre']; ?>
                            <?php  echo $empleado['segundonombre']; ?>
                            <?php  echo $empleado['primerapellido']; ?>
                            <?php  echo $empleado['segundoapellido']; ?>
                        </td>
                        <td>
                            <img src="./img/<?php  echo $empleado['foto']; ?>" alt="" class="img-fluid rounded" width="50"/>
                            
                        </td>
                        <td><?php  echo $empleado['cv']; ?></td>
                        <td><?php  echo $empleado['puesto']; ?></td>
                        <td><?php  echo $empleado['fechadeingreso']; ?></td>
                        <td>
                            <a name="" id="" class="btn btn-primary" href="#" role="button">Carta</a>
                            <a name="" id="" class="btn btn-warning" href="#" role="button">Editar</a>
                            <a name="" id="" class="btn btn-danger" href="#" role="button">Eliminar</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>


    </div>

</div>


<?php include ('../../templates/footer.php'); ?>