<?php

namespace App\Controller;

use Framework\Controller\AbstractController;


class Logout extends AbstractController
{
    public function __invoke(): string
    {
        session_start();
        session_destroy();
        return $this->render('test.html.twig', [
        ]);
    }

}
