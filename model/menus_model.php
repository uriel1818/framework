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
    public function getArray($nodes = FALSE)
    {
        $array = array();
        if (!$nodes) {
            $nodes = $this->getChilds(0);
        };
        foreach ($nodes as $node) {
            if ($childs = $this->getChilds($node->id)) {
                $array[] = array(
                    'Nombre' => $node->nombre,
                    'Hijos' => $this->getArray($childs),
                );
            } else {
                $array[] = $node;
            }
        }
      return $array;
    }

    private function getChilds($id)
    {
        $query = "select * from menus where padre = " . $id;
        $nodes = $this->db->query($query)->fetchAll(PDO::FETCH_OBJ);
        return $nodes;
    }
}