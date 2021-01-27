<?php

/**
 * Esta clase ayuda al controlador (CRUD_controller.php) a generar el contenido
 *  de los archivos de clases, controladores y vistas de forma automática.
 * Devuelve strings que usa el controlador para escribir los archivos *_model.php, *_view.php, *_controller.php. 
 */

namespace app\helpers;

class CRUD_helper
{
    public $className;
    public $columns;

    /**
     * Devuelve la vista completa como string
     * @return String
     */
    public function getView()
    {
        $id = $this->getIdInput();
        $inputs = $this->getInputs();
        $submit = $this->submitButton();
        $string = <<<EOT
            <section class="w3-section">
            <!-- Formulario -->
            <form action="index.php?c={$this->className}&a=save" method="POST">
                <!-- {$this->className} -->
                <div class="w3-row-padding w3-card w3-round w3-white w3-padding w3-section">
                    <h3>{$this->className}</h3>
                        {$id}
                        {$inputs}
                </div>
                {$submit}
                </form>
            </section>
        EOT;
        return $string;
    }

    private function getIdInput(){
        $string =<<<EOT
        <!-- Input id -->
        <div class="w3-col s3 m2 l2">
            <label for="id" class="w3-small">Codigo</label>
            <select name="id" class="w3-select" autofocus>
                <?php foreach(\$data['{$this->className}'] as \$key => \$value): ?>
                    <option value="<?php echo \$value->id; ?>"><?php echo \$value->id; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        EOT;
        return $string;
    }

    private function getInputs()
    {   
        $string = "";
        foreach ($this->columns as $key => $obj) {
            $foo = "input";
            if($obj->input == "textarea") $foo = "textarea";
            $string .= $this->$foo($obj);
        }
        
        return $string;
    }
    private function textarea($obj){
        $string = <<<EOT
        <!-- Input {$obj->nombre} -->
        <div class="w3-panel">
        <label for="{$obj->input}_{$obj->nombre}" class="w3-small">{$obj->nombre}</label>
        <textarea class="w3-input" id="{$obj->input}_{$obj->nombre}"  name="{$obj->nombre}" rows="6" cols="50"></textarea>    
        </div>
        EOT;
        return $string;
    }
    private function input($obj)
    {
        $string = <<<EOT
        <!-- Input {$obj->nombre} -->
        <div class="w3-half">
        <label for="{$obj->input}_{$obj->nombre}" class="w3-small">{$obj->nombre}</label>
        <input class="w3-input" id = "{$obj->input}_{$obj->nombre}" list="datalist_{$obj->nombre}" name="{$obj->nombre}" type="{$obj->input}">
        {$this->getDataList($obj)}
        {$this->getInputErrors($obj)}       
        </div>
        EOT;
        return $string;
    }

    private function getInputErrors($obj)
    {
        $string = <<<EOT
        <!-- Show input error -->
        <?php if (isset(\$data['errors']['{$obj->nombre}'])) : ?>
        <?php foreach (\$data['errors']['{$obj->nombre}'] as \$error) : ?>
            <p class="w3-text-red w3-small"><?php echo \$error; ?></p>
        <?php endforeach; ?>
        <?php endif; ?>
        EOT;
        return $string;
    }

    private function getDataList($obj)
    {
        $string = <<<EOT
        <!-- Datalist for {$obj->nombre} -->
        <datalist id="datalist_{$obj->nombre}">
        <?php foreach (\$data['{$this->className}'] as \$key => \$value) : ?>
        <option value="<?php echo \$value->{$obj->nombre}; ?>">    
        <?php endforeach; ?>
        </datalist>  
        EOT;
        return $string;
    }

    private function submitButton()
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
     * Devuelvo una plantilla de la clase controller para generar los archivos *_controller.php
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
                \$this->data['{$this->className}'] = \$this->models['{$this->className}']->getAll();
            }
            public function index(){
                \$this->run();
            }
        }";
        return $string;
    }


    /**
     * Genera una plantilla de las clases model para generar archivos *_model.php
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

}
