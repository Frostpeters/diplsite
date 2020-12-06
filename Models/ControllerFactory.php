<?php

class Models_ControllerFactory extends Models_Abstract_Model
{
    /**
     * Handles requests for a new controller.
     *
     * @param string $route  Name of route
     * @param string $action Controller action
     * @param array  $args   GET arguments
     * @param Smarty $smarty Smarty object to pass to controller
     *
     * @return mixed Controller
     */
    public static function get($route, $action, $args, $smarty)
    {
        $config = Models_ResourceManager::get('config');
        $controller = new Controllers_Controller($action, $args, $smarty);
        $controllerDir = dirname(__FILE__).'/../controllers/';

        // We only allow controller and action names that are alphanumeric
        $route = preg_replace('/[^a-zA-Z0-9]/', '', $route);
        $action = preg_replace('/[^a-zA-Z0-9]/', '', $action);

        if (array_key_exists($route, $config->routes)) {
            if (method_exists($config->routes[$route]['classname'], $action.'Action')) {
                $classname = $config->routes[$route]['classname'];
                $controller = new $classname($action, $args, $smarty);
            } else {
                // User is requesting action which does not exist
                $action = 'code';
                $args = array('code' => '404');
                $classname = $config->fileNotFoundController['classname'];
                $controller = new $classname($action, $args, $smarty);
            }
        } else {
            // User is requesting controller which does not exist
            $action = 'code';
            $args = array('code' => '404');
            $classname = $config->fileNotFoundController['classname'];
            $controller = new $classname($action, $args, $smarty);
        }

        return $controller;
    }
}
