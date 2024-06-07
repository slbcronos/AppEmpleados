<?php include ('../../templates/header.php'); ?>
<br/>
<div class="card">
    <div class="card-header"><strong>Datos del Empleado</strong></div>
    <div class="card-body">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="primernombre" class="form-label">Primer nombre</label>
            <input
                type="text"
                class="form-control"
                name="primernombre"
                id="primernombre"
                aria-describedby="helpId"
                placeholder="Primer nombre"
            />
        </div>

        <div class="mb-3">
            <label for="segundonombre" class="form-label">Segundo nombre</label>
            <input
                type="text"
                class="form-control"
                name="segundonombre"
                id="segundonombre"
                aria-describedby="helpId"
                placeholder="Segundo nombre"
            />
        </div>

        <div class="mb-3">
            <label for="primerapellido" class="form-label">Primer Apellido</label>
            <input
                type="text"
                class="form-control"
                name="primerapellido"
                id="primerapellido"
                aria-describedby="helpId"
                placeholder="Primer Apellido"
            />
        </div>

        <div class="mb-3">
            <label for="segundoapellido" class="form-label">Segundo Apellido</label>
            <input
                type="text"
                class="form-control"
                name="segundoapellido"
                id="segundoapellido"
                aria-describedby="helpId"
                placeholder="Segundo Apellido"
            />
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input
                type="file"
                class="form-control"
                name="foto"
                id="foto"
                aria-describedby="helpId"
                placeholder="Foto"
            />
        </div>

        <div class="mb-3">
            <label for="cv" class="form-label">CV(PDF)</label>
            <input
                type="file"
                class="form-control"
                name="cv"
                id="cv"
                aria-describedby="helpId"
                placeholder="CV"
            />
        </div>

        <div class="mb-3">
            <label for="idpuesto" class="form-label">Puesto:</label>
            <select
                class="form-select form-select-sm"
                name="idpuesto"
                id="idpuesto"
            >
                <option selected>Select one</option>
                <option value="">New Delhi</option>
                <option value="">Istanbul</option>
                <option value="">Jakarta</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="fechadeingreso" class="form-label">Fecha de Ingreso:</label>
            <input
                type="date"
                class="form-control"
                name="fechadeingreso"
                id="fechadeingreso"
                aria-describedby="emailHelpId"
                placeholder="Fecha de ingreso a la empresa"
            />
            
        </div>
        
        <button
            type="submit"
            class="btn btn-primary"
        >
            Agregar Registro
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