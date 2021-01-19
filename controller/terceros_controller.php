<?php

namespace app\controller;

require_once 'core' . CONTROLLER_EXT;

use app\controller\core_controller;

class terceros_controller extends core_controller
{

    private $terceros;

    public function __construct()
    {
        parent::__construct();
        $this->setTitle('Asegurados');
        $this->terceros = $this->addModel('terceros');
        $this->loadHelper('form_validations');
    }

    public function save()
    {   
        
         
        $this->fillObjet($this->terceros);
        
        $this->terceros->insert();
    }

}