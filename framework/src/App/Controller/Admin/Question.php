<?php

namespace App\Controller\Admin;

use Framework\Controller\AbstractController;


class Question extends AbstractController
{
    public function __invoke(): string
    {
        return $this->render('admin/questions.html.twig', [
            'title' => "Questions"
        ]);
    }
}
