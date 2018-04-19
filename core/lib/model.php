<?php

namespace core\lib;
use core\lib\loadConfig;
use Medoo\Medoo;

class model extends Medoo
{
    //数据库操作文档：https://medoo.lvtao.net/1.2/doc.php
    public function __construct()
    {
        $dbConf = loadConfig::all('database');
        parent::__construct($dbConf);
    }
}