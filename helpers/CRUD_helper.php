<?php

namespace app\helpers;

class CRUD_helper
{
    public $className;
    public $columns;

    public function getView()
    {
        $inputs = $this->getInputs();
        $submit = $this->submitButton();
        $string = <<<EOT
            <section class="w3-section">
             
            <!-- Formulario -->
            <form action="index.php?c={$this->className}&a=save" method="POST">
                 
                <!-- {$this->className} -->
                <div class="w3-row-padding w3-card w3-round w3-white w3-padding w3-section">
                    <h3>{$this->className}</h3>
                     
                     {$inputs}
                     
                    </div>
                    {$submit}
                </form>
            </section>
        EOT;
        return $string;
    }

    public function getInputs()
    {
        $string = "";
        foreach ($this->columns as $key => $obj) {
            $foo = $obj->input . "Input";
            $string .= $this->$foo($obj);
        }
        return $string;
    }

    public function textInput($obj)
    {
        
        $string = <<<EOT
        <!-- Input {$obj->nombre} -->
        <div class="w3-half">
        <label for="{$obj->nombre}" class="w3-small">{$obj->nombre}</label>
        <input class="w3-input" id="input_{$obj->nombre}" name="{$obj->nombre}" type="{$obj->input} {$this->required($obj->required)}">
        
        <?php if (isset(\$data['errors']['{$obj->nombre}'])) : ?>
        <?php foreach (\$data['errors']['{$obj->nombre}'] as \$error) : ?>
            <p class="w3-text-red w3-small"><?php echo \$error; ?></p>
        <?php endforeach ?>
        <?php endif; ?>
        </div>
        EOT;
        return $string;
    }

    public function submitButton()
    {
        $string = <<<EOT
        <!-- Submit -->
            <div class="w3-row">
                <div class="w3-margin-top w3-center">
                    <input type="submit" value="Guardar" class="w3-button w3-green w3-round">
                </div>
            </div>
        EOT;

        return $string;
    }



    /**
     * Devuelvo una plantilla de la clase controller para los archivos *_controller.php
     * @return String
     */
    public function getController()
    {
        $string = "<?php
        namespace app\controller;
        require_once 'core'.CONTROLLER_EXT;
        use app\controller\core_controller;
        class {$this->className}_controller extends core_controller
        {
            public function __construct()
            {
                parent::__construct();
                \$this->addModel('{$this->className}');
                \$this->loadHelper('form_validations');
            }
        }";
        return $string;
    }


    /**
     * Genera una plantilla de las clases model para archivos *_model.php
     * @return String
     */
    public function getModel()
    {
        $properties = $this->propertiesToString();

        $classString =
            "<?php
        namespace app\model;
        require_once 'core' . MODEL_EXT;
        use app\model\core_model;
        class {$this->className}_model extends core_model
        {
            {$properties}

            public function __construct()
            {
                parent::__construct();
                \$this->setTable('{$this->className}');
            }

        }
        ";
        return $classString;
    }


    /**
     * Creo un string con la palabra "public" + nombre de las propiedades + ";"
     *@return String
     */
    public function propertiesToString()
    {
        $properties = "public \$id;";
        foreach ($this->columns as $key => $obj) {
            $properties .= "public \$$obj->nombre; ";
        }
        return $properties;
    }

    /**
     * Set the value of columns
     */
    public function setColumns($columns)
    {
        $this->columns = $columns;
    }

    public function required($value)
    {
        return $required = !empty($value) ? "required" : "";
    }
}
