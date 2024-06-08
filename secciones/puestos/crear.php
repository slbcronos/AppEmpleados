<?php include ('../../templates/header.php'); ?>

<br />

<div class="card">
    <div class="card-header">Puestos</div>
    <div class="card-body">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
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
                >Cancelar</a
            >
            
            
            
        </form>
    </div>

</div>





<?php include ('../../templates/footer.php'); ?>