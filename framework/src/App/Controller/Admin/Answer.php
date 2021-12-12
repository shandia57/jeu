<?php

namespace App\Controller\Admin;

use Framework\Controller\AbstractController;
use App\Classes\Admin\Questions\Questions;
use App\Classes\Admin\Answers\Answers;
use App\Classes\Admin\Questions_Answers\QuestionsAnswers;
use  App\Classes\ControlDataForm\ControlAnswersForm;



class Answer extends AbstractController
{


    public function __invoke(string $id): string
    {

        session_start();

        $this->isConnected = $_SESSION['user'] ?? null;
        $this->createUserSessionWithCookie();
        Answer::isAdmin();
        
        $question = new Questions();
        $answer = new Answers();
        $controlAnswersForm = new ControlAnswersForm();


        if(!empty($_POST))
        {
            $this->controlPostSended($id);
        }


        if ((int)$id){
            $questions = $question->getSingleQuestion($id);
            $answers = $answer->getAnswersWithIdQuestion($id);
            if(empty($questions)){
                header("location: /questions");
            }
        }else{
            header("location: /questions");
        }
        
        return $this->render('Admin/answer.html.twig', [
            'title' => "Questions",
            'questions' => $questions??null,
            'answers' => $answers??null,
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

    public function controlPostSended($id) : void
    {
        if(isset($_POST ['updateAnswer'])){
            $this->update();

        }else if (isset($_POST ['deleteAnswer'])){
            $this->delete();

        }else if (isset($_POST ['insertAnswer'])){
            $this->insert($id);            
        }
    }

    public function createUserSessionWithCookie() : void
    {
        if (!empty($_COOKIE['remember_user'])  && !empty($_COOKIE['remember_roles']) ){
            $this->setIsConnected("username","remember_user" );
            $this->setIsConnected("roles","remember_roles" );
            $_SESSION['user'] = [
                "username" => $this->isConnected['username'],       
                "roles" => $this->isConnected['roles'], 
            ];
        }
    }


  
}
