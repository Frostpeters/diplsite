<?php

class Models_Config extends Models_Abstract_Model
{
    /**
     * Default constructor, loads configuration XML and populates
     * the object with the data.
     */
    public function __construct()
    {
        $this->loadGeneralConfiguration('general.xml');
        //$this->loadControllerConfiguration('controllers.xml');
        $this->loadControllers('controllers.xml');
        $this->loadDbConfiguration('db.xml');
    }

    private function loadGeneralConfiguration($filename)
    {
        $xml = $this->getConfigXml($filename);

        $this->locale = (string) $xml->locale;
        $this->smartyDir = (string) $xml->smarty_dir;
        $this->defaultDatatype = (string) $xml->default_datatype;
        $this->appDir = (string) $xml->app_dir;
    }

    /**
     * Attempts to load the configuration for the database.
     *
     * @param string $filename File to load configuration from
     */
    private function loadDbConfiguration($filename)
    {
        $xml = $this->getConfigXml($filename);

        $this->dbDsn = (string) $xml->db_dsn;
        $this->dbUser = (string) $xml->db_username;
        $this->dbPass = (string) $xml->db_password;
    }

    /**
     * Attempts to load the configuration for the controllers.
     *
     * @param string $filename File to load configuration from
     */
    private function loadControllers($filename)
    {
        $routeXml = $this->getConfigXml($filename);

        // controllers
        $this->routes = [];
        foreach ($routeXml->routes->route as $_cont) {
            $this->routes[(string) $_cont->path] = $this->xmlControllerToArray($_cont->controller);
        }

        // 404
        $this->fileNotFoundController = $this->xmlControllerToArray($routeXml->fileNotFoundController->controller);

        // Default controller
        $this->defaultRoute = (string) $routeXml->defaultRoute;
    }

    /**
     * Returns a config file as a SimpleXMLElement object.
     *
     * @param string $filename File to load configuration from
     *
     * @return SimplXMLElement
     */
    private function getConfigXml($filename)
    {
        return new SimpleXMLElement(file_get_contents(dirname(__FILE__).'/../config/'.$filename));
    }

    /**
     * Converts a SimpleXMLElement Controller into an array.
     *
     * @param SimpleXMLElement $controller Controller XML Element
     *
     * @return array
     */
    private function xmlControllerToArray($controller)
    {
        return [
            'templatefile' => (string) $controller->template,
            'filename' => (string) $controller->classfile,
            'classname' => (string) $controller->classname,

        ];
    }
}
