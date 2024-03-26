<?php
require_once '../scripts/session_manager.php';
if ($rol == "paciente") {
    header("Location: 404.php");
    exit();
}
require_once '../controllers/UserController.php';

$userController = new UserController();
$usuarios = $userController->obtenerUsuarios();
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Usuarios</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Agregar Usuario
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../scripts/user_manager.php" method="post">
                <div class="modal-body">
                    <input type="hidden" id="actionType" name="action" value="agregar">

                    <div id="userDetails">
                        <!-- Nombre y Apellidos -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="username" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lastname" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                            </div>
                        </div>

                        <!-- DNI y Género -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="dni" class="form-label">DNI</label>
                                <input type="text" class="form-control" id="dni" name="usuario_id" pattern="\d{8}[A-Za-z]" title="Introduce un DNI válido (8 dígitos seguidos de una letra)" required>
                            </div>
                            <div class="col-md-6">
                                <label for="genero" class="form-label">Género</label>
                                <select class="form-select" id="genero" name="genero" aria-label="Selecciona tu género">
                                    <option selected>Selecciona tu género</option>
                                    <option value="hombre">Hombre</option>
                                    <option value="mujer">Mujer</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                        </div>

                        <!-- Rol, Fecha de nacimiento -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="rol" class="form-label">Rol</label>
                                <select class="form-select" id="rol" name="rol" aria-label="Selecciona tu rol">
                                    <option selected>Selecciona tu rol</option>
                                    <option value="administrador">Administrador</option>
                                    <option value="paciente">Paciente</option>
                                    <option value="fisioterapeuta">Fisioterapeuta</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                            </div>
                        </div>

                        <!-- Telefono, Dirección, provincia y Municipio -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" pattern="\d{8}[0-9]" title="Introduce un telefono válido, sin espacios (9 dígitos)" required>
                            </div>
                            <div class="col-md-6">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                            </div>
                        </div>

                        <!-- Correo electrónico, Contraseña y Código Postal -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="pass" name="pass" minlength="8" name="pass" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="provincia" class="form-label">Provincia</label>
                                <select class="form-select" id="ps-prov" name="provincia" aria-label="Selecciona tu provincia">
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="municipio" class="form-label">Municipio</label>
                                <select class="form-select" id="ps-mun" name="municipio" required>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="cp" class="form-label">Código Postal</label>
                                <input type="text" class="form-control" id="cp" name="cp" pattern="[0-9]{5}" title="Introduce un código postal válido (5 dígitos)" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Agregar Usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="table-responsive small">
    <form class="row g-3">
        <div class="col-auto">
            <label for="inputPassword2" class="visually-hidden">Filtro</label>
            <input type="text" class="form-control" id="inputPassword2" placeholder="Filtrar por ID...">
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" id="inputPassword2" placeholder="Filtrar por nombre...">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Filtrar</button>
        </div>
    </form>


    <div class="row">
        <!-- Aquí se mostrarán los usuarios en forma de tabla -->
        <div class="col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 5%;">ID</th>
                            <th scope="col" style="width: 15%;">Nombre</th>
                            <th scope="col" style="width: 15%;">Apellidos</th>
                            <th scope="col" style="width: 15%;">Email</th>
                            <th scope="col" style="width: 10%;">Teléfono</th>
                            <th scope="col" style="width: 10%;">Ses.Dis.</th>
                            <th scope="col" style="width: 10%;">Rol</th>
                            <th scope="col" style="width: 15%;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario) : ?>
                            <tr>
                                <td><?php echo $usuario['usuario_id']; ?></td>
                                <td><?php echo $usuario['nombre']; ?></td>
                                <td><?php echo $usuario['apellidos']; ?></td>
                                <td><?php echo $usuario['email']; ?></td>
                                <td><?php echo $usuario['telefono']; ?></td>
                                <td><?php echo $usuario['sesiones_disponibles']; ?></td>
                                <td><?php echo $usuario['rol']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-action="ver">Ver</button>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-action="editar">Editar</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-action="eliminar">Eliminar</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-start">
            <li class="page-item disabled">
                <a class="page-link">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>

    <!-- <script>
        // Función para actualizar el modal según la acción seleccionada
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Botón que activó el modal
            var action = button.data('action'); // Acción seleccionada
            var modal = $(this);

            // Limpiar el contenido del userDetails
            $('#userDetails').empty();

            // Actualizar título y acción del formulario según la acción seleccionada
            if (action === 'agregar') {
                modal.find('.modal-title').text('Agregar Usuario');
                modal.find('#actionType').val('agregar');
                modal.find('#actionButton').text('Agregar Usuario');
                // Aquí puedes limpiar o resetear los campos del formulario si es necesario
                // Agregar campos de entrada para agregar usuario
            } else if (action === 'ver') {
                modal.find('.modal-title').text('Ver Usuario');
                modal.find('#actionType').val('ver');
                modal.find('#actionButton').hide(); // Ocultar el botón de submit
                // Agregar campos de solo lectura para mostrar información del usuario
            } else if (action === 'editar') {
                modal.find('.modal-title').text('Editar Usuario');
                modal.find('#actionType').val('editar');
                modal.find('#actionButton').text('Guardar Cambios');
                // Agregar campos de entrada para editar la información del usuario
            } else if (action === 'eliminar') {
                modal.find('.modal-title').text('Eliminar Usuario');
                modal.find('#actionType').val('eliminar');
                modal.find('.modal-body').html('<p>¿Estás seguro de que deseas eliminar este usuario?</p>');
                modal.find('#actionButton').text('Eliminar');
                // Puedes mostrar un mensaje de confirmación o simplemente pedir confirmación a través del botón
            }
        });
    </script> -->

    <script>
        var prov = document.getElementById('ps-prov');
        var mun = document.getElementById('ps-mun');
        // Create PS
        new Pselect().create(prov, mun);


        document.getElementById('ps-mun').addEventListener('change', function onChange() {
            document.getElementById('code').innerText = 'Código: ' + document.getElementById('ps-mun').value;
        });
    </script>

</div>