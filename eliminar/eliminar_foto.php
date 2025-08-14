<?php
include '../conexion.php';

if (!isset($_GET['id'])) {
    header("Location: ../administrar.php");
    exit;
}

$id = intval($_GET['id']);

$resultado = $conexion->query("SELECT linkFoto FROM cv WHERE id = $id");
$fila = $resultado->fetch_assoc();

if ($fila && !empty($fila['linkFoto'])) {
    $rutaImagen = '../' . $fila['linkFoto'];
    if (file_exists($rutaImagen)) {
        unlink($rutaImagen); 
    }
}

$conexion->query("UPDATE cv SET linkFoto = '' WHERE id = $id");

header("Location: ../administrar.php");
exit;
?>
