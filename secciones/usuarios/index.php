<?php
include ("../../bd.php");
//para borrar el dato, se envia a la url por medio del boton el id a ser eliminado
if(isset($_GET['txtID'])){
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia = $conexion->prepare("DELETE  FROM tbl_usuarios WHERE id =:id") ; // elimina el id seleccionado
    $sentencia->bindParam(':id',$txtID);
    $sentencia->execute();
    echo ("<meta http-equiv='refresh' content='1'>"); //Refresh by HTTP 'meta'

}
/////////////////////////////////--------------------------------------------------------------


$sentencia = $conexion->prepare("SELECT * FROM tbl_usuarios");
$sentencia->execute();
$lista_tbl_usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);


?>

<?php include ('../../templates/header.php'); ?>

<br />
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Usuarios</a>

    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-secondary" id="tabla_id">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre del Usuario</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_tbl_usuarios as $usuario) { ?>
                        <tr class="">
                            <td scope="row"><?php echo $usuario['id']; ?></td>
                            <td><?php echo $usuario['usuario']; ?></td>
                            <td>*****</td>
                            <td><?php echo $usuario['correo']; ?></td>

                            <td>
                            <a
                            name=""
                            id=""
                            class="btn btn-primary"
                            href="editar.php?txtID= <?php echo $usuario['id']; ?>"

                            role="button"
                            >Editar</a
                        >
                        <a
                            name=""
                            id=""
                            class="btn btn-danger"
                            href="index.php?txtID= <?php echo $usuario['id']; ?>"

                            role="button"
                            >Eliminar</a
                        >
                    
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>


<?php include ('../../templates/footer.php'); ?>