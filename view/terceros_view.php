<section class="w3-section">

    <!-- Formulario -->
    <form action="index.php?c=terceros" method="post">

        <!-- Datos del tercero -->
        <div class="w3-row-padding w3-card w3-round w3-white w3-padding w3-section">
            <h3>Datos del asegurado</h3>

            <!-- Input Nombre -->
            <div class="w3-half">
                <label for="nombre" class="w3-small">Nombre</label>
                <input id="nombre" type="text" class="w3-input">
            </div>

            <!-- Input Apellido -->
            <div class="w3-half">
                <label for="apellido" class="w3-small">Apellido</label>
                <input id="apellido" type="text" class="w3-input">
            </div>

            <!-- Input email -->
            <div class="w3-half">
                <label for="email" class="w3-small">Email</label>
                <input id="email" type="email" class="w3-input">
            </div>

            <!-- Input telefono -->
            <div class="w3-half">
                <label for="telefono" class="w3-small">Teléfono</label>
                <input id="telefono" type="number" class="w3-input">
            </div>

            <!-- Input DNI -->
            <div class="w3-half">
                <label for="dni" class="w3-small">DNI</label>
                <input id="dni" type="number" class="w3-input">
            </div>
            
            <!-- Input terceros_tipo -->
            <div class="w3-half">
                <label for="terceros_tipo" class="w3-small">tipo</label>
                <input id="terceros_tipo" type="number" class="w3-input" value="1">
            </div>
                
            <button class="w3-button w3-round w3-green w3-margin-top" type="submit">Guardar</button>

        </div>
    </form>

</section>