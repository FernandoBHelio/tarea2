<link rel="stylesheet" href="../style.css?202405=<?php echo rand(); ?>">

<?php
include '../conexion.php';
$id = intval($_GET['id']);
$cv = $conexion->query("SELECT direccion FROM cv WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $direccion = $conexion->real_escape_string($_POST['direccion']);
    $conexion->query("UPDATE cv SET direccion = '$direccion' WHERE id = $id");
    header('Location: ../administrar.php');
    exit;
}
?>
<form method="post" class="form-editar">
  <label>Dirección:</label><br>
  <input type="text" name="direccion" value="<?= htmlspecialchars($cv['direccion']) ?>" required>
  <br><br>
  <button type="submit">Actualizar</button>
</form>
