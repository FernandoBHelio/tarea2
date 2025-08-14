<?php
include '../conexion.php';
$id = intval($_GET['id']);
$conexion->query("DELETE FROM experiencia WHERE id = $id");
header('Location: ../administrar.php');
exit;
