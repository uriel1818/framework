<?php

namespace app\controller;

class core_controller
{
   protected $models = array();
   protected $data = array();
   protected $loginCheck = true;
   protected $template;
   protected $controller_name;

   public function __construct()
   {
      $this->setControllerName();
      $this->addCss(DEFAULT_CSS);
      $this->addScript('functions');
      $this->setTemplate();
      $this->setView($this->controller_name);
      $this->setTitle($this->controller_name);
   }


   protected function loadHelper($helperName)
   {
      require_once HELPERS . $helperName . HELPERS_EXT;
      $nameSpace = 'app\\helpers\\' . $helperName . '_helper';
      $helper = new $nameSpace;
      return $helper;
   }


   protected function setControllerName($name = DEFAULT_CONTROLLER)
   {
      $this->controller_name = $name;
      if (isset($_GET['c']) && file_exists(CONTROLLER . $_GET['c'] . CONTROLLER_EXT)) {
         $this->controller_name = $_GET['c'];
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
   public function index()
   {
      $this->run();
   }
}
