<?php
$servidor = 'localhost';
$usuario = 'root';
$pass = '';
$bd = 'inventario_db'; 

$conexion = mysqli_connect($servidor, $usuario, $pass, $bd);
mysqli_query($conexion, "SET NAMES 'UTF8'");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
