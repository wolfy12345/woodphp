<?php

namespace app\ctrl;

use app\model\testModel;
use core\lib\log;

class indexCtrl extends \core\wood
{

    public function index()
    {
        $model = new testModel();
        $data = $model->lists();
//        p($data);

        log::log('index controller index action');
        log::log(array('a' => 1));

        $this->assign('data', "hello world");
        $this->display('index.html');
    }
}