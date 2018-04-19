<?php

namespace core\lib;

class loadConfig
{
    public static $cacheConf = [];

    public static function get($name, $file)
    {
        if(isset(self::$cacheConf[$file])) {
            return self::$cacheConf[$file][$name];
        } else {
            $path = CORE . '/config/' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                if (isset($conf[$name])) {
                    self::$cacheConf[$file] = $conf;
                    return $conf[$name];
                } else {
                    throw new \Exception("没有这个配置项" . $name);
                }
            } else {
                throw new \Exception("找不到配置文件" . $file);
            }
        }
    }

    public static function all($file) {
        if(isset(self::$cacheConf[$file])) {
            return self::$cacheConf[$file];
        } else {
            $path = CORE . '/config/' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                self::$cacheConf[$file] = $conf;
                return $conf;
            } else {
                throw new \Exception("找不到配置文件" . $file);
            }
        }
    }
}