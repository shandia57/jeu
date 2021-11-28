<?php 

namespace App\Class\Admin\Answers;
use PDO;
require_once __DIR__ ."/../../../Connection/connection.php";

class Answers
{
    protected int $id_answer;
    protected string $answer;
    protected bool $valid;

    public function __construct()
    {

    }

    public function getId_answer() : int
    {
        return $this->id_answer;
    }


    public function setId_answer($id_answer) : Answers
    {
        $this->id_answer = $id_answer;

        return $this;
    }


    public function getAnswer() : string
    {
        return $this->answer;
    }


    public function setAnswer($answer) : Answers
    {
        $this->answer = $answer;

        return $this;
    }

    public function getValid() : bool
    {
        return $this->valid;
    }


    public function setValid($valid) : Answers
    {
        $this->valid = $valid;

        return $this;
    }
    
    public function getNumberIdAnswer() : Array{
        $connection = getConnection();
        $stmt = $connection->prepare("SELECT MAX(id_answer) as numberID FROM `answer` ");
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function returnNumberIfEmptyID($isEmptyID) : int
    {
        if( empty($isEmptyID[0]['numberID']) ){
            return 1;
        }else{
            return $isEmptyID[0]['numberID'];
        }
    }


    public function insertAnswer($answer, $validAnswer) : bool{

        $connection = getConnection();
        $sql = 'INSERT INTO `answer`(`answer`, `valid`) 
                VALUES (:answer, :valid)';
        $stmt = $connection->prepare($sql);
        $stmt->bindParam('answer', $answer, PDO::PARAM_STR);
        $stmt->bindParam('valid', $validAnswer, PDO::PARAM_STR);
    
        return $stmt->execute();
    }

    public function getSingleAnswer($id_answer) : array
    {
        $connection = getConnection();
        $stmt = $connection->prepare("SELECT * FROM `answer` WHERE id_answer = $id_answer ");
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function getAnswersWithIdQuestion($id_question) : array
    {
        $connection = getConnection();
        $sql =  "SELECT answer.answer, answer.valid, answer.id_answer
                FROM answer, questions, questions_answers
                WHERE questions.id_question = $id_question
                AND questions_answers.id_question = questions.id_question
                AND questions_answers.id_answer = answer.id_answer";
        $stmt = $connection->prepare($sql);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function updateAnswer($dataAnswer, $validAnswer) : bool
    {
        $connection = getConnection();
        $sql = "UPDATE `answer` SET 
         `answer`=  '$dataAnswer[answerUpdate]', 
         `valid` = '$validAnswer' 
          WHERE `answer`.`id_answer` = '$dataAnswer[idAnswerUpdate]' ;";
        $stmt = $connection->prepare($sql);
        return $stmt->execute();
    }

}