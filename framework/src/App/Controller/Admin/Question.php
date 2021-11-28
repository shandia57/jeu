<?php

namespace App\Controller\Admin;

use Framework\Controller\AbstractController;
use App\Class\Admin\Questions\Questions;
use App\Class\Admin\Answers\Answers;
use App\Class\Admin\Questions_Answers\QuestionsAnswers;



class Question extends AbstractController
{


    public function __invoke(): string
    {
        $question = new Questions();
        $answer = new Answers();
        $questionsAnswers = new QuestionsAnswers();


        if (isset($_POST['insertQuestion'])) {
            $this->insertQuestionsAndAnswers($question, $answer, $questionsAnswers, $_POST);
        }else if (isset($_POST['UpdateQuestions'])){
            $question->updateQuestion($_POST);
        }else if (isset($_POST['deleteQuestions'])){
            $question->deleteQuestion($_POST['idQuestionsUpdate']);
        }

        $questions = $question->getAllQuestions();

        return $this->render('admin/questions.html.twig', [
            'title' => "Questions",
            'questions' => $questions
        ]);
    }


    public function insertQuestionsAndAnswers($question, $answer, $questionsAnswers, $details) : void
    {
            $id_question = $question->getMaxNumberIdQuestions();
            $id_question = $question->returnNumberIfEmptyID($id_question);

            $question->insertQuestion($details, $id_question);

            for($i = 0; $i < count($details['answer']); $i++){

                if(isset($_POST["validAnswer" .$i + 1])){
                    $validAnswer = 1;
                    $answer->insertAnswer($details['answer'][$i], $validAnswer);
        
                }else{
                    $validAnswer = 0;
                    $answer->insertAnswer($details['answer'][$i], $validAnswer);
                }

                $id_answer = $answer->getNumberIdAnswer();
                $id_answer = $answer->returnNumberIfEmptyID($id_answer);

                $questionsAnswers->linkQuestionWithAnswer($id_question, $id_answer);
            }
    }


  
}
