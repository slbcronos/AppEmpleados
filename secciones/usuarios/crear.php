<?php include ('../../templates/header.php'); ?>

<br/>
<div class="card">
    <div class="card-header">Datos del Usuario</div>
    <div class="card-body">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombredelusuario" class="form-label"><strong>Nombre del Usuario</strong></label>
                <input
                    type="text"
                    class="form-control"
                    name="nombredelusuario"
                    id="nombredelusuario"
                    aria-describedby="helpId"
                    placeholder="Nombre del Usuario"
                />
            </div>

            <div class="mb-3">
                <label for="password" class="form-label"><strong>Contraseña</strong></label>
                <input
                    type="password"
                    class="form-control"
                    name="password"
                    id="password"
                    aria-describedby="helpId"
                    placeholder="Escriba su Contraseña"
                />
             
            </div>
            <form class="d-flex">
                <div class="col">
                    <div class="mb-3">
                        <label for="correo" class="form-label"><strong>Correo</strong></label>
                        <input
                            type="email"
                            name="correo"
                            id="correo"
                            class="form-control"
                            placeholder="Escriba su Correo"
                            aria-describedby="helpId"
                        />
              
                    </div>
                </div>
            </form>
            
            

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
                >Cancelar</a
            >
            
            
            
        </form>
    </div>

</div>



<?php include ('../../templates/footer.php'); ?>