<!doctype html>
<html class="no-js" lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?php echo $data['title'] . ' | ' . NOMBRE_SITIO; ?> </title>
  <?php
  foreach ($data['script'] as $value) {
    echo '<script type="text/javascript" src="' . $value . '"></script>';
  }
  foreach ($data['css'] as $value) {
    echo '<link rel="stylesheet" href="' . $value . '">';
  }
  ?>
  <meta name="theme-color" content="#fafafa">
</head>

<body class="has-navbar-fixed-top">
  <nav class="navbar has-shadow is-fixed-top">
    <div class="container">
      <div class="navbar-brand">
        <a href="./index.php" class="navbar-item"><b><?php echo NOMBRE_SITIO ?></b></a>
        <a onclick="showHideMenu()" class="navbar-burger burger ">
          <span></span>
          <span></span>
          <span></span>
        </a>
      </div>
  </nav>

  </header>
  <div class="section">
    <div class="container">
      <div class="columns">
        <div class="column is-3" id = "menu_lateral">
          <?php require_once HTML_COMPONENTS . "menu" . HTML_COMPONENTS_EXT; ?>
        </div>
        <div class="column is-9" id = "contenido">
          <?php require_once $data['view']; ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>