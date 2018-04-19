<?php

define('WOOD', realpath("./"));
define('CORE', WOOD . '/core');
define('APP', WOOD . '/app');
define('DEBUG', true);

include "vendor/autoload.php";

if (DEBUG) {
    ini_set('display_error', 'On');
} else {
    ini_set('display_error', 'Off');
}

include CORE . '/common/function.php';
include CORE . '/wood.php';

spl_autoload_register('\core\wood::load');
\core\wood::run();