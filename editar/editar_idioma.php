<link rel="stylesheet" href="../style.css?202405=<?php echo rand(); ?>">

<?php
include '../conexion.php';
$id = intval($_GET['id']);
$res = $conexion->query("SELECT nombre FROM idioma WHERE id = $id");
$i = $res->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $conexion->query("UPDATE idioma SET nombre='$nombre' WHERE id = $id");
    header('Location: ../administrar.php');
    exit;
}
?>
<form method="post" class="form-editar">
  <label>Idioma:</label><br>
  <input type="text" name="nombre" value="<?= htmlspecialchars($i['nombre']) ?>" required>
  <br><br>
  <button type="submit">Actualizar</button>
</form>
