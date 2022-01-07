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

                // Create a FOR loop to send mail 

                // $user = explode(",", $_POST['players'][0]);
                // $to_email = 'alexandre57450@hotmail.fr';
                // $subject = 'Rejoins la partie !';
                // $message = "Rejoins la partie via ce lien -> http://framework.local/game?player=$user[0]";
                // $headers = 'From: noreply @ company . com';
                // mail($to_email,$subject,$message,$headers);
                
            }





            return $this->render('/game.html.twig', [

                "users" => $users,
            ]);
        }




}