<?php

namespace App\Controller;

use App\Classes\User;
use Framework\Controller\AbstractController;

class Homepage extends AbstractController
{


    public function __invoke(): string
    {

        // A mettre en commentaire pour tester le logout
        if (isset($_POST['logout']) && $_POST['logout'] === "true") {
            $this->logout();
        }
        // FIN de commentaire

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $isConnected = (new User)->userConnection($username, $password);

            if (!empty($_POST['remember_user'])) {
                $cookie_name = "remember_user";
                $cookie_value = $isConnected['username'];
                setcookie(
                    $cookie_name,
                    $cookie_value,
                    [
                        'expires' => time() + 365 * 24 * 3600, // 1 year
                        'path' => '/',
                        'secure' => null, //only for https
                        'httponly' => true, //for localhost
                    ]
                );
            } else {
                setcookie("remember_user", "", time() - 3600);
            }
        }
        $users = (new User)->getUsers();
        $result = (new User)->filterArrayByKeyValue($users, 'username', $isConnected ?? null['username'] ?? null);
        return $this->render('/home.html.twig', [
            "user" => $isConnected['username'] ?? null,
            "user_roles" => $isConnected['roles'] ?? null,
            "usersNumber" => sizeOf($result),

        ]);
    }
}