<?php

namespace App\Controller\Admin;

use Framework\Controller\AbstractController;
require_once __DIR__ . '/../../Users/CrudQuestions.php';


class Question extends AbstractController
{
    public function __invoke(): string
    {
        if(isset($_POST['insertQuestion'])){

            // $id_question = getNumberId("questions");
            // echo $id_question[0]['numberID'];
            // echo "<pre>";print_r($_POST);
            // insertQuestion($_POST);
            insertQuestionsAndAnswers($_POST);

        }
        return $this->render('admin/questions.html.twig', [
            'title' => "Questions"
        ]);
    }
}
