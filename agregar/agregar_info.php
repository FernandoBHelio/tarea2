<link rel="stylesheet" href="../style.css?202405=<?php echo rand(); ?>">
<?php
include '../conexion.php';

$id_cv = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $conexion->real_escape_string($_POST['tipo']);

    $conexion->query("INSERT INTO informacionadicional (id_cv, tipo) VALUES ($id_cv, '$tipo')");
    header('Location: ../administrar.php');
    exit;
}
?>

<form method="post" class="form-editar">
    <label>Tipo:</label><br>
    <input type="text" name="tipo" required><br><br>
    <button type="submit">Agregar</button>
</form>
