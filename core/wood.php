<?php

namespace core;

class wood
{

    public static $classMap = [];
    public $assigns = [];

    public static function run()
    {
        \core\lib\log::init();
//        \core\lib\log::log('test');
        $route = new \core\lib\route();
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlFile = APP . '/ctrl/' . $ctrlClass . 'Ctrl.php';
        $ctrlClass = '\app\ctrl\\' . $ctrlClass . 'Ctrl';
        if (is_file($ctrlFile)) {
            include $ctrlFile;
            $ctrl = new $ctrlClass();
            $ctrl->$action();
        } else {
            throw new \Exception('找不到控制器' . $ctrlClass);
        }
    }

    public static function load($class)
    {
        if (isset(self::$classMap[$class])) {
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = WOOD . '/' . $class . '.php';
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }

    public function assign($name, $value)
    {
        $this->assigns[$name] = $value;
    }

    public function display($file)
    {
        $path = APP . '/views/' . $file;
        if (is_file($path)) {
            $loader = new \Twig_Loader_Filesystem(APP . '/views/');
            $twig = new \Twig_Environment($loader, array(
                'cache' => WOOD . '/cacheTemplate',
                'debug' => DEBUG
            ));

            echo $twig->display("index.html", $this->assigns);
        }
    }
}