<?php

class Models_ResourceManager extends Models_Abstract_Model
{
    /**
     * Database connection singleton.
     *
     * @var PDO
     */
    private static $db;

    /**
     * Config.
     *
     * @var mixed
     */
    private static $config;

    /**
     * Fetches a singleton.
     *
     * @param string $resource Name of resource to fetch
     * @param mixed  $options
     *
     * @return mixed Requested singleton
     */
    public static function get($resource, $options = false)
    {
        if (property_exists('Models_ResourceManager', $resource)) {
            if (empty(self::$$resource)) {
                self::_init_resource($resource, $options);
            }
            if (!empty(self::$$resource)) {
                return self::$$resource;
            }
        }

        return;
    }

    /**
     * Initializes a requested resource.
     *
     * @param string $resource Name of requested resource
     * @param mixed  $options
     */
    private static function _init_resource($resource, $options = null)
    {
        if ($resource === 'db') {
            $config = self::get('config');
            try {
                self::$db = new PDO(
                    $config->dbDsn,
                    $config->dbUser,
                    $config->dbPass
                );
            } catch (PDOException $pe) {
                echo "Database connection failed!\n".$pe->getMessage();
            }
        } elseif ($resource === 'config') {
            self::$config = new Models_Config();
        } elseif (
            class_exists($resource) &&
            property_exists('ResourceManager', $resource)) {
            self::$$resource = new $resource($options);
        }
    }
}
