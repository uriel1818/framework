<?php

namespace app\controller;

require_once 'core' . CONTROLLER_EXT;

use app\controller\core_controller;

class menus_controller extends core_controller
{
    private $menus;
    private $menu_helper;
    private $menu_name;
    public function __construct()
    {
        parent::__construct();
        $this->menus = $this->addModel('menus');
        $this->menu_helper = $this->loadHelper('menus');
        $this->menu_name = 'menu';
        
    }

    /**
     * Traigo la base de datos de menus grabada en forma de arbol
     * y la ordeno en un array multinivel para leerlo más fácil después.
     */
    private function makeArray($nodes = FALSE)
    {
        $array = array();
        if (!$nodes) {
            $nodes = $this->menus->getChilds(0);
        };
        foreach ($nodes as $node) {
            $Childs = $this->menus->getChilds($node['id']);
            if ($Childs) {
                $array[] = array(
                    'Padre' => $node,
                    'Hijos' => $this->makeArray($Childs),
                );
            } else {
                $array[] = $node;
            }
        }
        return $array;
    }


    private function getMenuPath()
    {
        return HTML_COMPONENTS . $this->menu_name . HTML_COMPONENTS_EXT;
    }

    private function getMenusHtml()
    {
        /** -Genero un array con los datos de la base de datos que me pasa el modelo.*/
        $array = $this->makeArray();


        /** -Armo la estructura HTML y la guardo en una variable.*/
        $html = $this->menu_helper->getMenu($array);


        /** -Guardo el HTML en un archivo para no tener que generar todo con cada consulta del cliente. */
        file_put_contents($this->getMenuPath(), $html);
    }
    
    public function index()
    {
        $this->getMenusHtml();
        $this->data['menu'] = $this->getMenuPath();
        $this->run();
    }
}
