<?php

namespace App\Controller\Admin;

use Framework\Controller\AbstractController;
use App\Class\Admin\Questions\Questions;
use App\Class\Admin\Answers\Answers;
use App\Class\Admin\Questions_Answers\QuestionsAnswers;



class Answer extends AbstractController
{


    public function __invoke(int $id): string
    {
        $question = new Questions();
        $answer = new Answers();
        $questionsAnswers = new QuestionsAnswers();

        if (isset($_POST['validAnswer'])){
            $validAnswer = 1;
        }else{
            $validAnswer = 0;
        }

        if(isset($_POST ['updateAnswer'])){
            $answer->updateAnswer($_POST, $validAnswer);

        }else if (isset($_POST ['deleteAnswer'])){
            $questionsAnswers->deleteQuestion($_POST['idAnswerUpdate']);
        }else if (isset($_POST ['insertAnswer'])){
            $answer->insertAnswer($_POST['answer'], $validAnswer);
            $id_answer = $answer->getNumberIdAnswer();
            $id_answer = $answer->returnNumberIfEmptyID($id_answer);
            $questionsAnswers->linkQuestionWithAnswer($id, $id_answer);
            
        }

        $questions = $question->getSingleQuestion($id);
        $answers = $answer->getAnswersWithIdQuestion($id);
        
        return $this->render('admin/answer.html.twig', [
            'title' => "Questions",
            'questions' => $questions,
            'answers' => $answers,
        ]);
    }


  
}
