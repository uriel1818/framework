<?php

namespace app\model;

require_once 'core' . MODEL_EXT;

use app\model\core_model;
use PDO;

class usuarios_model extends core_model
{
    private $nombre;
    private $password;
    public function __construct()
    {
        parent::__construct();
        $this->setTable('usuarios');
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function getByNombre()
    {
        try {
        $query = $this->db->prepare('select nombre,password from usuarios where nombre = :nombre and password = :password');
        $query->bindParam(':nombre',$this->nombre);
        $query->bindParam(':password',$this->password);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        } catch (\Throwable $th) {
            echo '<h3>Error al seleccionar usuarios <b>&#8681</b></h3>';
            echo $th->getMessage();
            exit;
        }
        return $result;
    }
}
