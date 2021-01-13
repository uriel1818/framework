<?php

namespace app\model;

use PDO;


class core_model
{
    protected $db;
    protected $table;

    public function __construct()
    {
        try {
            $this->db = new PDO("sqlite:" . MODEL . NOMBRE_SITIO . ".db");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "NO SE CONECTÓ A LA BASE DE DATOS";
            echo $e->getMessage();
            exit;
        }
    }


    protected function setTable($table)
    {
        $this->table = $table;
    }

    /**
     * Obtengo todos los registros de la tabla actual
     */
    public function getAll()
    {
        $obj = $this->db->query('SELECT * FROM ' . $this->table);
        return $obj->fetchAll();
    }

    /**
     * Obtengo registro por id
     */
    public function getById($id)
    {
        $obj = $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = ' . $this->id);
        return $obj->fetchAll();
    }

    /**
     * devuelvo los atributos y valores de la clase actual
     */
    protected function getVars()
    {
        $attributes = get_object_vars($this);
        return $attributes;
    }

    /**
     * devuelvo string separado por coma de los atributos de la clase actual
     */
    protected function getKeys()
    {
        $keys = implode(',',array_keys($this->getVars()));
        return $keys;
    }

    /**
     *  obtengo string separado por coma 
     *  con los valores de los atributos de la clase actual
    */
    protected function getValues()
    {    
        $values = implode(',',array_values($this->getVars()));
        return $values;
    }

    public function insert()
    {
        $keys = $this->getKeys();
        $values = $this->getValues();

        $obj = $this->db->query('INSERT INTO '. $this->table . ' ('. $keys .') values ('. $values .') ');
        return $obj;
    }    
}
