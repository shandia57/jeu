<?php 

namespace App\Classes\ControlDataForm;


class ControlUsersForm extends controlDataForm
{
    // protected $errors = [];
    protected array $validationsSubscription = [
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

    protected array $validationUpdate = [

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


    public function getValidationUpdate() : array
    {
        return $this->validationUpdate;
    }
    
}