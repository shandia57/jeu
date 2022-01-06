<?php
namespace App\Controller;


use Framework\Controller\AbstractController;

class Game extends AbstractController
{

    public function __invoke($player): string
    {
            $users = [];
            if(!empty($_POST['players'])){
                $users = $_POST['players'];
            }


            return $this->render('/game.html.twig', [

                "users" => $users,
            ]);
        }




}