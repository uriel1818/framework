<?php

namespace app\controller;

class core_controller
{
   protected $models = array();
   protected $data = array();
   protected $loginCheck = true;
   protected $template;
   protected $name;

   public function __construct()
   {

      $this->setName();
      $this->addCss('bulma.min');
      $this->addScript('functions');
      $this->setTemplate();
      $this->setView($this->name);
      $this->setTitle($this->name);
   }


   protected function load_helper($helperName)
   {
      require_once HELPERS . $helperName . HELPERS_EXT;
      $nameSpace = 'app\\helpers\\' . $helperName . '_helper';
      $helper = new $nameSpace;
      return $helper;
   }


   protected function setName($name = DEFAULT_CONTROLLER)
   {
      if (!isset($_GET['c'])) {
         $this->name = $name;
      } else {
         $this->name = $_GET['c'];
      }
   }
   protected function addModel($model)
   {
      require_once MODEL . $model . MODEL_EXT;
      $namespace = 'app\model\\' . $model . '_model';
      $class = new $namespace;
      $this->models[$model] = $class;
      return $class;
   }
   
   protected function loginCheck()
   {
      if (!isset($_SESSION['usuario']) and $this->loginCheck == true) {
         $this->irA('login');
      }
   }
   protected function irA($controller, $action = null, $parameters = null)
   {
      header('location: ' . $this->urlMaker($controller, $action, $parameters));
   }
   protected function setTemplate($template = DEFAULT_TEMPLATE)
   {
      $this->template = TEMPLATES . $template . TEMPLATES_EXT;
   }

   protected function addCss($css)
   {
      $this->data['css'][] = CSS . $css . '.css';
   }
   protected function addScript($script)
   {
      $this->data['script'][] = JAVASCRIPT . $script . '.js';
   }
   protected function setTitle($title)
   {
      $this->data['title'] = ucfirst(strtolower($title));
   }

   protected function setView($view)
   {
      $this->data['view'] = VIEW . $view . VIEW_EXT;
   }
   protected function urlMaker($controller = NULL, $action = NULL, $params = NULL)
   {
      if (isset($controller)) {
         $c = 'c=' . $controller;
      } else {
         $c = '';
      }
      if (isset($action)) {
         $a = '&a=' . $action;
      } else {
         $a = '';
      }
      if (isset($params)) {
         $p = '&p=' . $params;
      } else {
         $p = '';
      }

      $url = 'index.php?' . $c . $a . $p;

      return $url;
   }

   protected function run()
   {
      $this->loginCheck();
      $data = $this->data;
      ob_start();
      require_once $this->template;
      ob_end_flush();
   }

   //creo base de datos, elimino datos de las tablas y las vuelvo a llenar con datos de prueba.
   public function createDb()
   {
      $this->addModel('migration');
      $this->models['migration']->dropTables();
      $this->models['migration']->createTables();
      $this->models['migration']->fillTablesDemo();
      $this->irA('index');
   }
   public function index()
   {
      $this->run();
   }
}
