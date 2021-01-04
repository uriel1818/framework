<!doctype html>
<html class="no-js" lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?php echo $data['title'] . ' | ' . NOMBRE_SITIO; ?> </title>
  <?php
  foreach ($data['css'] as $value) {
    echo '<link rel="stylesheet" href="' . $value . '">';
  }
  ?>
  <meta name="theme-color" content="#fafafa">
</head>

<body class="has-background-white-ter ">

  <!-- START NAVBAR -->
  <nav class="navbar has-shadow ">
    <div class="container">
      <div class="navbar-brand">
        <a href="./index.php" class="navbar-item brand-text"><b><?php echo NOMBRE_SITIO ?></b></a>
        <a onclick="showHideMenu()" class="navbar-burger burger is-hidden-tablet" id="navbar-button">
          <span></span>
          <span></span>
          <span></span>
        </a>
      </div>
      <div class="navbar-menu">
        <div class="navbar-end">
          <div class="navbar-item">
            <div class="buttons">
              <a class="button is-danger" href="<?php echo $this->urlMaker('login', 'logout'); ?>">
                Logout
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- END NAVBAR -->

  <div class="container">
    <div class="columns">

      <!-- Importo el menú lateral -->
      <div class="column is-3">
        <?php require_once HTML_COMPONENTS . "menu" . HTML_COMPONENTS_EXT; ?>
      </div>

      <div class="column is-9 pr-0">
        <?php require_once $data['view']; ?>
      </div>
    </div>
  </div>

  <?php
  foreach ($data['script'] as $value) {
    echo '<script type="text/javascript" src="' . $value . '"></script>';
  }
  ?>
</body>

</html>