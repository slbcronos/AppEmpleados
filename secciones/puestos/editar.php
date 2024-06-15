<?php 
include("../../bd.php");
//para borrar el dato, se envia a la url por medio del boton el id a ser eliminado
if(isset($_GET['txtID'])){
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia = $conexion->prepare("SELECT * FROM tbl_puestos WHERE id =:id") ; // elimina el id seleccionado
    $sentencia->bindParam(':id',$txtID);
    $sentencia->execute();
    //echo ("<meta http-equiv='refresh' content='1'>"); //Refresh by HTTP 'meta'

    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    $nombredelpuesto=$registro["nombredelpuesto"];

}

if($_POST){

    //print_r($_POST);
    //recolectamos los datos del metodo post
    $txtID =(isset($_POST["txtID"])?$_POST["txtID"]:"");
    $nombredelpuesto =(isset($_POST["nombredelpuesto"])?$_POST["nombredelpuesto"]:"");
    //preparar la insercionn de datos
    $sentencia=$conexion->prepare("UPDATE tbl_puestos SET nombredelpuesto=:nombredelpuesto WHERE id=:id ");
    //asignamos los datos que vienen del post
    $sentencia->bindParam(':nombredelpuesto', $nombredelpuesto);
    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();
    header("Location:index.php");
 
    }

?>

<?php include ('../../templates/header.php'); ?>

<br />

<div class="card">
    <div class="card-header">Editar Puestos</div>
    <div class="card-body">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <div class="mb-3">
            <label for="txtID" class="form-label"><strong>ID:</strong></label>
            <input
            readonly
                value="<?php  echo $txtID; ?>"
                type="text"
                class="form-control"
                name="txtID"
                id="txtID"
                aria-describedby="helpId"
                placeholder="ID"

            />
          
        </div>
        
            <div class="mb-3">
                <label for="nombredelpuesto" class="form-label"><strong>Nombre del Puesto</strong></label>
                <input
                value="<?php  echo $nombredelpuesto; ?>"
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
                Actualizar
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