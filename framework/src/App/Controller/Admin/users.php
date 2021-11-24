<?php

namespace App\Controller\Admin;

use Framework\Controller\AbstractController;
require_once __DIR__ . '/../../Users/CrudUsers.php';

class Users extends AbstractController
{

    public function __invoke()
    {
        if(isset($_POST['delete'])){
            $id_user = htmlspecialchars_decode($_POST['id_user']);
            deleteUser($id_user);
        }else if (isset($_POST['update'])){
            print_r($_POST);
        }else{
            echo "fail";
        }

        $users = getUsers();
        return $this->render('admin/users.html.twig', [
            'users' => $users
        ]);

        
    }

}