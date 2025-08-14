<?php
include '../conexion.php';
$id = intval($_GET['id']);
$conexion->query("DELETE FROM formacionacademica WHERE id = $id");
header('Location: ../administrar.php');
exit;
