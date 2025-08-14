<link rel="stylesheet" href="../style.css?202405=<?php echo rand(); ?>">

<?php
include '../conexion.php';
$id = intval($_GET['id']);
$cv = $conexion->query("SELECT puesto FROM cv WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $puesto = $conexion->real_escape_string($_POST['puesto']);
    $conexion->query("UPDATE cv SET puesto = '$puesto' WHERE id = $id");
    header('Location: ../administrar.php');
    exit;
}
?>
<form method="post" class="form-editar">
  <label>Puesto:</label><br>
  <input type="text" name="puesto" value="<?= htmlspecialchars($cv['puesto']) ?>" required>
  <br><br>
  <button type="submit">Actualizar</button>
</form>
