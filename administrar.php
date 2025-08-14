<?php include 'conexion.php'; ?>
<?php
$cv = $conexion->query("SELECT * FROM cv LIMIT 1")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Administrar CV</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      padding: 30px;
    }

    .contenedor {
      max-width: 1000px;
      margin: auto;
      background: #fff;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
    }

    h3 {
      margin-top: 40px;
      color: #1c2a48;
      border-bottom: 2px solid #ccc;
      padding-bottom: 5px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .btn-agregar {
      background: #007bff;
      color: white;
      text-decoration: none;
      padding: 6px 12px;
      border-radius: 5px;
      font-size: 0.9em;
    }

    .btn-agregar:hover {
      background: #0056b3;
    }

    .item {
      padding: 15px;
      margin: 10px 0;
      background: #fafafa;
      border: 1px solid #ddd;
      border-radius: 6px;
    }

    .acciones a {
      text-decoration: none;
      padding: 6px 12px;
      color: white;
      border-radius: 4px;
      margin-right: 10px;
    }

    .acciones a.editar {
      background: #28a745;
    }

    .acciones a.eliminar {
      background: #dc3545;
    }

    .btn-regresar {
      position: absolute;
      top: 50px;
      right: 1070px;
      background: transparent;
      color: #1c2a48;
      padding: 8px 14px;
      border-radius: 6px;
      font-size: 0.9em;
      border: 2px solid #1c2a48;
      text-decoration: none;
      font-weight: bold;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }
    .btn-regresar:hover {
      background: #1c2a48;
      color: white;
    }


  </style>
</head>

<body>
  <a href="index.php" class="btn-regresar">Volver al Inicio</a>
  <div class="contenedor">
    <h2>Administrar CV</h2>

    <h3>Color Principal (CSS Variable)</h3>
    <div class="item">
      <p><strong>Color actual:</strong> <span style="color: <?= htmlspecialchars($cv['color'] ?? '#1c2a48') ?>; font-weight: bold;"><?= htmlspecialchars($cv['color'] ?? '#1c2a48') ?></span></p>
      <div class="acciones">
        <a href="editar/editar_color.php?id=<?= $cv['id'] ?>" class="editar">Editar</a>
      </div>
    </div>

    <h3>Foto de Perfil</h3>
    <div class="item">
      <img src="<?= htmlspecialchars($cv['linkFoto']) ?>" alt="Foto de perfil" style="max-width: 150px;">
      <div class="acciones">
        <a href="editar/editar_foto.php?id=<?= $cv['id'] ?>" class="editar">Editar</a>
        <a href="eliminar/eliminar_foto.php?id=<?= $cv['id'] ?>" class="eliminar">Eliminar</a>
      </div>
    </div>

    <h3>Datos Generales</h3>
    <div class="item">
      <p><strong>Nombre:</strong> <?= htmlspecialchars($cv['nombre']) ?></p>
      <div class="acciones">
        <a href="editar/editar_nombre.php?id=<?= $cv['id'] ?>" class="editar">Editar</a>
        <a href="eliminar/eliminar_nombre.php?id=<?= $cv['id'] ?>" class="eliminar">Eliminar</a>
      </div>
    </div>
    <div class="item">
      <p><strong>Puesto:</strong> <?= htmlspecialchars($cv['puesto']) ?></p>
      <div class="acciones">
        <a href="editar/editar_puesto.php?id=<?= $cv['id'] ?>" class="editar">Editar</a>
        <a href="eliminar/eliminar_puesto.php?id=<?= $cv['id'] ?>" class="eliminar">Eliminar</a>
      </div>
    </div>
    <div class="item">
      <p><strong>Perfil:</strong> <?= nl2br(htmlspecialchars($cv['perfil'])) ?></p>
      <div class="acciones">
        <a href="editar/editar_perfil.php?id=<?= $cv['id'] ?>" class="editar">Editar</a>
        <a href="eliminar/eliminar_perfil.php?id=<?= $cv['id'] ?>" class="eliminar">Eliminar</a>
      </div>
    </div>

    <h3>Contacto</h3>
    <div class="item">
      <p><strong>Teléfono:</strong> <?= htmlspecialchars($cv['numero_telefono']) ?></p>
      <div class="acciones">
        <a href="editar/editar_telefono.php?id=<?= $cv['id'] ?>" class="editar">Editar</a>
        <a href="eliminar/eliminar_telefono.php?id=<?= $cv['id'] ?>" class="eliminar">Eliminar</a>
      </div>
    </div>
    <div class="item">
      <p><strong>Email:</strong> <?= htmlspecialchars($cv['correo']) ?></p>
      <div class="acciones">
        <a href="editar/editar_correo.php?id=<?= $cv['id'] ?>" class="editar">Editar</a>
        <a href="eliminar/eliminar_correo.php?id=<?= $cv['id'] ?>" class="eliminar">Eliminar</a>
      </div>
    </div>
    <div class="item">
      <p><strong>Web:</strong> <?= htmlspecialchars($cv['sitio_web']) ?></p>
      <div class="acciones">
        <a href="editar/editar_web.php?id=<?= $cv['id'] ?>" class="editar">Editar</a>
        <a href="eliminar/eliminar_web.php?id=<?= $cv['id'] ?>" class="eliminar">Eliminar</a>
      </div>
    </div>
    <div class="item">
      <p><strong>Dirección:</strong> <?= htmlspecialchars($cv['direccion']) ?></p>
      <div class="acciones">
        <a href="editar/editar_direccion.php?id=<?= $cv['id'] ?>" class="editar">Editar</a>
        <a href="eliminar/eliminar_direccion.php?id=<?= $cv['id'] ?>" class="eliminar">Eliminar</a>
      </div>
    </div>

    <h3>
      Experiencia
      <a href="agregar/agregar_experiencia.php" class="btn-agregar">+ Agregar</a>
    </h3>
    <?php
    $res = $conexion->query("SELECT * FROM experiencia WHERE id_cv = {$cv['id']}");
    while ($e = $res->fetch_assoc()):
    ?>
      <div class="item">
        <p><strong><?= htmlspecialchars($e['puesto']) ?></strong> - <?= htmlspecialchars($e['empresa']) ?> (<?= htmlspecialchars($e['fecha']) ?>)</p>
        <p><?= nl2br(htmlspecialchars($e['descripcion'])) ?></p>
        <div class="acciones">
          <a href="editar/editar_experiencia.php?id=<?= $e['id'] ?>" class="editar">Editar</a>
          <a href="eliminar/eliminar_experiencia.php?id=<?= $e['id'] ?>" class="eliminar">Eliminar</a>
        </div>
      </div>
    <?php endwhile; ?>

    <h3>
      Formación Académica
      <a href="agregar/agregar_formacion.php" class="btn-agregar">+ Agregar</a>
    </h3>
    <?php
    $res = $conexion->query("SELECT * FROM formacionacademica WHERE id_cv = {$cv['id']}");
    while ($f = $res->fetch_assoc()):
    ?>
      <div class="item">
        <p><strong><?= htmlspecialchars($f['titulo']) ?></strong><br><?= htmlspecialchars($f['institucion']) ?> (<?= htmlspecialchars($f['fecha']) ?>)</p>
        <div class="acciones">
          <a href="editar/editar_formacion.php?id=<?= $f['id'] ?>" class="editar">Editar</a>
          <a href="eliminar/eliminar_formacion.php?id=<?= $f['id'] ?>" class="eliminar">Eliminar</a>
        </div>
      </div>
    <?php endwhile; ?>

    <h3>
      Conocimientos
      <a href="agregar/agregar_conocimiento.php" class="btn-agregar">+ Agregar</a>
    </h3>
    <?php
    $res = $conexion->query("SELECT * FROM conocimiento WHERE id_cv = {$cv['id']}");
    while ($c = $res->fetch_assoc()):
    ?>
      <div class="item">
        <p><?= htmlspecialchars($c['nombre']) ?></p>
        <div class="acciones">
          <a href="editar/editar_conocimiento.php?id=<?= $c['id'] ?>" class="editar">Editar</a>
          <a href="eliminar/eliminar_conocimiento.php?id=<?= $c['id'] ?>" class="eliminar">Eliminar</a>
        </div>
      </div>
    <?php endwhile; ?>

    <h3>
      Idiomas
      <a href="agregar/agregar_idioma.php" class="btn-agregar">+ Agregar</a>
    </h3>
    <?php
    $res = $conexion->query("SELECT * FROM idioma WHERE id_cv = {$cv['id']}");
    while ($i = $res->fetch_assoc()):
    ?>
      <div class="item">
        <p><?= htmlspecialchars($i['nombre']) ?></p>
        <div class="acciones">
          <a href="editar/editar_idioma.php?id=<?= $i['id'] ?>" class="editar">Editar</a>
          <a href="eliminar/eliminar_idioma.php?id=<?= $i['id'] ?>" class="eliminar">Eliminar</a>
        </div>
      </div>
    <?php endwhile; ?>

    <h3>
      Información Adicional
      <a href="agregar/agregar_info.php" class="btn-agregar">+ Agregar</a>
    </h3>
    <?php
    $res = $conexion->query("SELECT * FROM informacionadicional WHERE id_cv = {$cv['id']}");
    while ($a = $res->fetch_assoc()):
    ?>
      <div class="item">
        <p><?= htmlspecialchars($a['tipo']) ?></p>
        <div class="acciones">
          <a href="editar/editar_info.php?id=<?= $a['id'] ?>" class="editar">Editar</a>
          <a href="eliminar/eliminar_info.php?id=<?= $a['id'] ?>" class="eliminar">Eliminar</a>
        </div>
      </div>
    <?php endwhile; ?>

    <h3>
      Portafolio
      <a href="agregar/agregar_portafolio.php" class="btn-agregar">+ Agregar</a>
    </h3>
    <?php
    $res = $conexion->query("SELECT * FROM portafolio WHERE id_cv = {$cv['id']}");
    while ($p = $res->fetch_assoc()):
    ?>
      <div class="item">
        <img src="<?= htmlspecialchars($p['enlace']) ?>" alt="" style="max-width: 150px;">
        <p><?= htmlspecialchars($p['descripcion']) ?></p>
        <div class="acciones">
          <a href="editar/editar_portafolio.php?id=<?= $p['id'] ?>" class="editar">Editar</a>
          <a href="eliminar/eliminar_portafolio.php?id=<?= $p['id'] ?>" class="eliminar">Eliminar</a>
        </div>
      </div>
    <?php endwhile; ?>

  </div>
</body>

</html>