<?php

/**Estructura de directorios */
define('NOMBRE_SITIO', 'CapitanCook');
define('SLOGAN', 'tus postres ahora más ricos');
define('ROOT', './');
define('ROOTURL','localhost.capitancook/');
define('MODEL', ROOT . 'model/');
define('VIEW', ROOT. 'view/');
define('CONTROLLER', ROOT . 'controller/');
define('HELPERS',ROOT.'helpers/');
define('SRC',VIEW.'src/');
define('IMAGENES',SRC.'images/');
define('CSS', SRC . 'css/');
define('TEMPLATES', SRC . 'templates/');
define('JAVASCRIPT',SRC.'javascript/');

/** Variables default */
define('DEFAULT_CONTROLLER','index');
define('DEFAULT_ACTION','index');
define('DEFAULT_TEMPLATE','default');


/** URLeS fijas */
define('LOGIN','index.php?c=login');


/** Extensiones de modelos, vistas y controladores ej: _model.php _view.php _controller.php*/
define('MODEL_EXT','_model.php');
define('VIEW_EXT','_view.php');
define('CONTROLLER_EXT','_controller.php');
define('HELPERS_EXT','_helper.php');
define('TEMPLATES_EXT','_template.php');

/** Menus y variables propias del diseño */
