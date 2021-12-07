<?php

namespace App\Controller\Admin;

use Framework\Controller\AbstractController;
use App\Classes\User;
use  App\Classes\ControlDataForm\ControlUsersForm;


class Users extends AbstractController
{

    public function __invoke()
    {
        session_start();
        Users::isAdmin();

        $user = new User();
        $controlUserForm = new ControlUsersForm();

        $userLogged = $_SESSION['user'] ?? null;


        if(isset($_POST['delete'])){
            $this->delete($user);

        }else if (isset($_POST['update'])){
            $this->update($user, $controlUserForm);

        }else if(isset($_POST['insert'])){
            $this->insert($user, $controlUserForm);
            
        }else if (isset($_POST['logout'])){
            $this->logout();
        }

        $users = $user->getUsers();

        return $this->render('admin/users.html.twig', [
            'user' => $userLogged['username'],
            'user_roles' => $userLogged['roles'],
            'users' => $users, 
            'username' => $controlUserForm->displayErrors("username"),
            'password' => $controlUserForm->displayErrors("password"),
            'passwordConfirm' => $controlUserForm->displayErrors("passwordConfirm"),
            'lastname' => $controlUserForm->displayErrors("lastname"),
            'firstName' => $controlUserForm->displayErrors("firstName"),
            'mail' => $controlUserForm->displayErrors("mail"),
            'roles' => $controlUserForm->displayErrors("roles"),
        ]);        
    }

    public function insert($user, $controlUserForm) : void
    {
        $controlUserForm->findError($controlUserForm->getValidationsSubscription(),$_POST, $user);
        if(empty($controlUserForm->getErrors())){
            $user->insertUserAdmin($_POST);
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

}