<?php

class app
{
    public function __get($className)
    {
        $file = __DIR__ . "/helpers/" . $className . ".class.php";
        if (!class_exists($className) && file_exists($file) && is_file($file)) {
            require_once $file;
        } elseif (!class_exists($className)) {
            die('File ' . $file . ' not found!');
        }

        if (class_exists($className)) {
            $this->$className = new $className;
            return $this->$className;
        } else {
            die('Helper ' . $className . ' not found!');
        }
        return false;
    }
}
require_once __DIR__ . "/../smarty/Smarty.class.php";
$smarty = new Smarty();
$smarty->assign("app", $app = new app);