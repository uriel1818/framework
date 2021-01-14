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
     *  devuelvo los atributos y valores de la clase actual
     * menos los que se especifican en -> $array_unset
     *  @array
     */
    public function getProperties($array_unset = NULL)
    {
        $array_unset[] = 'db';
        $array_unset[] = 'table';
        $properties = get_object_vars($this);

        if ($array_unset) {
            foreach ($array_unset as $key => $value) {
                unset($properties[$value]);
            }
        }

        return $properties;
    }

    /**
     * devuelvo string separado por coma de los atributos de la clase actual
     *  @string
     */
    private function propertiesToString($array_unset)
    {

        $keys = implode(',', array_keys($this->getProperties($array_unset)));
        return $keys;
    }

    /**
     *  obtengo string separado por coma 
     *  con los valores de los atributos de la clase actual
     *  @string
     */
    private function valuesToString($array_unset)
    {
        $values = implode(',', array_values($this->getProperties($array_unset)));

        return $values;
    }

    /**
     * Inserto los datos de la clase actual en base de datos
     */
    public function insert()
    {
        $keys = $this->propertiesToString(array('id'));
        $values = $this->valuesToString(array('id'));
echo 'INSERT INTO ' . $this->table . ' (' . $keys . ') values (' . $values . '); ';
        $obj = $this->db->query('INSERT INTO ' . $this->table . ' (' . $keys . ') values (' . $values . '); ');
        
        var_dump($obj);
        
        return $obj;

    }

    public function update()
    {
        echo "UPDATE CONTROLLER";
        //$query = 'UPDATE ' . $this->getKeys() . '';
    }
}
