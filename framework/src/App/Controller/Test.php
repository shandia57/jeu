<?php
namespace App\Controller;


use Framework\Controller\AbstractController;

class Test extends AbstractController
{

    public function __invoke(): string
    {
        $users = ["shandia,red", "slykillah,green", "kaiyo,blue"];

            return $this->render('/test.html.twig', [

                "users" => $users,
            ]);
        }




}