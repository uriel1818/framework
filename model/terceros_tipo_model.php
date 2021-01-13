<?php

namespace app\model;

require_once 'core' . MODEL_EXT;

use app\model\core_model;


class terceros_tipo_model extends core_model
{

    private $id;
    public $nombre;
    public function __construct()
    {
        parent::__construct();
        $this->setTable('terceros');
    }
    
}