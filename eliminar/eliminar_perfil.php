<?php
include '../conexion.php';
$id = intval($_GET['id']);
$conexion->query("UPDATE cv SET perfil = '' WHERE id = $id");
header('Location: ../administrar.php');
exit;
