<link rel="stylesheet" href="../style.css?202405=<?php echo rand(); ?>">

<?php
include '../conexion.php';
$id = intval($_GET['id']);
$cv = $conexion->query("SELECT sitio_web FROM cv WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $web = $conexion->real_escape_string($_POST['web']);
    $conexion->query("UPDATE cv SET sitio_web = '$web' WHERE id = $id");
    header('Location: ../administrar.php');
    exit;
}
?>
<form method="post" class="form-editar">
  <label>Sitio Web:</label><br>
  <input type="text" name="web" value="<?= htmlspecialchars($cv['sitio_web']) ?>" required>
  <br><br>
  <button type="submit">Actualizar</button>
</form>
