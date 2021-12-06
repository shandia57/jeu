<?php

namespace App\Controller;

use Framework\Controller\AbstractController;
use App\Classes\User;
use App\Classes\ControlDataForm\ControlUserSubForm;

class Subscribe extends AbstractController
{
    public function __invoke(): string
    {
        $user = new User();
        $controlUserForm = new ControlUserSubForm();
        if (!empty($_POST)) {
            
            $controlUserForm->findError($controlUserForm->getValidationsSubscription(), $_POST, $user);
            
            if (empty($controlUserForm->getErrors())) {
                $user->insertUser($_POST);
                if ($user) {
                    header("Location: /");
                } else {
                    echo 'Une erreur est survenue pendant votre inscription !';
                }

                die;
            }
        }

        return $this->render('Subscribe/subscribe.html.twig', array(

            'username' => $controlUserForm->displayErrors("username"),
            'password' => $controlUserForm->displayErrors("password"),
            'passwordConfirm' => $controlUserForm->displayErrors("passwordConfirm"),
            'lastname' => $controlUserForm->displayErrors("lastname"),
            'firstName' => $controlUserForm->displayErrors("firstName"),
            'mail' => $controlUserForm->displayErrors("mail"),
        ));
    }
}
