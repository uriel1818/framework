<?php

namespace app\controller;

class core_controller
{
   protected $models = array();
   protected $data = array();
   protected $loginCheck = true;
   protected $template;
   protected $controller_name;
   protected $helpers = array();

   public function __construct()
   {
      $this->setControllerName();
      $this->addCss(DEFAULT_CSS);
      $this->addScript('app');
      $this->setTemplate();
      $this->setView($this->controller_name);
      $this->setTitle($this->controller_name);
   }


   protected function loadHelper($helperName)
   {
      require_once HELPERS . $helperName . HELPERS_EXT;
      $nameSpace = 'app\\helpers\\' . $helperName . '_helper';
      $helper = new $nameSpace;
      $this->helpers[] =  $helper;
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


   /**
    * Completa el modelo con los datos del $_POST
    *(los inputs tienen que tener el mismo nombre que en el modelo)
    */
   protected function fillObjet($objet)
   {
      $objProperties = $this->getProperties(NULL, $objet);
      foreach ($objProperties as $key => $value) {
         $objet->$key = isset($_POST[$key]) ? '\'' . $_POST[$key] . '\'' : NULL;
      }
   }

   /**
    *  devuelvo los atributos y valores de la clase actual
    * menos los que se especifican en -> $array_unset
    *  @return array
    */
   public function getProperties($array_unset, $objet)
   {
      $array_unset[] = 'db';
      $array_unset[] = 'table';
      $properties = get_object_vars($objet);

      foreach ($array_unset as $key => $value) {
         unset($properties[$value]);
      }

      return $properties;
   }

   /**
    * devuelvo string separado por coma de los atributos de la clase actual
    *  @return string
    */
   private function propertiesToString($array_unset, $objet)
   {

      $keys = implode(',', array_keys($this->getProperties($array_unset, $objet)));
      return $keys;
   }

   /**
    *  obtengo string separado por coma 
    *  con los valores de los atributos de la clase actual
    *  @return string
    */
   private function valuesToString($array_unset, $objet)
   {
      $values = implode(',', array_values($this->getProperties($array_unset, $objet)));
      
      return $values;
   }

   /**
    * Grabo todos los modelos que tenga cargados en el controlador actual
    * Los inputs deben tener el mismo nombre que las propiedades del modelo
    */
   public function save($string)
   {     
      $model = $this->models[$string];
         $this->fillObjet($model);
         $properties = $this->propertiesToString(['id'], $model);
         $values = $this->valuesToString(['id'], $model);
         $model->insert($properties, $values);
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
