<?php
include '../conexion.php';

if (!isset($_GET['id'])) {
    die("ID no especificado.");
}

$id = (int)$_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $color = trim($_POST['color']);

    if (preg_match('/^#([a-f0-9]{3}){1,2}$/i', $color)) {
        $stmt = $conexion->prepare("UPDATE cv SET color = ? WHERE id = ?");
        $stmt->bind_param("si", $color, $id);
        if ($stmt->execute()) {
            header("Location: ../administrar.php");
            exit;
        } else {
            $error = "Error al actualizar el color en la base de datos.";
        }
        $stmt->close();
    } else {
        $error = "Por favor, ingresa un color hexadecimal válido (ejemplo: #1c2a48).";
    }
}


$res = $conexion->query("SELECT color FROM cv WHERE id = $id LIMIT 1");
$cv = $res->fetch_assoc();
$colorActual = $cv['color'] ?? '#1c2a48';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Color Principal</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      padding: 30px;
    }
    .contenedor {
      max-width: 400px;
      margin: auto;
      background: #fff;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }
    input[type="color"], input[type="text"] {
      width: 100%;
      padding: 8px;
      font-size: 1em;
      border: 1px solid #ccc;
      border-radius: 6px;
      margin-bottom: 20px;
      box-sizing: border-box;
    }
    button {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 1em;
    }
    button:hover {
      background-color: #0056b3;
    }
    .error {
      color: #dc3545;
      margin-bottom: 15px;
    }
    a {
      display: inline-block;
      margin-top: 15px;
      color: #1c2a48;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="contenedor">
    <h2>Editar Color Principal</h2>

    <?php if (!empty($error)): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
      <label for="color">Color hexadecimal:</label>
      <input type="color" id="color" name="color" value="<?= htmlspecialchars($colorActual) ?>" required>
      <input type="text" pattern="^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" title="Formato hexadecimal válido (#123abc)" value="<?= htmlspecialchars($colorActual) ?>" oninput="document.getElementById('color').value = this.value" />
      <button type="submit">Guardar</button>
    </form>
  </div>
</body>
</html>
