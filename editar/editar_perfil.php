<link rel="stylesheet" href="../style.css?202405=<?php echo rand(); ?>">

<?php
include '../conexion.php';
$id = intval($_GET['id']);
$cv = $conexion->query("SELECT perfil FROM cv WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $perfil = $conexion->real_escape_string($_POST['perfil']);
    $conexion->query("UPDATE cv SET perfil = '$perfil' WHERE id = $id");
    header('Location: ../administrar.php');
    exit;
}
?>
<form method="post" class="form-editar">
  <label>Perfil:</label><br>
  <textarea name="perfil" rows="6" required><?= htmlspecialchars($cv['perfil']) ?></textarea>
  <br><br>
  <button type="submit">Actualizar</button>
</form>
