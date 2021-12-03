<?php
namespace App\Controller;

use App\Classes\User;
use Framework\Controller\AbstractController;
use App\Classes\Color;

class UserLogin extends AbstractController
{


    public function __invoke(): string
    {
        session_start();
        $users=(new User)->getUsers();


        $colors = (new Color)->saveColorToArray(
            $color1 = (new Color)->convertRGBToHex(35, 107, 240),
            $color2 = (new Color)->convertRGBToHex(240, 102, 62,),
            $color3 = (new Color)->convertRGBToHex(240, 188, 74),
            $color4 = (new Color)->convertRGBToHex(202, 50, 240),
            $color5 = (new Color)->convertRGBToHex(26, 240, 79),
            $color6 = (new Color)->convertRGBToHex(240, 218, 62),
            $color7 = (new Color)->convertRGBToHex(240, 70, 104),
            $color8 = (new Color)->convertRGBToHex(105, 2, 219),
            $color9 = (new Color)->convertRGBToHex(52, 240, 221),
            $color10 = (new Color)->convertRGBToHex(54, 180, 240),
            $color11 = (new Color)->convertRGBToHex(162, 220, 168),
        );

        if (!empty($_POST)) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $isConnected= (new User)->userConnection($username, $password);
        }
        $usersLength = sizeof($users);
           // print_r($users);
            print_r($usersLength);
           // print_r($colors);
            $res = array_map(null,$colors,$users);
            //print_r($res);

        $result = (new User)->filterArrayByKeyValue($users, 'username',$isConnected??null['username']??null);
        print_r($result);
            return $this->render('/connectToGame/test.html.twig', [
                "users" => $res,
                "user" => $isConnected?? null,
                "usersNumber" => sizeOf($result),
                "colors" => $colors,
            ]);
        }
}