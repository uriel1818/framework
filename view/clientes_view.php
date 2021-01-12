<section class="w3-section">




    <!-- Formulario -->
    <form action="#" method="post">

        <!-- Grupos aseguradores -->
        <label for="grupos">Seleccionar grupo aseguradora</label>
        <select id="grupos" class="w3-input" name="grupos">
            <option value="grupo1">Grupo 1</option>
            <option value="grupo2">Grupo 2</option>
        </select>


        <!-- Datos del asegurado -->
        <div class="w3-row-padding w3-card w3-round w3-white w3-padding w3-section">
            <h3>Datos del asegurado</h3>

            <!-- Input Nombre -->
            <div class="w3-half">
                <input id="nombre" type="text" class="w3-input">
                <label for="nombre" class="w3-small">Nombre</label>
            </div>

            <!-- Input Apellido -->
            <div class="w3-half">
                <input id="apellido" type="text" class="w3-input">
                <label for="apellido" class="w3-small">Apellido</label>
            </div>

            <!-- Input DNI -->
            <div class="w3-half">
                <input id="dni" type="number" class="w3-input">
                <label for="dni" class="w3-small">DNI</label>
            </div>

            <!-- Input email -->
            <div class="w3-half">
                <input id="email" type="email" class="w3-input">
                <label for="email" class="w3-small">Email</label>
            </div>

            <!-- Input telefono -->
            <div class="w3-half">
                <input id="telefono" type="number" class="w3-input">
                <label for="telefono" class="w3-small">Teléfono</label>
            </div>

        </div>

        <!-- Datos del vehículo -->
        <div class="w3-row-padding w3-card w3-round w3-white w3-padding w3-section">
            <h3>Datos del vehículo</h3>

            <!-- Input marca  -->
            <div class="w3-half">
                <input id="marca" type="number" class="w3-input">
                <label for="marca" class="w3-small">Marca</label>
            </div>

            <!-- Input version -->
            <div class="w3-half">
                <input id="version" type="number" class="w3-input">
                <label for="version" class="w3-small">version</label>
            </div>

            <!-- Input año -->
            <div class="w3-half">
                <input id="año" type="number" min="1900" max="2099" step="1" class="w3-input">
                <label for="año" class="w3-small">año</label>
            </div>

            <!-- Input GNC -->
            <div class="w3-row">
                
                <div class="w3-half w3-margin-top">
                <span>Usa GNC?</span>
                    <input type="radio" id="si" name="gnc" value="si">
                    <label for="si">Si</label>
                    <input type="radio" id="no" name="gnc" value="no">
                    <label for="no">No</label>
                </div>
            </div>




        </div>

    </form>

</section>