<?php
session_start();
require_once 'config.php';

$c = DEFAULT_CONTROLLER;
$a = DEFAULT_ACTION;

if (isset($_GET['c'])) {
    $c = $_GET['c'];
}
if (isset($_GET['a'])) {
    $a = $_GET['a'];
}
if (!file_exists(CONTROLLER . $c . CONTROLLER_EXT)) {
    $c = DEFAULT_CONTROLLER;
}

require_once CONTROLLER . $c . CONTROLLER_EXT;
$namespace = 'app\controller\\' . $c . '_controller';

$class = new $namespace;

if (!method_exists($class, $a)) {
    $a = DEFAULT_ACTION;
}

$class->$a();
