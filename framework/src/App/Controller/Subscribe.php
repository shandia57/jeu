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
        $controlUserSubForm = new ControlUserSubForm();
        if (!empty($_POST)) {
            
            $controlUserSubForm->findError($controlUserSubForm->getValidationsSubscription(), $_POST, $user);
            
            if (empty($controlUserSubForm->getErrors())) {

                $_POST['roles'] = "ROLES_USER";
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

            'username' => $controlUserSubForm->displayErrors("username"),
            'password' => $controlUserSubForm->displayErrors("password"),
            'passwordConfirm' => $controlUserSubForm->displayErrors("passwordConfirm"),
            'lastname' => $controlUserSubForm->displayErrors("lastname"),
            'firstName' => $controlUserSubForm->displayErrors("firstName"),
            'mail' => $controlUserSubForm->displayErrors("mail"),
        ));
    }
}
