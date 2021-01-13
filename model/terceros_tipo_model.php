<?php

namespace app\model;

require_once 'core' . MODEL_EXT;

use app\model\core_model;


class terceros_tipo_model extends core_model
{
<<<<<<< HEAD:model/terceros_tipo_model.php
=======

    private $id;
    public $nombre;

>>>>>>> 6729553f660dcaf35167f76cc5065fbdcf50ebf8:model/clientes_model.php
    public function __construct()
    {
        parent::__construct();
        $this->setTable('terceros');
    }
    
}