<?php 

namespace App\Class\ControlDataForm;
use PDO;


class ControlUsersForm
{
    protected $errors = [];
    protected $validations = [
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
        ],
        'roles' => [
            'rules' => [
                ['name' => 'required'],
                ['name' => 'shouldBe', 'value' => ["ROLES_ADMIN", "ROLES_USER"]]
            ]
        ]
    ];

    public function getErrors() : array
    {
        return $this->errors;
    }


    public function setErrors($errors) : ControlUsersForm
    {
        $this->errors = $errors;

        return $this;
    }

    public function getValidations() : array
    {
        return $this->validations;
    }

    public function findError($dataPosted, $user)
    {
        foreach ($this->validations as $fieldName => $params) {
            foreach ($params['rules'] as $rule) {
                switch ($rule['name']) {
                    case 'required':
                        if (empty($dataPosted[$fieldName])) {
                            $this->errors[$fieldName][] = 'Le champs est obligatoire';
                        }
                        break;
                    case 'maxlength':
                        if (strlen($dataPosted[$fieldName]) > $rule['value']) {
                            $this->errors[$fieldName][] = 'La valeur de ce champs ne doit pas dépasser ' . $rule['value'] . ' caractères !';
                        }
                        break;
                    case 'mail':
                        if (!filter_var($dataPosted[$fieldName], FILTER_VALIDATE_EMAIL)) {
                            $this->errors[$fieldName][] = 'Ce champs doit contenir une adresse email valide !';
                        }
                        break;
                    case 'sameAs':
                        if ($dataPosted[$fieldName] !== $dataPosted[$rule['field']]) {
                            $this->errors[$fieldName][] = $rule['validationMessage'];
                        }
                        break;
                    case 'match':
                        if ($dataPosted[$fieldName] !== $rule['value']) {
                            $this->errors[$fieldName][] = $rule['validationMessage'] ?? 'La valeur de ce champs doit etre égale à ' . $rule['value'];
                        }
                        break;
                    case 'isString':
                        if (!is_string($dataPosted[$fieldName])) {
                            $this->errors[$fieldName][] = 'Ce champs doit etre une chaine de caractères !';
                        }
                        break;
                    case "shouldBe":
                        if($dataPosted[$fieldName] !== $rule['value'][0] ){
                            if($dataPosted[$fieldName] !== $rule['value'][1]){
                                $this->errors[$fieldName][] = 'Vous devez obligatoirement choisir soit entre ADMIN ou USER';
                            }
                        }
                    // case 'unique':
                    //     if ($user->userExists($dataPosted[$fieldName])) {
                    //         $this->errors[$fieldName][] = $rule['validationMessage'] ?? 'Entité déjà existante !';
                    //     }
                    //     break;
                }
            }
        }
    }

    public function displayErrors($fieldName): string
    {
        $return = '';
        if (isset($this->errors[$fieldName])) {
            foreach ($this->errors[$fieldName] as $error) {
                $return = $return .$error ;
            }
        }

        return $return;
    }




}