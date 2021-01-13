<?php
namespace app\controller;
require_once 'core'.CONTROLLER_EXT;
use app\controller\core_controller;

class terceros_controller extends core_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setTitle('Asegurados');
        $this->addModel('terceros');
    }

    

}