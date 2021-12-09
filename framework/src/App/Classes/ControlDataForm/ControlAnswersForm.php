<?php 

namespace App\Classes\ControlDataForm;

class ControlAnswersForm extends controlDataForm
{

    protected array $validations = [
        'answer' => [
            'rules' => [
                ['name' => 'required'],
                ['name' => 'maxlength', 'value' => 100],
                ['name' => 'isString']
               
            ]
        ]
    ];

    
    public function getValidations() : array
    {
        return $this->validations;
    }

    public function findErrorsIntoArray($array) : void
    {
        for($i = 0; $i < count($array); $i++){
            $this->findError($this->getValidations(), ["answer" => $array[$i]], null);
        }       
    }

    
}