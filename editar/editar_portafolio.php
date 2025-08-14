<link rel="stylesheet" href="../style.css?202405=<?php echo rand(); ?>">
<?php
include '../conexion.php';

if (!isset($_GET['id'])) {
    header("Location: ../administrar.php");
    exit;
}

$id = intval($_GET['id']);
$res = $conexion->query("SELECT * FROM portafolio WHERE id = $id");
$portafolio = $res->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descripcion = $conexion->real_escape_string($_POST['descripcion']);
    $error = "";

    if (!empty($_FILES['imagen']['name'])) {
        $permitidas = ['jpg', 'jpeg', 'png'];
        $ext = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));

        if (in_array($ext, $permitidas)) {
            $nombreNuevo = uniqid() . '.' . $ext;
            $carpeta = '../uploads/';
            $rutaFinal = $carpeta . $nombreNuevo;
            $rutaRelativa = 'uploads/' . $nombreNuevo;

            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaFinal)) {
                if (!empty($portafolio['enlace']) && file_exists('../' . $portafolio['enlace'])) {
                    unlink('../' . $portafolio['enlace']);
                }
                $conexion->query("UPDATE portafolio SET enlace = '$rutaRelativa' WHERE id = $id");
            } else {
                $error = "Error al subir la imagen.";
            }
        } else {
            $error = "Formato no permitido. Solo JPG, JPEG o PNG.";
        }
    }

    // Actualizar descripción independientemente de la imagen
    $conexion->query("UPDATE portafolio SET descripcion = '$descripcion' WHERE id = $id");

    if (empty($error)) {
        header("Location: ../administrar.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Portafolio</title>
</head>
<body>
  <div class="contenedor form-editar">
    <h3>Editar Imagen de Portafolio</h3>

    <?php if (!empty($portafolio['enlace'])): ?>
      <img src="../<?= $portafolio['enlace'] ?>" alt="Imagen actual">
    <?php else: ?>
      <p style="color:gray;">No hay imagen actualmente.</p>
    <?php endif; ?>

    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="post" enctype="multipart/form-data">
      <label>Descripción:</label><br>
      <input type="text" name="descripcion" value="<?= htmlspecialchars($portafolio['descripcion']) ?>" required><br>

      <label>Cambiar imagen (opcional):</label><br>
      <input type="file" name="imagen" accept="image/*"><br><br>

      <button type="submit">Actualizar</button>
    </form>
  </div>
</body>
</html>
