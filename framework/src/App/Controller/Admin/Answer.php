<?php

namespace App\Controller\Admin;

use Framework\Controller\AbstractController;
use App\Class\Admin\Questions\Questions;
use App\Class\Admin\Answers\Answers;
// use App\Class\Admin\Questions_Answers\QuestionsAnswers;



class Answer extends AbstractController
{


    public function __invoke(int $id): string
    {
        $question = new Questions();
        $answer = new Answers();
        // $questionsAnswers = new QuestionsAnswers();

        $questions = $question->getSingleQuestion($id);
        $answers = $answer->getAnswersWithIdQuestion($id);
        // echo "<pre>"; print_r($questions); die;
        
        return $this->render('admin/answer.html.twig', [
            'title' => "Questions",
            'questions' => $questions,
            'answers' => $answers,
        ]);
    }

  
}
