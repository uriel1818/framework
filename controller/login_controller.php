<?php

namespace app\controller;

require_once 'core' . CONTROLLER_EXT;

use app\controller\core_controller;


class login_controller extends core_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loginCheck = false;
        $this->addModel('usuarios');
        $this->setTemplate('blank');
        $this->validateForm();
    }

    private function validateForm()
    {
        $helper = $this->loadHelper('form_validations');
        $helper->setValidation('nombre', array('required', 'hasWhiteSpaces'));
        $helper->setValidation('password', array('required', 'hasWhiteSpaces'));
        $this->data['errors'] = $helper->validate();
    }

    public function login()
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
        $this->run();
    }

    public function logout()
    {
        if ($_GET['a'] == 'logout') {
            session_unset();
            session_destroy();
            $this->irA('login');
        }
    }

    public function index()
    {
        $this->run();
    }
}
