<?php

namespace app\controller;

require_once 'core' . CONTROLLER_EXT;

use app\controller\core_controller;

class terceros_controller extends core_controller
{
    private $terceros;
    private $terceros_tipo;

    public function __construct()
    {
        parent::__construct();
        $this->setTitle('Asegurados');
        $this->terceros = $this->addModel('terceros');
        $this->terceros_tipo = $this->addModel('terceros_tipo');        
    }
    
    private function validateForm(){
        return true;        
    }

    private function objetBuild(){
        $this->terceros->nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : NULL;
        $this->terceros->apellido = !empty($_POST['apellido']) ? $_POST['apellido'] : NULL;
        $this->terceros->dni = !empty($_POST['dni']) ? $_POST['dni'] : NULL;
        $this->terceros->fk_tercero_tipo = !empty($_POST['fk_tercero_tipo']) ? $_POST['fk_tercero_tipo'] : NULL; 
    }

    public function save(){

        $this->validateForm();
        $this->objetBuild();

        if($this->terceros->getById($_POST['id'])) {
            $this->terceros->id = $_POST['id'];
            $this->terceros->updateById();
        }
        else{
            $this->terceros->insert();
        }
    }

    public function index()
    {
        $this->data['tercero_tipo'] = $this->terceros_tipo->getAll();
        $this->run();
    }
}