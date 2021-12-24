<?php 

namespace App\Class\ControlDataForm\ControlDataEntity;
use App\Class\ControlDataForm\ControlDataForm;

class ControlUsersForm extends ControlDataForm
{
    // protected $errors = [];
    protected $validationsSubscription = [
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
                ['name' => 'uniqueMail'],
            ]
        ],
        'roles' => [
            'rules' => [
                ['name' => 'required'],
                ['name' => 'shouldBe', 'value' => ["ROLES_ADMIN", "ROLES_USER"]]
            ]
        ]
    ];

    protected $validationUpdate =[

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
                ['name' => 'uniqueMail'],
            ]
        ],
        'roles' => [
            'rules' => [
                ['name' => 'required'],
                ['name' => 'shouldBe', 'value' => ["ROLES_ADMIN", "ROLES_USER"]]
            ]
        ]
    ];

    
    public function getValidationsSubscription() : array
    {
        return $this->validationsSubscription;
    }

    public function getValidationUpdate() : array
    {
        return $this->validationUpdate;
    }
    
}