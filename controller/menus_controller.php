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
    
    echo "<pre>";
    print_r($array);
    echo "</pre>";

   
}
public function mostrarLista(){
    $array = $this->menus->getArray();
    foreach ($array as $item) {
        if(is_array($item)){
            echo "<ul>";
            $this->mostrarLista();
            echo "</ul>";
        }else{
            echo "<li>";
            echo $item->nombre;
            echo "</li>";
        }
    }
}
}