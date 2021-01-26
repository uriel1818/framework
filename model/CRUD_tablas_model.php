<?php

namespace app\model;

require_once 'core' . MODEL_EXT;

use app\model\core_model;

class CRUD_tablas_model extends core_model
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable('CRUD_tablas');
    }
}