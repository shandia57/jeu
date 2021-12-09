<?php 

namespace App\Classes\ControlDataForm;

class ControlQuestionsForm extends controlDataForm
{

    protected array $validations = [
        'label' => [
            'rules' => [
                ['name' => 'required'],
                ['name' => 'maxlength', 'value' => 100],
                ['name' => 'isString']
               
            ]
        ],
        'level' => [
            'rules' => [
                ['name' => 'required'],
                ['name' => 'maxlength', 'value' => 100],
                ['name' => 'isString'], 
                ['name' => 'shouldBe', 'value' => ["Vert", 
                                                    "Jaune",
                                                    "Bleu",
                                                    "Orange",
                                                    "Rouge",
                                                    "Noir"
                                                    ]]
            ]
        ],
        'question' => [
            'rules' => [
                ['name' => 'required'],
                ['name' => 'maxlength', 'value' => 100],
                ['name' => 'isString']
            ]
        ],
    ];

    
    public function getValidations() : array
    {
        return $this->validations;
    }


    
}