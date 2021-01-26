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
     * @return objet
     */
    public function getAll()
    {
        $obj = $this->db->query('SELECT * FROM ' . $this->table,PDO::FETCH_OBJ);
        return $obj->fetchAll();
    }

    /**
     * Obtengo registro filtrado por id
     * @return Objet
     */
    public function getById($id)
    {
        $obj = $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = ' . $this->id);
        return $obj->fetchAll();
    }

    /**
     * Select filtrado con where
     * @return objet
     */
    public function getWhere($column = 'id', $operator = '=', $value){
        $obj = $this->db->query('SELECT * FROM ' . $this->table . ' WHERE '.$column.$operator.$value);
        return $obj->fetchAll();
    }

    /**
     *  devuelvo los atributos y valores de la clase actual
     * menos los que se especifican en -> $array_unset
     *  @return array
     */
    public function getProperties($array_unset = NULL)
    {
        $array_unset[] = 'db';
        $array_unset[] = 'table';
        $properties = get_object_vars($this);

            foreach ($array_unset as $key => $value) {
                unset($properties[$value]);
            }
        
        return $properties;
    }


    /**
     * Inserto los datos de la clase actual en base de datos
     * @return objet
     */
    public function insert($keys,$values)
    {
       $query = $this->db->exec("INSERT INTO {$this->table} ({$keys}) VALUES ({$values})") ;
        var_dump($query);
        return $query;
    }

    /**
     * Ejecuto la sentencia SQL y muestro el error o devuelvo el resultado de la consulta
     * @objet
     */
    public function query($query)
    {
        try {
          $obj =  $this->db->query($query);
        } catch (Exception $e) {
            echo "NO SE EJECUTÓ CORRECTAMETNTE LA SENTENCIA EN ==> core_model.php <==  <br>";
            echo $e->getMessage();
            die;
        }
        return $obj->fetchAll(PDO::FETCH_OBJ);
    }

    public function update()
    {
        echo "UPDATE CONTROLLER";
    }


    /**
     * Get the value of db
     */ 
    public function getDb()
    {
        return $this->db;
    }

    /**
     * Get the value of table
     */ 
    public function getTable()
    {
        return $this->table;
    }
}
