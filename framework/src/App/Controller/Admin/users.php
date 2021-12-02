<?php

namespace App\Controller\Admin;

use Framework\Controller\AbstractController;
use App\Class\Admin\User\User;
use  App\Class\ControlDataForm\ControlUsersForm;


class Users extends AbstractController
{

    public function __invoke()
    {
        $user = new User();
        $controlUserForm = new ControlUsersForm();

        if(isset($_POST['delete']) && $_POST['delete'] === "true"){
            $user->deleteUser($_POST['id_user']);

        }else if (isset($_POST['update'])){

            $controlUserForm->findError($controlUserForm->getValidationUpdate(), $_POST, $user);
            if(empty($controlUserForm->getErrors())){
                $user->updateUser($_POST);
            }

        }else if(isset($_POST['insert'])){
            $controlUserForm->findError($controlUserForm->getValidationsSubscription(),$_POST, $user);
            if(empty($controlUserForm->getErrors())){
                $user->insertUser($_POST);
            }
        }

        $users = $user->getUsers();

        return $this->render('admin/users.html.twig', [
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

}