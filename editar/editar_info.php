<link rel="stylesheet" href="../style.css?202405=<?php echo rand(); ?>">

<?php
include '../conexion.php';
$id = intval($_GET['id']);
$res = $conexion->query("SELECT tipo FROM informacionadicional WHERE id = $id");
$a = $res->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $conexion->real_escape_string($_POST['tipo']);
    $conexion->query("UPDATE informacionadicional SET tipo='$tipo' WHERE id = $id");
    header('Location: ../administrar.php');
    exit;
}
?>
<form method="post" class="form-editar">
  <label>Información Adicional:</label><br>
  <input type="text" name="tipo" value="<?= htmlspecialchars($a['tipo']) ?>" required>
  <br><br>
  <button type="submit">Actualizar</button>
</form>
