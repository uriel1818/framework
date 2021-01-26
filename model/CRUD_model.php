<?php

namespace app\model;

require_once 'core' . MODEL_EXT;

use app\model\core_model;

class CRUD_model extends core_model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function createTable($table, $columns)
    {
        $sentence = "CREATE TABLE IF NOT EXISTS {$table} ( {$columns} );";
        return $this->query($sentence);
    }
}
