<?php
namespace App\Controller;

use App\Classes\User;
use App\Classes\Admin\Questions\Questions;

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

            if(isset($_POST['checkbox'])){
                setcookie("remember_user",  $isConnected['username'], time() +
                (10 * 365 * 24 * 60 * 60));
                setcookie("remember_roles",  $isConnected['roles'], time() +
                (10 * 365 * 24 * 60 * 60));
            }
    
        }

        $users = (new User)->getUsers();
        $questions = (new Questions)->getAllQuestions();
        $isConnected = $_SESSION['user'] ?? null;

        if (!empty($_COOKIE['remember_user'])  && !empty($_COOKIE['remember_roles']) ){
            $isConnected['username']  = $_COOKIE['remember_user'];
            $isConnected['roles']  = $_COOKIE['remember_roles'];
            $_SESSION['user'] = [
                "username" => $isConnected['username'],       
                "roles" => $isConnected['roles'] 
            ];
        }


        $result = (new User)->filterArrayByKeyValue($users, 'username',$isConnected??null['username']??null);
            return $this->render('/home.html.twig', [
                "user" => $isConnected['username']?? null,
                "user_roles" => $isConnected['roles']?? null,
                "usersNumber" => sizeOf($result),
                "nbrUsers" => count($users),
                "nbrQuestions" => count($questions),

            ]);
        }
}