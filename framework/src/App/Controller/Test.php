<?php
namespace App\Controller;


use Framework\Controller\AbstractController;

class Test extends AbstractController
{

    public function __invoke(): string
    {

            return $this->render('/test.html.twig', [


            ]);
        }




}