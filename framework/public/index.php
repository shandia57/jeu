<?php
use Framework\Kernel;

require_once(__DIR__ . '/../vendor/autoload.php');
require_once "../src/App/Connection/connection.php";

$kernel = new Kernel();
// $kernel->handle($_SERVER['REQUEST_METHOD'], explode("?", $_SERVER['REQUEST_URI'])[0]);
$kernel->handle($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);


