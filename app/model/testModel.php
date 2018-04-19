<?php
namespace app\model;

use core\lib\model;

class testModel extends model
{
    public $table = 'test';

    public function lists() {
        $ret = $this->select($this->table, "*");
        return $ret;
    }

}