<?php

namespace App\Controller;

use Framework\Controller\AbstractController;


class Logout extends AbstractController
{
    public function __invoke(): string
    {
        // start a session
        session_start();

// destroy everything in this session

        unset($_SESSION);
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"],$params["httponly"]);
        }

        session_destroy();
        return $this->render('test.html.twig', [
            "user" => $_SESSION['username'] = '',
        ]);
    }

}
