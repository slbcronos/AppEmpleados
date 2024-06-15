<?php 
include("../../bd.php");

//si hay un post
if($_POST){

//print_r($_POST);

//Recoleccion de datos del metodo POST
//validamos que la variable nombredepuesto es enviada por POST, ? SI NO, la variable esta "" (vacia).
$nombredelpuesto =(isset($_POST['nombredelpuesto'])?$_POST['nombredelpuesto']:'');

//Preparar la insercion de datos
$sentencia=$conexion->prepare("INSERT INTO `tbl_puestos` (`id`, `nombredelpuesto`) VALUES (NULL, :nombredelpuesto)");

//asignando los vales que bienen del metodo post, osea los del formulario
$sentencia->bindParam(':nombredelpuesto', $nombredelpuesto);
$sentencia->execute();
echo ("<meta http-equiv='refresh' content='1'>"); //Refresh by HTTP 'meta'

}

//print_r($lista_tbl_puestos);

?>

<?php include ('../../templates/header.php'); ?>

<br />

<div class="card">
    <div class="card-header">Puestos</div>
    <div class="card-body">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-3">
                <label for="nombredelpuesto" class="form-label"><strong>Nombre del Puesto</strong></label>
                <input
                    type="text"
                    class="form-control"
                    name="nombredelpuesto"
                    id="nombredelpuesto"
                    aria-describedby="helpId"
                    placeholder="Nombre del Puesto"
                />
            </div>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Agregar
            </button>

            <a
                name=""
                id=""
                class="btn btn-danger"
                href="index.php"
                role="button"
                >Cancelar
            </a>

        </form>
    </div>

</div>





<?php include ('../../templates/footer.php'); ?>