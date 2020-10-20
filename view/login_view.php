<div class="hero is-fullheight">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-5-tablet is-4-desktop is-3-widescreen">
                    <h1 class="title"><?php echo $data['title'] . ' | ' . NOMBRE_SITIO; ?></h1>

                    <?php if (isset($data['errors']['usuario'])) : ?>
                        <p class="notification is-danger">
                            <?php echo $data['errors']['usuario']; ?>
                        </p>
                    <?php endif; ?>

                    <form action="index.php?c=login" method="POST" class="box has-background-light">
                        <div class="field">
                            <label class="label">* Usuario</label>
                            <div class="control">
                                <input required type="text" name="nombre" class="input has-text-centered <?php if (isset($data['errors']['nombre'])) {
                                                                                                                echo 'is-danger';
                                                                                                            } ?>">
                            </div>
                            <?php if (isset($data['errors']['nombre'])) : ?>
                                <?php foreach ($data['errors']['nombre'] as $error) : ?>
                                    <p class="help is-danger"><?php echo $error; ?></p>
                                <?php endforeach ?>
                            <?php endif; ?>

                        </div>
                        <div class="field">
                            <label class="label">* Contraseña</label>
                            <div class="control">
                                <input required type="password" name="password" class="input has-text-centered <?php if (isset($data['errors']['password'])) {
                                                                                                                    echo 'is-danger';
                                                                                                                } ?>">
                            </div>
                        </div>

                        <?php if (isset($data['errors']['password'])) : ?>
                            <?php foreach ($data['errors']['password'] as $error) : ?>
                                <p class="help is-danger"><?php echo $error; ?></p>
                            <?php endforeach ?>
                        <?php endif; ?>

                        <br>
                        <div class="control">
                            <button class="button is-link" type="submit">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>