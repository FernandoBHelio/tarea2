<link rel="stylesheet" href="../style.css?202405=<?php echo rand(); ?>">
<?php
include '../conexion.php';

$id_cv = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descripcion = $conexion->real_escape_string($_POST['descripcion']);

    $permitidas = ['jpg', 'jpeg', 'png'];
    $imagen = $_FILES['imagen'] ?? null;
    $rutaFinal = '';

    if ($imagen && in_array(strtolower(pathinfo($imagen['name'], PATHINFO_EXTENSION)), $permitidas)) {
        $nombreNuevo = uniqid() . '.' . strtolower(pathinfo($imagen['name'], PATHINFO_EXTENSION));
        $carpeta = '../uploads/';
        $rutaFinal = $carpeta . $nombreNuevo;

        if (!move_uploaded_file($imagen['tmp_name'], $rutaFinal)) {
            $error = "Error al subir la imagen.";
        }
    } else {
        $error = "Formato no permitido o no se seleccionó imagen.";
    }

    if (empty($error)) {
        $rutaRelativa = 'uploads/' . $nombreNuevo;
        $conexion->query("INSERT INTO portafolio (id_cv, descripcion, enlace) VALUES ($id_cv, '$descripcion', '$rutaRelativa')");
        header('Location: ../administrar.php');
        exit;
    }
}
?>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="post" enctype="multipart/form-data" class="form-editar">
    <label>Descripción:</label><br>
    <input type="text" name="descripcion" required><br><br>
    <label>Imagen:</label><br>
    <input type="file" name="imagen" accept="image/*" required><br><br>
    <button type="submit">Agregar</button>
</form>
