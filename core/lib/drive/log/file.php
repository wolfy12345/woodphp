<?php
namespace core\lib\drive\log;

use core\lib\loadConfig;

class file
{
    public $path;

    public function __construct()
    {
        $this->path = loadConfig::get('PATH', 'log');
    }

    public function log($message, $file = 'log')
    {
        if (!is_dir($this->path . date('Ymd'))) {
            mkdir($this->path . date('Ymd'), '0777', true);
        }

        $message = date('Y-m-d H:i:s', time()) . json_encode($message) . ' ' . PHP_EOL;
        file_put_contents($this->path . date('Ymd') . '/' . $file . '.txt', $message, FILE_APPEND);
    }
}