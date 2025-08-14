<link rel="stylesheet" href="../style.css?202405=<?php echo rand(); ?>">
<?php
include '../conexion.php';

$id_cv = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $puesto = $conexion->real_escape_string($_POST['puesto']);
    $empresa = $conexion->real_escape_string($_POST['empresa']);
    $fecha = $conexion->real_escape_string($_POST['fecha']);
    $descripcion = $conexion->real_escape_string($_POST['descripcion']);

    $conexion->query("INSERT INTO experiencia (id_cv, puesto, empresa, fecha, descripcion) VALUES ($id_cv, '$puesto', '$empresa', '$fecha', '$descripcion')");
    header('Location: ../administrar.php');
    exit;
}
?>

<form method="post" class="form-editar">
    <label>Puesto:</label><br>
    <input type="text" name="puesto" required><br><br>
    <label>Empresa:</label><br>
    <input type="text" name="empresa" required><br><br>
    <label>Fecha:</label><br>
    <input type="text" name="fecha" required><br><br>
    <label>Descripción:</label><br>
    <textarea name="descripcion" rows="4" required></textarea><br><br>
    <button type="submit">Agregar</button>
</form>
