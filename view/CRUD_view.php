<section class="w3-section">
    <header style="margin:auto" class="w3-center">
        <h1>Generador de CRUD'S 4.0</h1>
        <h4>Let's start!</h4>
    </header>
    <form action="index.php?c=CRUD&a=guardar" method="post">
        <div class="w3-card w3-white w3-padding w3-container w3-round w3-row-padding w3-section">



            <!-- Nombre -->
            <div class="w3-half">
                <label for="nombre" class="w3-small">nombre de la columna</label>
                <input class="w3-input" type="text" name="nombre" id="nombre" list="nombres" autofocus>
            </div>




            <!-- fk_CRUD_columnas_tipos -->
            <div class="w3-half">
                <label for="fk_CRUD_columnas_tipos" class="w3-small">tipo de columna</label>
                <select name="fk_CRUD_columnas_tipos" id="fk_CRUD_columnas_tipos" class="w3-input">
                    <?php foreach ($data['CRUD_columnas_tipos'] as $key => $value) : ?>
                        <option value="<?php echo $value->id; ?>"    <?php if($value->nombre == "text") echo 'selected="selected"'; ?>    ><?php echo $value->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


            <!-- tablas -->
            <div class="w3-half">
                <label for="fk_CRUD_tablas" class="w3-small">a que tabla pertenece</label>
                <select name="fk_CRUD_tablas" id="fk_CRUD_tablas" class="w3-input">
                    <?php foreach ($data['CRUD_tablas'] as $key => $value) : ?>
                        <option value="<?php echo $value->id; ?>"><?php echo $value->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


            <!-- fk_CRUD_inputs -->
            <div class="w3-half">
                <label for="fk_CRUD_inputs" class="w3-small">inputs</label>
                <select name="fk_CRUD_inputs" id="fk_CRUD_inputs" class="w3-input">
                    <?php foreach ($data['CRUD_inputs'] as $key => $value) : ?>
                        <option value="<?php echo $value->id; ?>"  <?php if($value->nombre == "text") echo 'selected="selected"'; ?>  >  <?php echo $value->nombre; ?>  </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- reference_to -->
            <div class="w3-half">
                <label for="reference_to" class="w3-small">es foranea de..</label>
                <select name="reference_to" id="reference_to" class="w3-input"> 
                <option value="NULL" selected="selected"></option>
                    <?php foreach ($data['CRUD_tablas'] as $key => $value) : ?>
                       
                        <option value="<?php echo $value->id; ?>" ><?php echo $value->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
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