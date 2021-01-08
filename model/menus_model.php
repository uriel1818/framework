<?php

namespace app\model;

require_once 'core' . MODEL_EXT;

use app\model\core_model;
use PDO;

class menus_model extends core_model
{

    public function __construct()
    {
        parent::__construct();
        $this->setTable('menus');
        
    }
  
    public function getChilds($id)
    {
        $query = "select * from ".$this->table." where padre = " . $id;
        $nodes = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $nodes;
    }
    public function getMenusByUbicacion($ubicacion)
    {
        $query = "select menus.*
        from menus 
        where id = (
        select id 
        from menus_ubicaciones
        where nombre = '" . $ubicacion .  "'
        );"
        ;
        $nodes = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}
