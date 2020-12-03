<?php
require_once __DIR__ . "/Controllers/app.class.php";
ini_set('error_reporting', E_ALL);ini_set('display_errors', "On");

require_once dirname(__FILE__).'/functions.php';

$config = Models_ResourceManager::get('config');

setlocale(LC_ALL, $config->locale);
$cf = new Models_ControllerFactory();

if(isset($_GET['show_error']) && $_GET['show_error'] == 'yes'){
    ini_set('error_reporting', E_ALL);ini_set('display_errors', "On");
}else {
    ini_set('error_reporting', 0);ini_set('display_errors', "Off");
}

// Smarty setup
require_once __DIR__."/smarty/Smarty.class.php";
$smarty = new Smarty();
$smarty->setTemplateDir('smarty/templates/');
$smarty->setCompileDir('smarty/templates_c/');
$smarty->setConfigDir('smarty/configs/');
$smarty->setCacheDir('smarty/cache/');

//database connect
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . "/Controllers/helpers/db.php";
require_once __DIR__."/config/migration.php";
// Filter input
$route = $config->defaultRoute;
$action = 'index';
if (isset($_GET['controller'])) {
    $route = preg_replace('/[^a-z0-9]/', '', strtolower($_GET['controller']));
}
if (isset($_GET['action']) && !empty($_GET['action'])) {
    $action = preg_replace('/[^a-zA-Z0-9]/', '', $_GET['action']);
}

$args = array();
if (!empty($_GET['args']) && isset($_GET['args'])) {
    preg_match_all('/([^\/]+)\/([^\/]+)/', $_GET['args'], $arr);
    $args = array_combine($arr[1], $arr[2]);
}
global $app;
$app->_detect_uri();
$controller = Models_ControllerFactory::get($route, $action, $args, $smarty);
$controller->display();
