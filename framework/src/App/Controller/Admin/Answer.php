<?php

namespace App\Controller\Admin;

use Framework\Controller\AbstractController;
use App\Classes\Admin\Questions\Questions;
use App\Classes\Admin\Answers\Answers;
use App\Classes\Admin\Questions_Answers\QuestionsAnswers;
use  App\Classes\ControlDataForm\ControlAnswersForm;



class Answer extends AbstractController
{


    public function __invoke(int $id): string
    {
        $question = new Questions();
        $answer = new Answers();
        $questionsAnswers = new QuestionsAnswers();
        $controlAnswersForm = new ControlAnswersForm();


        if (isset($_POST['validAnswer'])){
            $validAnswer = 1;
        }else{
            $validAnswer = 0;
        }

        if(isset($_POST ['updateAnswer'])){
            $controlAnswersForm->findError($controlAnswersForm->getValidations(), $_POST, null);
            if(empty($controlAnswersForm->getErrors())){
                $answer->updateAnswer($_POST, $validAnswer);
            }

        }else if (isset($_POST ['deleteAnswer']) && $_POST ['deleteAnswer'] === "true"){
            $questionsAnswers->deleteQuestion($_POST['idAnswerUpdate']);

        }else if (isset($_POST ['insertAnswer'])){
            $controlAnswersForm->findError($controlAnswersForm->getValidations(), $_POST, null);
            if(empty($controlAnswersForm->getErrors())){
                $answer->insertAnswer($_POST['answer'], $validAnswer);
                $id_answer = $answer->getNumberIdAnswer();
                $id_answer = $answer->returnNumberIfEmptyID($id_answer);
                $questionsAnswers->linkQuestionWithAnswer($id, $id_answer);
            }

            
        }

        $questions = $question->getSingleQuestion($id);
        $answers = $answer->getAnswersWithIdQuestion($id);
        
        return $this->render('admin/answer.html.twig', [
            'title' => "Questions",
            'questions' => $questions,
            'answers' => $answers,
            "answer" => $controlAnswersForm->displayErrors("answer"),

        ]);
    }


  
}
