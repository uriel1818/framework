<?php
namespace app\helpers;
class url_helper{
    private $controller;
    private $action;
    private $params;
    
    public function __construct(Type $var = null)
    {
        # code...
    }

    public function setController($controller)
    {
        $this->controller = $controller;


    }

    public function setAction($action)
    {
        $this->action = $action;

        
    }

    public function setParams($params)
    {
        $this->params = $params;

   
    }
}