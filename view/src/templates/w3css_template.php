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

    <!-- Barra lateral derecho -->
    <div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-right" style="width:200px;right:0;" id="sidebar">
        <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
        <a href="#" class="w3-bar-item w3-button w3-center w3-hover-red">Cerrar X</a>
    </div>


    


    <!-- Cargo los Scripts -->
    <?php
    foreach ($data['script'] as $value) {
        echo '<script type="text/javascript" src="' . $value . '"></script>';
    }
    ?>


</body>

</html>