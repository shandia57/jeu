<?php
namespace App\Controller;


use App\Class\Color\Color;
use Framework\Controller\AbstractController;

class Test extends AbstractController
{

    public function __invoke(): string
    {
        $players =[];

     if(!empty($_POST)){
        $player1 =$_POST['player1'];
        $player2 =$_POST['player2'];
        $player3 =$_POST['player3'];
        $player4 =$_POST['player4'];
        $player5 =$_POST['player5'];
        $player6 =$_POST['player6'];

        array_push($players,$player1,$player2,$player3,$player4,$player5,$player6);
     }
     print_r($players);
        return $this->render('/test.html.twig', [
                "players" => $players,

            ]);
        }
}