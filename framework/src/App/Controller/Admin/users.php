<?php

namespace App\Controller\Admin;

use Framework\Controller\AbstractController;
use App\Classes\User;
use App\Classes\Admin\Questions\Questions;
use  App\Classes\ControlDataForm\ControlUsersForm;


class Users extends AbstractController
{
    public function __invoke()
    {
        
        session_start();



        $user = new User();
        $controlUserForm = new ControlUsersForm();

        $this->isConnected = $_SESSION['user'] ?? null;
        $this->createUserSessionWithCookie();
        Users::isAdmin();

        if(!empty($_POST))
        {
            $this->controlPostSended($user, $controlUserForm);
        }

        $users = $user->getUsers();
        $questions = (new Questions)->getAllQuestions();
        

        return $this->render('Admin/users.html.twig', [
            'user' => $this->isConnected['username'],
            'user_roles' => $this->isConnected['roles'],
            'users' => $users, 
            'username' => $controlUserForm->displayErrors("username"),
            'password' => $controlUserForm->displayErrors("password"),
            'passwordConfirm' => $controlUserForm->displayErrors("passwordConfirm"),
            'lastName' => $controlUserForm->displayErrors("lastName"),
            'firstName' => $controlUserForm->displayErrors("firstName"),
            'mail' => $controlUserForm->displayErrors("mail"),
            'roles' => $controlUserForm->displayErrors("roles"),
            "nbrUsers" => count($users),
            "nbrQuestions" => count($questions),
            "anyErrors" => $this->anyErrors,
        ]);        
    }

    public function insert($user, $controlUserForm) : void
    {
        $controlUserForm->findError($controlUserForm->getValidationsSubscription(),$_POST, $user);
        if(empty($controlUserForm->getErrors())){
            $user->insertUser($_POST);
        }else{
            $this->anyErrors = "L'inscription à échoué, cliquez sur 'Ajouter un nouvel utilisateur' pour avoir plus de détails";
        }
    }
    public function update($user, $controlUserForm) : void
    {
        $controlUserForm->findError($controlUserForm->getValidationUpdate(), $_POST, $user);
        if(empty($controlUserForm->getErrors())){
            $user->updateUser($_POST);
        }
    }
    public function delete($user) : void
    {
        if($_POST['delete'] === "true"){
            $user->deleteUser($_POST['id_user']);

        }
    }

    public function controlPostSended($user, $controlUserForm) : void
    {
        if(isset($_POST['delete'])){
            $this->delete($user);

        }else if (isset($_POST['update'])){
            $this->update($user, $controlUserForm);

        }else if(isset($_POST['insert'])){
            $this->insert($user, $controlUserForm);
            
        }else if (isset($_POST['logout']) && $_POST['logout'] === "true" ){
            $this->logout();
        }
    }

    public function createUserSessionWithCookie() : void
    {
        if (!empty($_COOKIE['remember_user'])  && !empty($_COOKIE['remember_roles']) ){
            $this->setIsConnected("username","remember_user" );
            $this->setIsConnected("roles","remember_roles" );
            $_SESSION['user'] = [
                "username" => $this->isConnected['username'],       
                "roles" => $this->isConnected['roles'], 
            ];
        }
    }

}