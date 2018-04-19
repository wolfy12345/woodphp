<?php
namespace core\lib;

use core\lib\loadConfig;

class log
{
    static $class;

    public static function init()
    {
        $drive = loadConfig::get('LOG_DRIVE', 'log');
        $class = '\core\lib\drive\log\\' . $drive;
        self::$class = new $class();
    }

    public static function log($message, $file = 'log')
    {
        self::$class->log($message);
    }
}