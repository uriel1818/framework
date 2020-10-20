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
  
<nav class="navbar">
<div class="navbar-brand">
<a href="<?php ROOTURL?>" class="navbar-item">
<img src="<?php echo IMAGENES.'logo.jpeg'; ?>" alt="CapitanCook">
</a>
</div>
<div class="navbar-menu">
<a href="#" class="navbar-item">Productos</a>
</div>
</nav>      


  <?php

  require_once $data['view'];

  ?>



</body>

</html>