<?php
namespace app\controller;
require_once 'core'.CONTROLLER_EXT;
use app\controller\core_controller;

class menus_controller extends core_controller
{
    private $menus;
    public function __construct()
    {
        parent::__construct();
        $this->menus = $this->addModel('menus');
    }
public function testing()
{
    $array = $this->menus->getArray();
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
}