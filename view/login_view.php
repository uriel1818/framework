<section class="w3-container">
    <div class="w3-display-container" style="height:100vh">
        <div class="w3-display-middle w3-col l6 m10 s12 w3-center">

            <!-- Traigo el nombre de la app y el titulo de la página-->
            <div class="">
                <h1><?php echo $data['title'] . ' | ' . NOMBRE_SITIO; ?></h1>
            </div>

            <!-- Muestro errores al logearse -->
            <?php if (isset($data['errors']['usuario'])) : ?>
                <p class="w3-text-red">
                    <?php echo $data['errors']['usuario']; ?>
                </p>
            <?php endif; ?>

            <!-- Formulario de login -->
            <div class="w3-container w3-padding-16 w3-card w3-round-large">
                <form action="index.php?c=login&a=login" method="post">

                    <!-- INPUT NOMBRE con las validaciones de errores -->
                    <input required type="text" name="nombre" id="nombre" class="w3-input <?php if (isset($data['errors']['nombre'])) {
                                                                                                echo 'w3-border-red w3-border';
                                                                                            } ?>">
                    <label for="nombre" class="w3-small w3-left">Usuario</label>
                    <?php if (isset($data['errors']['nombre'])) : ?>
                        <?php foreach ($data['errors']['nombre'] as $error) : ?>
                            <p class="w3-text-red w3-small"><?php echo $error; ?></p>
                        <?php endforeach ?>
                    <?php endif; ?>

                    <!-- INPUT PASSWORD con las validaciones de errores -->
                    <input required type="password" name="password" id="password" class="w3-input <?php if (isset($data['errors']['password'])) {
                                                                                                        echo 'w3-border-red w3-border';
                                                                                                    } ?>">
                    <label for="password" class="w3-small w3-left">password</label>
                    <?php if (isset($data['errors']['password'])) : ?>
                        <?php foreach ($data['errors']['password'] as $error) : ?>
                            <p class="w3-text-red w3-small"><?php echo $error; ?></p>
                        <?php endforeach ?>
                    <?php endif; ?>
                    <br>

                    <!-- Boton SUBMMIT -->
                    <div class="w3-margin-top" >
                        <button type="submit" class="w3-btn w3-hover-indigo w3-round-xxlarge w3-blue w3-block" style="outline: none;">Entrar</button>
                    </div>


                </form>
            </div>


        </div>
    </div>
</section>