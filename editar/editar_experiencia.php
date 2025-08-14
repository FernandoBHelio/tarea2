<link rel="stylesheet" href="../style.css?202405=<?php echo rand(); ?>">
<?php
include '../conexion.php';
$id = intval($_GET['id']);
$res = $conexion->query("SELECT * FROM experiencia WHERE id = $id");
$e = $res->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $puesto = $conexion->real_escape_string($_POST['puesto']);
    $empresa = $conexion->real_escape_string($_POST['empresa']);
    $fecha = $conexion->real_escape_string($_POST['fecha']);
    $descripcion = $conexion->real_escape_string($_POST['descripcion']);

    $conexion->query("UPDATE experiencia SET puesto='$puesto', empresa='$empresa', fecha='$fecha', descripcion='$descripcion' WHERE id = $id");
    header('Location: ../administrar.php');
    exit;
}
?>
<form method="post" class="form-editar">
  <label>Puesto:</label><br>
  <input type="text" name="puesto" value="<?= htmlspecialchars($e['puesto']) ?>" required><br><br>
  <label>Empresa:</label><br>
  <input type="text" name="empresa" value="<?= htmlspecialchars($e['empresa']) ?>" required><br><br>
  <label>Fecha:</label><br>
  <input type="text" name="fecha" value="<?= htmlspecialchars($e['fecha']) ?>" required><br><br>
  <label>Descripción:</label><br>
  <textarea name="descripcion" rows="5" required><?= htmlspecialchars($e['descripcion']) ?></textarea><br><br>
  <button type="submit">Actualizar</button>
</form>
