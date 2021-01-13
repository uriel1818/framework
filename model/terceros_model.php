<?php

namespace app\model;

require_once 'core' . MODEL_EXT;

use app\model\core_model;


class terceros_model extends core_model
{
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

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

}