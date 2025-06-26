<?php
$host = "localhost";
$user = "root";
$password = "Control19";
$nombreDB = "colegio";

$conn = mysqli_connect($host, $user, $password, $nombreDB);

if (!$conn) {
    die("Error en la conexión: " . mysqli_connect_error());
}
?>