<link rel="stylesheet" href="../style.css?202405=<?php echo rand(); ?>">
<?php
include '../conexion.php';

$id_cv = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $conexion->real_escape_string($_POST['titulo']);
    $institucion = $conexion->real_escape_string($_POST['institucion']);
    $fecha = $conexion->real_escape_string($_POST['fecha']);

    $conexion->query("INSERT INTO formacionacademica (id_cv, titulo, institucion, fecha) VALUES ($id_cv, '$titulo', '$institucion', '$fecha')");
    header('Location: ../administrar.php');
    exit;
}
?>

<form method="post" class="form-editar">
    <label>Título:</label><br>
    <input type="text" name="titulo" required><br><br>
    <label>Institución:</label><br>
    <input type="text" name="institucion" required><br><br>
    <label>Fecha:</label><br>
    <input type="text" name="fecha" required><br><br>
    <button type="submit">Agregar</button>
</form>
