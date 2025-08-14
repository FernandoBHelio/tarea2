<link rel="stylesheet" href="../style.css?202405=<?php echo rand(); ?>">

<?php
include '../conexion.php';
$id = intval($_GET['id']);
$cv = $conexion->query("SELECT nombre FROM cv WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $conexion->query("UPDATE cv SET nombre = '$nombre' WHERE id = $id");
    header('Location: ../administrar.php');
    exit;
}
?>
<form method="post" class="form-editar">
  <label>Nombre:</label><br>
  <input type="text" name="nombre" value="<?= htmlspecialchars($cv['nombre']) ?>" required>
  <br><br>
  <button type="submit">Actualizar</button>
</form>
