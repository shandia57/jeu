<?php

namespace App\Controller;

use App\Class\Color\Color;
use App\Class\User\User;
use App\Class\Admin\Questions\Questions;
use Framework\Controller\AbstractController;

class Homepage extends AbstractController
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

        $users = (new User)->getUsers();


        if (!empty($_POST)) {
            $this->controlPostSended();
            $this->isConnected = $_SESSION['user'];
            $this->createUserSessionWithCookie();
        }


        $questions = (new Questions)->getAllQuestions();


        $result = (new User)->filterArrayByKeyValue($users, 'username', $this->isConnected['username'] ?? null);
        print_r($result);
        $connected = [];
        foreach ($result as $online){
            array_push($connected, $online['username']);
        }
        print_r($connected);
        $username = [];
        $email = [];
        $userAndMail = [];
            foreach ($users as $user) {
                    array_push($username, $user['username']);
                   array_push($email, $user['mail']);
                   $userAndMail = array_map(null,$username,$email);

        }
       print_r($username);
       print_r($email);

      print_r($userAndMail);
            $res = array_diff($username,$connected);
            print_r($res);



        return $this->render('/home.html.twig', [
            "user" => $this->isConnected['username'] ?? null,
            "user_roles" => $this->isConnected['roles'] ?? null,
            "usersNumber" => sizeof($result),
            "nbrUsers" => count($users),
            "nbrQuestions" => count($questions),
            "anyErrors" => $this->anyErrors,
            "colors" => $colors,
            "username" => $res,
            "test" => $userAndMail
        ]);
    }

    public function sendError(): void
    {
        $this->anyErrors = "La connexion a échoué, l'identifiant ou le mot de passe est incorrect";
    }

    public function createCookie($cookieName, $value): void
    {
        setcookie($cookieName, $value, time() +
            (10 * 365 * 24 * 60 * 60));
    }


    public function tryToConnect(): void
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ((new User)->userExists($username) == null) {
            $this->sendError();
        } else {
            $this->isConnected = (new User)->userConnection($username, $password);

            if (empty($this->isConnected)) {
                $this->sendError();
            } else {
                if (isset($_POST['checkbox'])) {
                    $this->createCookie("remember_user", $this->isConnected['username']);
                    $this->createCookie("remember_roles", $this->isConnected['roles']);
                }
            }

        }
    }

    public function controlPostSended(): void
    {
        if (isset($_POST['logout'])) {
            if ($_POST['logout'] === "true") {
                $this->logout();
            }
        } else if (isset($_POST['connect'])) {
            $this->tryToConnect();
        }
    }
}