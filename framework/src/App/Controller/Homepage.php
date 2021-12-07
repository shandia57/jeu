<?php
namespace App\Controller;

use App\Classes\User;
use Framework\Controller\AbstractController;

class Homepage extends AbstractController
{


    public function __invoke(): string
    {

        session_start();
        if(isset($_POST['logout'])){
            $this->logout();
        }

        if (!empty($_POST)) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $isConnected= (new User)->userConnection($username, $password);
        }

        $users = (new User)->getUsers();
        $isConnected = $_SESSION['user'] ?? null;



        $result = (new User)->filterArrayByKeyValue($users, 'username',$isConnected??null['username']??null);
        // print_r($result);
            return $this->render('/home.html.twig', [
                "user" => $isConnected['username']?? null,
                "user_roles" => $isConnected['roles']?? null,
                "usersNumber" => sizeOf($result),

            ]);
        }
}