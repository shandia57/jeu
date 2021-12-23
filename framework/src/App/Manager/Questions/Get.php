<?php 

namespace App\Manager\Questions;
use App\Class\Admin\Questions\Questions;

class Get
{
    public function get()
    {
        $question = new Questions();
        return $question->getAllQuestions();
    }
}