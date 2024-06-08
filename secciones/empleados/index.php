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
            >Crear nuevo Empleado</a
        >
        
    </div>
    <div class="card-body">

    <div
        class="table-responsive-sm"
    >
        <table
            class="table table-primary"
        >
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Foto</th>
                    <th scope="col">CV</th>
                    <th scope="col">Puesto</th>
                    <th scope="col">Fecha Ingreso</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <td scope="row">Salvador</td>
                    <td>imagen.jpg</td>
                    <td>cv.pdf</td>
                    <td>Programador Jr.</td>
                    <td>01/01/2024</td>
                    <td><a
                        name=""
                        id=""
                        class="btn btn-primary"
                        href="#"
                        role="button"
                        >Carta</a
                    >
                      <a
                        name=""
                        id=""
                        class="btn btn-warning"
                        href="#"
                        role="button"
                        >Editar</a
                     >
                       <a
                        name=""
                        id=""
                        class="btn btn-danger"
                        href="#"
                        role="button"
                        >Eliminar</a
                      >
                      </td>
                </tr>

            </tbody>
        </table>
    </div>
    

    </div>
   
</div>


<?php include ('../../templates/footer.php'); ?>