<link rel="stylesheet" href="../style.css?202405=<?php echo rand(); ?>">
<?php
include '../conexion.php';
$id = intval($_GET['id']);
$res = $conexion->query("SELECT nombre FROM conocimiento WHERE id = $id");
$c = $res->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $conexion->query("UPDATE conocimiento SET nombre='$nombre' WHERE id = $id");
    header('Location: ../administrar.php');
    exit;
}
?>
<form method="post" class="form-editar">
  <label>Conocimiento:</label><br>
  <input type="text" name="nombre" value="<?= htmlspecialchars($c['nombre']) ?>" required>
  <br><br>
  <button type="submit">Actualizar</button>
</form>
