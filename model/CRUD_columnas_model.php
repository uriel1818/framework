<?php

namespace app\model;

require_once 'core' . MODEL_EXT;

use app\model\core_model;

class CRUD_columnas_model extends core_model
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable('CRUD_columnas');
    }
    
    /**
     * Traigo todas las columnas de la tabla dada
     */
    public function getColumnas($tabla)
    {
        $query = 
        "SELECT cc.id, 
                cc.nombre,
                cc.reference_to,
                cc.required, 
                cct.nombre as type, 
                ct.nombre as tabla, 
                ci.nombre as input
        FROM CRUD_columnas cc
        LEFT JOIN CRUD_columnas_tipos cct ON cc.fk_CRUD_columnas_tipos = cct.id
        LEFT JOIN CRUD_tablas ct ON cc.fK_CRUD_tablas = ct.id
        LEFT JOIN CRUD_inputs ci ON cc.fk_CRUD_inputs = ci.id 
        WHERE tabla = '{$tabla}';";

        return $obj = $this->query($query);
    }
}