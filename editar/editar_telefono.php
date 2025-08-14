<link rel="stylesheet" href="../style.css?202405=<?php echo rand(); ?>">

<?php
include '../conexion.php';
$id = intval($_GET['id']);
$cv = $conexion->query("SELECT numero_telefono FROM cv WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $telefono = $conexion->real_escape_string($_POST['telefono']);
    $conexion->query("UPDATE cv SET numero_telefono = '$telefono' WHERE id = $id");
    header('Location: ../administrar.php');
    exit;
}
?>
<form method="post" class="form-editar">
  <label>Teléfono:</label><br>
  <input type="text" name="telefono" value="<?= htmlspecialchars($cv['numero_telefono']) ?>" required>
  <br><br>
  <button type="submit">Actualizar</button>
</form>
