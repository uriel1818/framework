<?php

namespace app\model;

require_once 'core' . MODEL_EXT;

use app\model\core_model;

<<<<<<< HEAD

class terceros_model extends core_model
{
=======
class terceros_model extends core_model
{

>>>>>>> 6729553f660dcaf35167f76cc5065fbdcf50ebf8
    private $id;
    public $nombre;
    public $apellido;
    public $dni;
    public $fk_terceros_tipo;

    public function __construct()
    {
        parent::__construct();
        $this->setTable('terceros');
    }
<<<<<<< HEAD

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

}
=======
    
    public function setId($id)
    {
        $this->id = $id;
    }
}
>>>>>>> 6729553f660dcaf35167f76cc5065fbdcf50ebf8
