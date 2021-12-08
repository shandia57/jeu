<?php
namespace App\Controller;


use Framework\Controller\AbstractController;

class Fail extends AbstractController
{


    public function __invoke(): string
    {
        // A mettre en commentaire pour tester le logout
        session_start();
        if(isset($_SESSION['user']) && $_SESSION['user']['roles'] === "ROLES_ADMIN" ){
            header("Location: /");
        }
            return $this->render('/fail.html.twig', [
            ]);
        }
}