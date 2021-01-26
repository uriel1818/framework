<?php

namespace app\controller;

require_once 'core' . CONTROLLER_EXT;

use app\controller\core_controller;


class CRUD_controller extends core_controller
{
    private $tablas;
    private $columnas;
    private $CRUD_helper;
    private $className;
    private $modelPath;
    private $controllerPath;
    private $viewPath;
    private $CRUD;

    public function __construct()
    {
        parent::__construct();
        $this->addModels();
        $this->CRUD_helper = $this->loadHelper('CRUD');
        
    }

    /**
     * Agrego todos los modelos que uso en esta clase.
     */
    private function addModels(){
        $this->tablas = $this->addModel('CRUD_tablas')->getAll();
        $this->addModel('CRUD_columnas');
        $this->CRUD = $this->addModel('CRUD');
    }

    /**
     * Creo un archivo del tipo *_model.php
     */
    public function createModel()
    {
        if (!file_exists($this->modelPath)) {
            
            $this->CRUD_helper->setColumns($this->columnas);
            
            $this->createFile($this->modelPath, $this->CRUD_helper->getModel());
        }
    }

    /**
     * Creo un archivo del tipo *_controller.php
     */
    public function createController()
    {
        if (!file_exists($this->controllerPath)) {
        $this->createFile($this->controllerPath, $this->CRUD_helper->getController());
        }
    }


    /**
     * Creo un archivo del tipo *_view.php
     */
    public function createView()
    {
        if (!file_exists($this->viewPath)) {
        $this->createFile($this->viewPath, $this->CRUD_helper->getView());
        }
    }

    public function deleteModel()
    {
        try {
            unlink($this->modelPath);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleteController()
    {
        try {
            unlink($this->controllerPath);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function deleteView()
    {
        try {
            unlink($this->viewPath);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     *Guardo el archivo en la ruta especificada
     */
    public function createFile($filePath, $string)
    {
        try {
            file_put_contents($filePath, $string);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function deleteAll()
    {
        $dm = file_exists($this->modelPath) ? $this->deleteModel() : "";
        $dm = file_exists($this->controllerPath) ? $this->deleteController() : "";
        $dm = file_exists($this->viewPath) ? $this->deleteView() : "";
    }

    private function createAll()
    {
        $this->createModel();
        $this->createController();
        $this->createView();
    }

    /**
     * Defino las rutas de los modelos vistas y controladores
     */
    private function setPaths()
    {
        $this->modelPath = MODEL . $this->className . MODEL_EXT;
        $this->controllerPath = CONTROLLER . $this->className . CONTROLLER_EXT;
        $this->viewPath = VIEW . $this->className . VIEW_EXT;
    }

    /**
     * Inicializo los parámetros de esta clase.
     */
    private function setProperties($obj){
        $this->className = $obj->nombre;
        $this->columnas = $this->models['CRUD_columnas']->getColumnas($this->className);
        $this->CRUD_helper->className = $this->className;
    }

    /**
     * Convierto los datos de la base de datos en sentencias SQL válidas para crear una tabla
     * @return String
     */
    public function columnsToString(){
        $string = "id integer PRIMARY KEY,";
        foreach($this->columnas as $key => $obj){
            $required = !empty($obj->required) ? "NOT NULL" : "";
            $reference = !empty($obj->reference_to) ? $obj->reference_to : "";
            $string .= "{$obj->nombre} {$obj->type} {$required} {$reference}";
            $string .= next($this->columnas) ? "," : "";
        }
        return $string;
    }

    /**
     * Creo la funcion "validateForm()" para el controlador
     * @return String
     */
    public function validationsToString()
    {
        
    }

    /**
     * Creo la tabla
     */
    private function createTable(){
        $this->CRUD->createTable($this->className,$this->columnsToString());
    }

    public function index()
    {
        foreach ($this->tablas as $key => $obj) {
            $this->setProperties($obj); 
            $this->setPaths($obj->nombre);
            $this->createTable();
           
            $this->deleteAll();
            $this->createAll();
        }
    }
}