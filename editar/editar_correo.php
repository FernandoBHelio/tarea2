<link rel="stylesheet" href="../style.css?202405=<?php echo rand(); ?>">
<?php
include '../conexion.php';
$id = intval($_GET['id']);
$cv = $conexion->query("SELECT correo FROM cv WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $conexion->real_escape_string($_POST['correo']);
    $conexion->query("UPDATE cv SET correo = '$correo' WHERE id = $id");
    header('Location: ../administrar.php');
    exit;
}
?>
<form method="post" class="form-editar">
  <label>Email:</label><br>
  <input type="email" name="correo" value="<?= htmlspecialchars($cv['correo']) ?>" required>
  <br><br>
  <button type="submit">Actualizar</button>
</form>
