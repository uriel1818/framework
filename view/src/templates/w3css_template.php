<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Agrego el título dinámico -->
    <title>
        <?php echo $data['title'] . ' | ' . NOMBRE_SITIO; ?>
    </title>

    <!-- Cargo los estilos css-->
    <?php
    foreach ($data['css'] as $value) {
        echo '<link rel="stylesheet" href="' . $value . '">';
    }
    ?>

</head>

<body class="w3-light-grey" style="min-width:285px; min-height:400px">

    <!-- NavBar superior fija -->
    <div class="w3-top" style="z-index:2;">
    <div class="w3-bar w3-text-light-grey " style="background-color:#333;">

    <div id="menu_button" class=" w3-btn w3-bar-item w3-rightbar w3-hide-large">&#8801</div>
    <a href="index.php" class="w3-bar-item w3-button w3-animate-top"><?php echo NOMBRE_SITIO; ?></a>
    <a href="index.php?c=login&a=logout" class="w3-right w3-bar-item w3-button w3-leftbar">Salir &#10095; </a>
    <a href="index.php?c=crud" class="w3-right w3-bar-item w3-button w3-hide-small">>> CRUD <<</a>
    </div>
    </div>

    <!-- Barra lateral -->
    <div id="sidebar" class=" w3-bar-block w3-card w3-text-light-grey w3-sidebar w3-collapse" style="width:200px;padding-top:50px; background-color:#333;">
        <a href="index.php?c=index" class="w3-bar-item w3-button w3-hover-blue ">Inicio</a>
        <a href="index.php?c=terceros&a=index" class="w3-bar-item w3-button w3-hover-blue ">Asegurados</a>
    </div>

   <!-- Contenido principal -->
   <div class="w3-row">
   <div class="w3-col w3-hide-medium w3-hide-small" style="width:200px">""</div>
   <div class="w3-rest">
   <div class="w3-container" style="padding-top:40px">
   <?php require_once($data['view']); ?>
   </div>
   </div>
   </div>
   
    <!-- Cargo los Scripts -->
    <?php
    foreach ($data['script'] as $value) {
        echo '<script type="module" defer src="' . $value . '"></script>';
    }
    ?>

</body>
</html>