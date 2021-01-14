<?php

namespace app\model;

require_once 'core' . MODEL_EXT;

use app\model\core_model;

class terceros_model extends core_model
{
    public $id;
    public $nombre;
    public $apellido;
    public $dni;
    public $telefono;
    public $email;
    public $comentarios;

    public function __construct()
    {
        parent::__construct();
        $this->setTable('terceros');
    }
    
}