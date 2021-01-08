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
    public function getAll()
    {
        $obj = $this->db->query('SELECT * FROM ' . $this->table);
        return $obj->fetchAll();
    }
    public function getById($id)
    {
        $obj = $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = ' . $this->id);
        return $obj->fetchAll();
    }
    
}
