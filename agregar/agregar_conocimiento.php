<link rel="stylesheet" href="../style.css?202405=<?php echo rand(); ?>">
<?php
include '../conexion.php';

$id_cv = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conexion->real_escape_string($_POST['nombre']);

    $conexion->query("INSERT INTO conocimiento (id_cv, nombre) VALUES ($id_cv, '$nombre')");
    header('Location: ../administrar.php');
    exit;
}
?>

<form method="post" class="form-editar">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>
    <button type="submit">Agregar</button>
</form>
