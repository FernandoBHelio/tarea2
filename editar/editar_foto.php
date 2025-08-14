<link rel="stylesheet" href="../style.css?202405=<?php echo rand(); ?>">

<?php
include '../conexion.php';

if (!isset($_GET['id'])) {
    header("Location: ../administrar.php");
    exit;
}
$id = intval($_GET['id']);
$resultado = $conexion->query("SELECT * FROM cv WHERE id = $id");
$fila = $resultado->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['nueva_imagen'])) {
    $nombre = $_FILES['nueva_imagen']['name'];
    $tmp = $_FILES['nueva_imagen']['tmp_name'];
    $ext = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));
    $carpeta = '../uploads/';
    $permitidas = ['jpg', 'jpeg', 'png'];

    if (in_array($ext, $permitidas)) {
        $nombreFinal = uniqid() . '.' . $ext;
        $rutaFinal = $carpeta . $nombreFinal;
        $rutaRelativa = 'uploads/' . $nombreFinal;

        if (move_uploaded_file($tmp, $rutaFinal)) {
            if (!empty($fila['linkFoto']) && file_exists('../' . $fila['linkFoto'])) {
                unlink('../' . $fila['linkFoto']);
            }

            $conexion->query("UPDATE cv SET linkFoto = '$rutaRelativa' WHERE id = $id");
            header("Location: ../administrar.php");
            exit;
        } else {
            $error = "Error al subir la nueva imagen.";
        }
    } else {
        $error = "Formato no permitido. Solo se permiten JPG, JPEG o PNG.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Foto de Perfil</title>
</head>
<body>
  <div class="contenedor form-editar">
    <h3>Editar Foto de Perfil</h3>

    <?php if (!empty($fila['linkFoto'])): ?>
      <img src="../<?= $fila['linkFoto'] ?>" alt="Foto actual">
    <?php else: ?>
      <p style="color:gray;">No hay foto actualmente.</p>
    <?php endif; ?>

    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="post" class="form-editar" enctype="multipart/form-data">
      <input type="file" name="nueva_imagen" required><br>
      <button type="submit">Actualizar</button>
    </form>
  </div>
</body>
</html>
