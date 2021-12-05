<?php
namespace App\Controller;

use App\Classes\User;
use App\Classes\Color;
use Framework\Controller\AbstractController;

class UserLogin extends AbstractController
{


    public function __invoke(): string
    {
        session_start();


        $colors = (new Color)->saveColorToArray(
            $color1 = (new Color)->convertRGBToHex(0, 173, 40),
            $color2 = (new Color)->convertRGBToHex(208, 245, 217,),
            $color3 = (new Color)->convertRGBToHex(245, 180, 49),
            $color4 = (new Color)->convertRGBToHex(161, 19, 168),
            $color5 = (new Color)->convertRGBToHex(237, 203, 245),
            $color6 = (new Color)->convertRGBToHex(44, 216, 245),
            $color7 = (new Color)->convertRGBToHex(126, 168, 15),
            $color8 = (new Color)->convertRGBToHex(168, 15, 30),
            $color9 = (new Color)->convertRGBToHex(38, 117, 245),
            $color10 = (new Color)->convertRGBToHex(171, 166, 132),
            $color11 = (new Color)->convertRGBToHex(245, 215, 19),
        );

        $users=(new User)->getUsers();
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