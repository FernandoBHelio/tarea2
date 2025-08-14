<?php
include '../conexion.php';
$id = intval($_GET['id']);
$conexion->query("UPDATE cv SET sitio_web = '' WHERE id = $id");
header('Location: ../administrar.php');
exit;
