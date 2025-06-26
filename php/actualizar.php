<?php
include '../config/conexion.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$documento = $_POST['documento'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];

$sql = "UPDATE estudiantes SET nombre='$nombre', documento='$documento', correo='$correo', telefono='$telefono' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    header("Location: ../index.php?editado=1");
    exit();
} else {
    echo "Error al actualizar: " . mysqli_error($conn);
}
?>