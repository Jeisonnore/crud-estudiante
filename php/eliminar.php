<?php
include '../config/conexion.php';

$id = $_GET['id'];
$sql = "DELETE FROM estudiantes WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("Location: ../index.php?eliminado=1");
    exit();
} else {
    echo "Error al eliminar: " . mysqli_error($conn);
}
?>