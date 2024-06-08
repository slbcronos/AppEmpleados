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
            >Agregar Usuarios</a
        >
        
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-secondary">
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
                    <tr class="">
                        <td scope="row">1</td>
                        <td>Salvador Lopez</td>
                        <td>1511</td>
                        <td>salvador@slcomputacion.com</td>
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

                </tbody>
            </table>
        </div>

    </div>

</div>


<?php include ('../../templates/footer.php'); ?>