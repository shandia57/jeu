<?php

namespace App\Controller;

use Framework\Controller\AbstractController;


class Homepage extends AbstractController
{
    public function __invoke(): string
    {
        return $this->render('home.html.twig', [
            'firstName' => 'Erikku',
            'loopUntil' => 12,
            'users' => ['Hououin', 'Kyouma'],
        ]);
    }
}
