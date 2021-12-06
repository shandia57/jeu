<?php

namespace App\Controller;

use Framework\Controller\AbstractController;
use App\Classes\User;


class Subscribe extends AbstractController
{
    public function __invoke(): string
    {
        $errors = [];
        $user = new User();
        if (!empty($_POST)) {
            $validations = [
                'username' => [
                    'rules' => [
                        ['name' => 'required'],
                        ['name' => 'maxlength', 'value' => 20],
                        ['name' => 'isString'],
                        ['name' => 'unique', 'dbname' => 'jeudeloieV2', 'validationMessage' => 'Utilisateur déjà existant !'],
                    ]
                ],
                'password' => [
                    'rules' => [
                        ['name' => 'required'],
                        ['name' => 'maxlength', 'value' => 100]
                    ]
                ],
                'passwordConfirm' => [
                    'rules' => [
                        [
                            'name' => 'sameAs',
                            'field' => 'password',
                            'validationMessage' => 'Les mots de passe doivent correspondre'
                        ],
                    ]
                ],
                'firstName' => [
                    'rules' => [
                        ['name' => 'required'],
                        ['name' => 'maxlength', 'value' => 100]
                    ]
                ],
                'lastName' => [
                    'rules' => [
                        ['name' => 'required'],
                        ['name' => 'maxlength', 'value' => 100]
                    ]
                ],
                'mail' => [
                    'rules' => [
                        ['name' => 'required'],
                        ['name' => 'maxlength', 'value' => 100],
                        ['name' => 'mail'],
                    ]
                ]
            ];

            foreach ($validations as $fieldName => $params) {
                foreach ($params['rules'] as $rule) {
                    switch ($rule['name']) {
                        case 'required':
                            if (empty($_POST[$fieldName])) {
                                $errors[$fieldName][] = 'Le champs est obligatoire';
                            }
                            break;
                        case 'maxlength':
                            if (strlen($_POST[$fieldName]) > $rule['value']) {
                                $errors[$fieldName][] = 'La valeur de ce champs ne doit pas dépasser ' . $rule['value'] . ' caractères !';
                            }
                            break;
                        case 'mail':
                            if (!filter_var($_POST[$fieldName], FILTER_VALIDATE_EMAIL)) {
                                $errors[$fieldName][] = 'Ce champs doit contenir une adresse email valide !';
                            }
                            break;
                        case 'sameAs':
                            if ($_POST[$fieldName] !== $_POST[$rule['field']]) {
                                $errors[$fieldName][] = $rule['validationMessage'];
                            }
                            break;
                        case 'match':
                            if ($_POST[$fieldName] !== $rule['value']) {
                                $errors[$fieldName][] = $rule['validationMessage'] ?? 'La valeur de ce champs doit etre égale à ' . $rule['value'];
                            }
                            break;
                        case 'isString':
                            if (!is_string($_POST[$fieldName])) {
                                $errors[$fieldName][] = 'Ce champs doit etre une chaine de caractères !';
                            }
                            break;
                        case 'unique':
                            if ($user->userExists($_POST[$fieldName])) {
                                $errors[$fieldName][] = $rule['validationMessage'] ?? 'Entité déjà existante !';
                            }
                            break;
                    }
                }
            }

            if (empty($errors)) {
                $isRegistered = new User();
                $isRegistered->insertUser([
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'firstName' => $_POST['firstName'],
                    'lastName' => $_POST['lastName'],
                    'mail' => $_POST['mail']
                ]);


                if ($isRegistered) {
                    header("Location: /connectToGame");
                } else {
                    echo 'Une erreur est survenue pendant votre inscription !';
                }

                die;
            }
        }

        function displayErrors($errors,$fieldName): string
        {
            $return = '';
            if (isset($errors[$fieldName])) {
                foreach ($errors[$fieldName] as $error) {
                    $return = $return .$error ;
                }
            }

            return $return;
        }
            print_r($errors);

            return $this->render('Subscribe/subscribe.html.twig', array(

                "username" => displayErrors($errors, "username"),
                "password" => displayErrors($errors,"password"),
                "passwordConfirm"=>displayErrors($errors,"passwordConfirm"),
                "firstName"=>displayErrors($errors,"firstName"),
                "mail"=>displayErrors($errors,"mail"),
            ));
        }
}