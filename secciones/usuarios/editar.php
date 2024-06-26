<?php 
include("../../bd.php");
//para borrar el dato, se envia a la url por medio del boton el id a ser eliminado
if(isset($_GET['txtID'])){
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia = $conexion->prepare("SELECT * FROM tbl_usuarios WHERE id =:id") ; // elimina el id seleccionado
    $sentencia->bindParam(':id',$txtID);
    $sentencia->execute();
    //echo ("<meta http-equiv='refresh' content='1'>"); //Refresh by HTTP 'meta'
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    $usuario=$registro["usuario"];
    $password=$registro["password"];
    $correo=$registro["correo"];

}
if ($_POST) {

    //print_r($_POST);
     //recoleccion de datos por metodo post
     $txtID =(isset($_POST['txtID'])?$_POST['txtID']:'');
     $usuario =(isset($_POST['usuario'])?$_POST['usuario']:'');
     $password =(isset($_POST['password'])?$_POST['password']:'');
     $correo =(isset($_POST['correo'])?$_POST['correo']:'');
 
     //Preparar la insercion de datos
     $sentencia=$conexion->prepare("UPDATE tbl_usuarios SET
     usuario=:usuario,
     password=:password,
     correo=:correo
     WHERE id=:id");

     //asignando los vales que bienen del metodo post, osea los del formulario
     $sentencia->bindParam(':usuario', $usuario);
     $sentencia->bindParam(':password', $password);
     $sentencia->bindParam(':correo', $correo);
     $sentencia->bindParam(':id', $txtID);
     $sentencia->execute();
     //echo ("<meta http-equiv='refresh' content='1'>"); //Refresh by HTTP 'meta'
     header("Location:index.php");
 }

?>

<?php include ('../../templates/header.php'); ?>

<br />
<div class="card">
    <div class="card-header"><strong>Datos del Usuario</strong></div>
    <div class="card-body">

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="txtID" class="form-label"><strong>ID:</strong></label>
                <input readonly value="<?php echo $txtID; ?>" type="text" class="form-control" name="txtID" id="txtID"
                    aria-describedby="helpId" placeholder="ID" />

            </div>
            <div class="mb-3">
                <label for="usuario" class="form-label"><strong>Nombre del usuario</strong></label>
                <input type="text" value="<?php echo $usuario; ?>" class="form-control" name="usuario" id="usuario" aria-describedby="helpId"
                    placeholder="Nombre del usuario">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label"><strong>Password</strong></label>
                <input type="password" value="<?php echo $password; ?>" class="form-control" name="password" id="password" aria-describedby="helpId"
                    placeholder="Escriba su contraseña">

            </div>
            <div class="mb-3">
                <label for="correo" class="form-label"><strong>Correo</strong></label>
                <input type="email" value="<?php echo $correo; ?>" class="form-control" name="correo" id="correo" aria-describedby="helpId"
                    placeholder="Escriba su correo">

            </div>


            <button type="submit" class="btn btn-primary">Agregar</button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>



        </form>
    </div>

</div>

<?php include ('../../templates/footer.php'); ?>