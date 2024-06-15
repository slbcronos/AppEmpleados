<?php 
include("../../bd.php");
//para borrar el dato, se envia a la url por medio del boton el id a ser eliminado
if(isset($_GET['txtID'])){
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia = $conexion->prepare("DELETE  FROM tbl_puestos WHERE id =:id") ; // elimina el id seleccionado
    $sentencia->bindParam(':id',$txtID);
    $sentencia->execute();
    echo ("<meta http-equiv='refresh' content='1'>"); //Refresh by HTTP 'meta'

}
/////////////////////////////////--------------------------------------------------------------

$sentencia = $conexion->prepare("SELECT * FROM tbl_puestos");
$sentencia->execute();
$lista_tbl_puestos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

//print_r($lista_tbl_puestos);

?>



<?php include ('../../templates/header.php'); ?>
<br/>
<div class="card">
    <div class="card-header">
        <a
            name=""
            id=""
            class="btn btn-primary"
            href="crear.php"
            role="button"
            >Agregar Registro</a
        >
        
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-secondary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre del Puesto</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach($lista_tbl_puestos as $puesto) { ?>

                    <tr class="">
                        <td scope="row"><?php  echo $puesto['id']; ?></td>
                        <td ><?php  echo $puesto['nombredelpuesto']; ?></td>
                        
                        <td>
                        <a
                            name=""
                            id=""
                            class="btn btn-primary"
                            href="editar.php?txtID= <?php echo $puesto['id']; ?>"

                            role="button"
                            >Editar</a
                        >
                        <a
                            name=""
                            id=""
                            class="btn btn-danger"
                            href="index.php?txtID= <?php echo $puesto['id']; ?>"

                            role="button"
                            >Eliminar</a
                        >
                        

                        </td>

                    </tr>

                    <?php }?>




                </tbody>
            </table>
        </div>

    </div>

</div>


<?php include ('../../templates/footer.php'); ?>