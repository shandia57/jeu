<?php

namespace App\Controller\Admin;

use Framework\Controller\AbstractController;
use App\Class\Admin\User\User;


class Users extends AbstractController
{

    public function __invoke()
    {
        $user = new User();

        if(isset($_POST['delete'])){
            $user->deleteUser($_POST['id_user']);
        }else if (isset($_POST['update'])){
            $user->updateUser($_POST);
        }else if(isset($_POST['insert'])){
            $user->insertUser($_POST);
        }

        $users = $user->getUsers();

        return $this->render('admin/users.html.twig', [
            'users' => $users
        ]);        
    }

}