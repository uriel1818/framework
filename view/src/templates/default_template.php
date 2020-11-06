<!doctype html>
<html class="no-js" lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?php echo $data['title'] . ' | ' . NOMBRE_SITIO; ?> </title>
  <?php
  foreach ($data['script'] as $value) {
    echo '<script src="' . $value . '"></script>';
  }
  foreach ($data['css'] as $value) {
    echo '<link rel="stylesheet" href="' . $value . '">';
  }
  ?>
  <meta name="theme-color" content="#fafafa">
</head>

<body>
  
  <?php

  require_once $data['view'];

  ?>



</body>

</html>