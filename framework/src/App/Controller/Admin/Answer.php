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
        // A mettre en commentaier pour tester le logout
        session_start();
        // Fin de commentaire
        Answer::isAdmin();
        $question = new Questions();
        $answer = new Answers();
        $controlAnswersForm = new ControlAnswersForm();


        if(isset($_POST ['updateAnswer'])){
            $this->update();

        }else if (isset($_POST ['deleteAnswer'])){
            $this->delete();

        }else if (isset($_POST ['insertAnswer'])){
            $this->insert($id);            
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

    public function update() : void
    {
        if (isset($_POST['validAnswer'])){
            $validAnswer = 1;
        }else{
            $validAnswer = 0;
        }
        $answer = new Answers();
        $controlAnswersForm = new ControlAnswersForm();
        $controlAnswersForm->findError($controlAnswersForm->getValidations(), $_POST, null);
        if(empty($controlAnswersForm->getErrors())){
            $answer->updateAnswer($_POST, $validAnswer);
        }
    }

    public function delete() : void
    {
        $questionsAnswers = new QuestionsAnswers();
        if( $_POST ['deleteAnswer'] === "true"){
            $questionsAnswers->deleteQuestion($_POST['idAnswerUpdate']);
        }
    }

    public function insert($id) : void
    {
        if (isset($_POST['validAnswer'])){
            $validAnswer = 1;
        }else{
            $validAnswer = 0;
        }
        $answer = new Answers();
        $controlAnswersForm = new ControlAnswersForm();
        $questionsAnswers = new QuestionsAnswers();
        
        $controlAnswersForm->findError($controlAnswersForm->getValidations(), $_POST, null);
        if(empty($controlAnswersForm->getErrors())){
            $answer->insertAnswer($_POST['answer'], $validAnswer);
            $id_answer = $answer->getNumberIdAnswer();
            $id_answer = $answer->returnNumberIfEmptyID($id_answer);
            $questionsAnswers->linkQuestionWithAnswer($id, $id_answer);
        }
    }


  
}
