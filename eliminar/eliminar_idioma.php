<?php
include '../conexion.php';
$id = intval($_GET['id']);
$conexion->query("DELETE FROM idioma WHERE id = $id");
header('Location: ../administrar.php');
exit;
