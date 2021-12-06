<?php
use Framework\Kernel;

require_once(__DIR__ . '/../vendor/autoload.php');
use  App\Classes\Connection;

$kernel = new Kernel();
// $kernel->handle($_SERVER['REQUEST_METHOD'], explode("?", $_SERVER['REQUEST_URI'])[0]);
$kernel->handle($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);


