<?php

namespace app\controller;

require_once 'core' . CONTROLLER_EXT;

use app\controller\core_controller;

class migration_controller extends core_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->addModel('migration');
    }

    private function createDb()
    {
        /** elimino todas las tablas **/
        $this->data['errors']['dropTables'] = $this->models['migration']->dropTables();

        /**creo las tablas que son necesarias para el funcionamiento del sistema como usuarios y menus*/
        $this->data['errors']['createCoreTables'] = $this->models['migration']->createCoreTables();

        /**creo las tablas propias del programita que necesito*/
        $this->data['errors']['createTables'] = $this->models['migration']->createTables();

        /**completo las tablas con datos fijos y/o datos de prueba*/
        $this->data['errors']['fillTablesDemo'] = $this->models['migration']->fillTablesDemo();
    }

    public function index()
    {
        $this->createDB();
        $this->run();
    }
}
