    <section class="w3-section">
     
    <!-- Formulario -->
    <form action="index.php?c=terceros&a=save" method="POST">
         
        <!-- terceros -->
        <div class="w3-row-padding w3-card w3-round w3-white w3-padding w3-section">
            <h3>terceros</h3>
             
             <!-- Input nombre -->
<div class="w3-half">
<label for="nombre" class="w3-small">nombre</label>
<input class="w3-input" id="input_nombre" name="nombre" type="text required">

<?php if (isset($data['errors']['nombre'])) : ?>
<?php foreach ($data['errors']['nombre'] as $error) : ?>
    <p class="w3-text-red w3-small"><?php echo $error; ?></p>
<?php endforeach ?>
<?php endif; ?>
</div>
             
            </div>
            <!-- Submit -->
    <div class="w3-row">
        <div class="w3-margin-top w3-center">
            <input type="submit" value="Guardar" class="w3-button w3-green w3-round">
        </div>
    </div>
        </form>
    </section>