<section class="w3-section">

    <!-- Formulario -->
    <form action="index.php?c=terceros&a=save" method="POST">

        <!-- Datos del asegurado -->
        <div class="w3-row-padding w3-card w3-round w3-white w3-padding w3-section">
            <h3>Datos del asegurado</h3>

            <!-- Input Codigo -->
            <div class="w3-col s3 m2 l2">
                <label for="id" class="w3-small">Codigo</label>
                <input id="id" name="id" type="text" class="w3-input" autofocus>
            </div>
            

            <!-- Input Nombre -->
            <div class="w3-half">
                <label for="nombre" class="w3-small">Nombre</label>
                <input id="nombre" name="nombre" type="text" class="w3-input">
            </div>

            <!-- Input Apellido -->
            <div class="w3-half">
                <label for="apellido" class="w3-small">Apellido</label>
                <input id="apellido" name="apellido" type="text" class="w3-input">
            </div>

            <!-- Input DNI -->
            <div class="w3-half">
                <label for="dni" class="w3-small">DNI</label>
                <input id="dni" name="dni" type="number" class="w3-input">
            </div>

            <!-- Input email -->
            <div class="w3-half">
                <label for="email" class="w3-small">Email</label>
                <input id="email" name="email" type="email" class="w3-input">
            </div>

            <!-- Input telefono -->
            <div class="w3-half">
                <label for="telefono" class="w3-small">Teléfono</label>
                <input id="telefono" name="telefono" type="number" class="w3-input">
            </div>

            <!-- Input comentarios -->
            <div class="w3-half">
                <label for="comentarios" class="w3-small">Comentarios</label>
                <textarea id="comentarios" name="comentarios" rows="4" cols="50" class="w3-input" style="resize: none;">
                </textarea>
            </div>

            <!-- Submit -->
            <div class="w3-row">
                <div class="w3-margin-top w3-center">
                    <input type="submit" value="Guardar" class="w3-button w3-green w3-round">
                </div>
            </div>

        </div>

    </form>

</section>