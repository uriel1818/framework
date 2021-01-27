<?php

namespace app\model;

require_once 'core' . MODEL_EXT;

use app\model\core_model;

class CRUD_inputs_model extends core_model
{

    public $id;
    public $nombre;

    public function __construct()
    {
        parent::__construct();
        $this->setTable('CRUD_inputs');
    }
}