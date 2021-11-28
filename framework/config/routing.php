<?php

use App\Controller\Homepage;
use App\Controller\Logout;
use App\Controller\Question;
use App\Controller\UserLogin;
use App\Controller\Subscribe;
use Framework\Routing\Route;


require_once "../vendor/autoload.php";

return [
    new Route('GET', '/', Homepage::class),
    new Route('GET', '/question/{id}', Question::class),
    new Route('GET','/connectToGame', UserLogin::class),
    new Route('POST','/connectToGame', UserLogin::class),
    new Route('GET','/subscribe', Subscribe::class),
    new Route('POST','/subscribe', Subscribe::class),
    new Route('PUT','/connectToGame', Logout::class)
];