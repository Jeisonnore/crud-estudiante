<?php
include "config/conexion.php";

$sql = "SELECT * FROM estudiantes";
$resultado = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión de Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-cover bg-center min-h-screen" style="background-image: url('one-piece.jpg');">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 border border-1 rounded-2 shadow bg-light sm p-3 my-3">
            <h2 class="text-center">Registra un estudiante</h2>
            <form action="php/guardar.php" method="post">
                <div class="mb-2">
                    <label for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" id="nombre" required>
                </div>
                <div class="mb-2">
                    <label for="documento">Documento</label>
                    <input class="form-control" type="" name="documento" id="documento" required>
                </div>
                <div class="mb-2">
                    <label for="correo">Correo</label>
                    <input class="form-control" type="email" name="correo" id="correo" required>
                </div>
                <div class="mb-2">
                    <label for="telefono">Teléfono</label>
                    <input class="form-control" type="telefono" name="telefono" id="telefono" required>
                </div>
                <button class="btn btn-primary w-100">Guardar</button>
            </form>
        </div>
    </div>

    <div class="table-responsive mb-5">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nombre'] ?></td>
                        <td><?= $row['documento'] ?></td>
                        <td><?= $row['correo'] ?></td>
                        <td><?= $row['telefono'] ?></td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="php/editar.php?id=<?= $row['id'] ?>">Editar</a>
                            <a href="#" class="btn btn-danger btn-sm" onclick="confirmarEliminacion(<?= $row['id'] ?>)">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function confirmarEliminacion(id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡Esta acción no se puede deshacer!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'php/eliminar.php?id=' + id;
        }
    });
}

document.querySelector("form").addEventListener("submit", function (e) {
    const nombre = document.getElementById("nombre").value.trim();
    const documento = document.getElementById("documento").value.trim();
    const correo = document.getElementById("correo").value.trim();
    const telefono = document.getElementById("telefono").value.trim();

    if (!nombre || !documento || !correo || !telefono) {
        e.preventDefault();
        Swal.fire({
            icon: 'warning',
            title: 'Campos incompletos',
            text: 'Por favor, completa todos los campos.',
            confirmButtonColor: '#d33'
        });
    }
});
</script>

<?php if (isset($_GET['exito']) && $_GET['exito'] == 1): ?>
<script>
Swal.fire({ icon: 'success', title: 'Registro exitoso', text: 'El estudiante fue guardado correctamente.' });
</script>
<?php endif; ?>

<?php if (isset($_GET['eliminado']) && $_GET['eliminado'] == 1): ?>
<script>
Swal.fire({ icon: 'success', title: 'Eliminado', text: 'Estudiante eliminado correctamente.' });
</script>
<?php endif; ?>

<?php if (isset($_GET['editado']) && $_GET['editado'] == 1): ?>
<script>
Swal.fire({ icon: 'success', title: 'Actualizado', text: 'Estudiante actualizado correctamente.' });
</script>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
