<?php
include '../config/conexion.php'; // Se conecta a la base de datos

// Recoge los datos que se enviaron por POST
$nombre = $_POST['nombre'];
$documento = $_POST['documento'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];

// Guarda los datos en la tabla estudiantes
$sql = "INSERT INTO estudiantes (nombre, documento, correo, telefono)
        VALUES ('$nombre', '$documento', '$correo', '$telefono')";

if (mysqli_query($conn, $sql)) {
    // Redirige a index.php con mensaje de éxito
    header("Location: ../index.php?exito=1");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
