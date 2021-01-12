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

<body class="w3-light-grey">

    <!-- NavBar superior fija -->
    <div class="w3-top" style="z-index:2;">
    <div class="w3-bar w3-white w3-card ">

    <div id="menu_icon" class=" w3-btn w3-bar-item w3-rightbar w3-hide-large" onclick="sidebar.openClose()">&#8801</div>
    <a href="index.php" class="w3-bar-item w3-button w3-animate-top"><?php echo NOMBRE_SITIO; ?></a>
    <a href="index.php?c=login&a=logout" class="w3-right w3-bar-item w3-button w3-leftbar">Salir &#10095; </a>
    </div>
    </div>

    <!-- Barra lateral -->
    <div id="sidebar" class=" w3-bar-block w3-card w3-animate-left w3-black w3-sidebar w3-collapse" style="width:200px;padding-top:50px; outline:none" tabindex="1">
        <a href="index.php?c=clientes&a=index" class="w3-bar-item w3-button w3-hover-blue ">Clientes</a>
        <a href="#" class="w3-bar-item w3-button w3-hover-blue ">Menu 2</a>
        <a href="#" class="w3-bar-item w3-button w3-hover-blue ">Menu 3</a>
        <a href="#" class="w3-bar-item w3-button w3-hover-blue ">Menu 4</a>
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
        echo '<script type="text/javascript" src="' . $value . '"></script>';
    }
    ?>

</body>
</html>