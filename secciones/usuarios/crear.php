<?php
include ("../../bd.php");

if ($_POST) {

   //print_r($_POST);
    //recoleccion de datos por metodo post
    $usuario =(isset($_POST['usuario'])?$_POST['usuario']:'');
    $password =(isset($_POST['password'])?$_POST['password']:'');
    $correo =(isset($_POST['correo'])?$_POST['correo']:'');

    //Preparar la insercion de datos
    $sentencia=$conexion->prepare("INSERT INTO `tbl_usuarios` (`id`, `usuario`, `password`, `correo`) VALUES (NULL, :usuario,:password,:correo)");
    //asignando los vales que bienen del metodo post, osea los del formulario
    $sentencia->bindParam(':usuario', $usuario);
    $sentencia->bindParam(':password', $password);
    $sentencia->bindParam(':correo', $correo);
    $sentencia->execute();
    //echo ("<meta http-equiv='refresh' content='1'>"); //Refresh by HTTP 'meta'
    $mensaje="Registro Creado";
header("Location:index.php?mensaje=".$mensaje);
}

?>

<?php include ('../../templates/header.php'); ?>

<br />
<div class="card">
    <div class="card-header"><strong>Datos del Usuario</strong></div>
    <div class="card-body">
        
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

    <div class="mb-3">
      <label for="usuario" class="form-label"><strong>Nombre del usuario</strong></label>
      <input type="text"
        class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Nombre del usuario">
    </div>

    <div class="mb-3">
      <label for="password" class="form-label"><strong>Password</strong></label>
      <input type="password"
        class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Escriba su contraseña">
    
    </div>
    <div class="mb-3">
      <label for="correo" class="form-label"><strong>Correo</strong></label>
      <input type="email"
        class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="Escriba su correo">
      
    </div>


    <button type="submit" class="btn btn-primary">Agregar</button>
    <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
    


    </form>
    </div>

</div>



<?php include ('../../templates/footer.php'); ?>