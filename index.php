<?php include 'conexion.php'; ?>
<?php
$res = $conexion->query("SELECT * FROM cv WHERE id = 1");
$cv = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>CV - Alberto Navarro</title>
  <link rel="stylesheet" href="style.css?202405=<?php echo rand(); ?>">

  <style>
    :root {
      --color-primario: <?= htmlspecialchars($cv['color']) ?>;
    }
  </style>

  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
</head>

<body>
  <div class="cv-container">
    <form action="administrar.php" method="POST" class="btn-admin">
      <button type="submit">Administrar</button>
    </form>

    <div class="main-sections">
      <div class="sidebar">
        <img src="<?= htmlspecialchars($cv['linkFoto']) ?>" alt="Foto perfil">
        <h2><?= htmlspecialchars($cv['nombre']) ?></h2>
        <br>
        <h4><?= htmlspecialchars($cv['puesto']) ?></h4>
        <br><br>
        <div class="section">
          <h3>Contacto</h3>
          <p><strong>Tel:</strong> <?= htmlspecialchars($cv['numero_telefono']) ?></p>
          <p><strong>Email:</strong> <?= htmlspecialchars($cv['correo']) ?></p>
          <p><strong>Web:</strong> <?= htmlspecialchars($cv['sitio_web']) ?></p>
          <p><strong>Dirección:</strong> <?= htmlspecialchars($cv['direccion']) ?></p>
        </div>
        <br><br>

        <div class="section">
          <h3>Información Adicional</h3>
          <ul>
            <?php
            $info = $conexion->query("SELECT * FROM informacionadicional WHERE id_cv = {$cv['id']}");
            while ($dato = $info->fetch_assoc()):
            ?>
              <li><strong><?= htmlspecialchars($dato['tipo']) ?>:</strong> <?= htmlspecialchars($dato['contenido'] ?? '') ?></li>
            <?php endwhile; ?>
          </ul>
        </div>
      </div>

      <div class="content">
      
        <div class="section">
          <h3>Mi Perfil</h3>
          <p><span class="dato-bd"><?= nl2br(htmlspecialchars($cv['perfil'])) ?></span></p>
        </div>

        <div class="section">
          <h3>Experiencia</h3>
          <ul>
            <?php
            $exp = $conexion->query("SELECT * FROM experiencia WHERE id_cv = {$cv['id']}");
            while ($e = $exp->fetch_assoc()):
            ?>
              <li>
                <strong class="dato-bd"><?= htmlspecialchars($e['puesto']) ?></strong><br><br>
                <span class="dato-bd"><?= htmlspecialchars($e['empresa']) ?></span> (<span class="dato-bd"><?= htmlspecialchars($e['fecha']) ?></span>)
                <br><br>
                <span class="dato-bd"><?= nl2br(htmlspecialchars($e['descripcion'])) ?></span>
              </li>
            <?php endwhile; ?>
          </ul>
        </div>

        <div class="section">
          <h3>Formación Académica</h3>
          <ul>
            <?php
            $form = $conexion->query("SELECT * FROM formacionacademica WHERE id_cv = {$cv['id']}");
            while ($f = $form->fetch_assoc()):
            ?>
              <li>
                <span class="dato-bd"><?= htmlspecialchars($f['institucion']) ?></span><br><br>
                (<span class="dato-bd"><?= htmlspecialchars($f['fecha']) ?></span>)<br><br>
                <?= htmlspecialchars($f['titulo']) ?>
              </li>
            <?php endwhile; ?>
          </ul>
        </div>

        <div class="section">
          <h3>Conocimientos</h3>
          <ul>
            <?php
            $con = $conexion->query("SELECT * FROM conocimiento WHERE id_cv = {$cv['id']}");
            while ($c = $con->fetch_assoc()):
            ?>
              <li><span class="dato-bd"><?= htmlspecialchars($c['nombre']) ?></span></li>
            <?php endwhile; ?>
          </ul>
        </div>

        <div class="section">
          <h3>Idiomas</h3>
          <ul>
            <?php
            $idiomas = $conexion->query("SELECT * FROM idioma WHERE id_cv = {$cv['id']}");
            while ($idioma = $idiomas->fetch_assoc()):
            ?>
              <li><span class="dato-bd"><?= htmlspecialchars($idioma['nombre']) ?></span></li>
            <?php endwhile; ?>
          </ul>
        </div>
      </div>
    </div>

    <div class="portafolio-section section">
      <h3>Portafolio</h3>
      <div class="portafolio-grid">
        <?php
        $pf = $conexion->query("SELECT * FROM portafolio WHERE id_cv = {$cv['id']}");
        while ($item = $pf->fetch_assoc()):
        ?>
          <div class="portafolio-item">
            <img src="<?= htmlspecialchars($item['enlace']) ?>" alt="Imagen portafolio">
            <p class="dato-bd"><?= htmlspecialchars($item['descripcion']) ?></p>
          </div>
        <?php endwhile; ?>
      </div>
    </div>

  </div>
</body>

</html>
