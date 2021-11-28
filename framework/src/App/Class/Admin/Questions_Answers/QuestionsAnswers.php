<?php 

namespace App\Class\Admin\Questions_Answers;
use PDO;
require_once __DIR__ ."/../../../Connection/connection.php";

class QuestionsAnswers
{
    protected int $id_question;
    protected int $id_answer;


    public function getId_question() : int
    {
        return $this->id_question;
    }


    public function setId_question($id_question) : QuestionsAnswers
    {
        $this->id_question = $id_question;

        return $this;
    }


    public function getId_answer() : int
    {
        return $this->id_answer;
    }


    public function setId_answer($id_answer) : QuestionsAnswers
    {
        $this->id_answer = $id_answer;

        return $this;
    }

    function linkQuestionWithAnswer($id_question, $id_answer) : bool{

        $connection = getConnection();
        $sql = 'INSERT INTO `questions_answers`(`id_question`, `id_answer`) 
                VALUES (:id_question, :id_answer)';
        $stmt = $connection->prepare($sql);
        $stmt->bindParam('id_question', $id_question, PDO::PARAM_STR);
        $stmt->bindParam('id_answer', $id_answer, PDO::PARAM_STR);
    
        return $stmt->execute();
    }

    function getQuestionsAnswer() : Array
    {
        $connection = getConnection();
        $stmt = $connection->prepare("SELECT * FROM `questions_answers` ");
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}