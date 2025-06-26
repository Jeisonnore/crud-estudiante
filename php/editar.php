<?php
include '../config/conexion.php';

$id = $_GET['id'];
$sql = "SELECT * FROM estudiantes WHERE id = $id";
$resultado = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container my-5">
    <h2>Editar Estudiante</h2>
    <form action="actualizar.php" method="post">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">

        <div class="mb-2">
            <label>Nombre</label>
            <input class="form-control" type="text" name="nombre" value="<?= $row['nombre'] ?>" required>
        </div>

        <div class="mb-2">
            <label>Documento</label>
            <input class="form-control" type="number" name="documento" value="<?= $row['documento'] ?>" required>
        </div>

        <div class="mb-2">
            <label>Correo</label>
            <input class="form-control" type="email" name="correo" value="<?= $row['correo'] ?>" required>
        </div>

        <div class="mb-2">
            <label>Teléfono</label>
            <input class="form-control" type="number" name="telefono" value="<?= $row['telefono'] ?>" required>
        </div>

        <button class="btn btn-success">Actualizar</button>
        <a href="../index.php" class="btn btn-secondary">Volver</a>
    </form>
</body>
</html>
