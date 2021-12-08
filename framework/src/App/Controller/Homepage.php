<?php
namespace App\Controller;

use App\Classes\User;
use Framework\Controller\AbstractController;

class Homepage extends AbstractController
{


    public function __invoke(): string
    {
        // A mettre en commentaire pour tester le logout
        session_start();
        if(isset($_POST['logout']) && $_POST['logout'] === "true"){
            $this->logout();
        }
        // FIN de commentaire

        

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $isConnected= (new User)->userConnection($username, $password);
        }

        $users = (new User)->getUsers();
        $isConnected = $_SESSION['user'] ?? null;



        $result = (new User)->filterArrayByKeyValue($users, 'username',$isConnected??null['username']??null);
            return $this->render('/home.html.twig', [
                "user" => $isConnected['username']?? null,
                "user_roles" => $isConnected['roles']?? null,
                "usersNumber" => sizeOf($result),

            ]);
        }
}