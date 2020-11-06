<?php

namespace app\controller;

require_once 'core'.CONTROLLER_EXT;

use app\controller\core_controller;


class login_controller extends core_controller
{
    public function __construct()
    {
        if (isset($_SESSION['usuario'])) {
            $this->irA(DEFAULT_CONTROLLER);
            exit;
        }
        parent::__construct();
        $this->loginCheck = false;
        $this->addModel('usuarios');
        $this->setTemplate('blank');
        $helper = $this->load_helper('form');
        $helper->setValidation('nombre', array('required', 'hasWhiteSpaces'));
        $helper->setValidation('password', array('required', 'hasWhiteSpaces'));
        $this->data['errors'] = $helper->validate();
    }
    private function validateUser()
    {
        if (!isset($this->data['errors'])) {
            $this->models['usuarios']->setNombre($_POST['nombre']);
            $this->models['usuarios']->setPassword($_POST['password']);
            $query = $this->models['usuarios']->getByNombre();

            if ($query !== FALSE) {
                $_SESSION['usuario']['nombre'] = $this->models['usuarios']->getNombre();
                $_SESSION['usuario']['password'] = $this->models['usuarios']->getPassword();
                $this->irA(DEFAULT_CONTROLLER);
            } else {
                $this->data['errors']['usuario'] = 'Datos incorrectos, probá nuevamente o avisame y lo vemos. Gracias!';
            }
        }
    }
    public function index()
    {
        $this->validateUser();
        $this->run();
    }
}