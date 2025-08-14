<?php
include '../conexion.php';
$id = intval($_GET['id']);
$res = $conexion->query("SELECT enlace FROM portafolio WHERE id = $id");
$p = $res->fetch_assoc();
if ($p && file_exists($p['enlace'])) {
    unlink($p['enlace']);
}
$conexion->query("DELETE FROM portafolio WHERE id = $id");
header('Location: ../administrar.php');
exit;
?>