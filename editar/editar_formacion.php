<link rel="stylesheet" href="../style.css?202405=<?php echo rand(); ?>">

<?php
include '../conexion.php';
$id = intval($_GET['id']);
$res = $conexion->query("SELECT * FROM formacionacademica WHERE id = $id");
$f = $res->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $conexion->real_escape_string($_POST['titulo']);
    $institucion = $conexion->real_escape_string($_POST['institucion']);
    $fecha = $conexion->real_escape_string($_POST['fecha']);

    $conexion->query("UPDATE formacionacademica SET titulo='$titulo', institucion='$institucion', fecha='$fecha' WHERE id = $id");
    header('Location: ../administrar.php');
    exit;
}
?>
<form method="post" class="form-editar">
  <label>Título:</label><br>
  <input type="text" name="titulo" value="<?= htmlspecialchars($f['titulo']) ?>" required><br><br>
  <label>Institución:</label><br>
  <input type="text" name="institucion" value="<?= htmlspecialchars($f['institucion']) ?>" required><br><br>
  <label>Fecha:</label><br>
  <input type="text" name="fecha" value="<?= htmlspecialchars($f['fecha']) ?>" required><br><br>
  <button type="submit">Actualizar</button>
</form>
