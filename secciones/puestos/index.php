<?php 
include("../../bd.php");

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
                        
                        <td><input
                            name="btnEditar"
                            id="btnEditar"
                            class="btn btn-primary"
                            type="button"
                            value="Editar"
                        />
                        <input
                            name="btnEliminar"
                            id="btnEditar"
                            class="btn btn-danger"
                            type="button"
                            value="Eliminar"
                        />

                        </td>

                    </tr>

                    <?php }?>




                </tbody>
            </table>
        </div>

    </div>

</div>


<?php include ('../../templates/footer.php'); ?>