<?php

use App\Controller\Homepage;
use App\Controller\Admin\Question;
use App\Controller\Admin\Users;
use App\Controller\Admin\Update\Delete;
use Framework\Routing\Route;

require_once "../vendor/autoload.php";

return [
    new Route('GET', '/', Homepage::class),
    new Route('GET', '/questions', Question::class),
    new Route('POST', '/questions', Question::class),
    new Route('GET', '/users', Users::class),
    new Route('POST', '/users', Users::class),
];