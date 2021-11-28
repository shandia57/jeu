<?php 

namespace App\Class\Admin\Questions;
use PDO;
require_once __DIR__ ."/../../../Connection/connection.php";

class Questions
{
    protected int $id_question;
    protected string $answer;
    protected bool $valid;


    public function __construct()
    {

    }

    public function getId_questions(): int
    {
        return $this->id_questions;
    }


    public function setId_questions($id_questions): Questions
    {
        $this->id_questions = $id_questions;

        return $this;
    }


    public function getLabel(): string
    {
        return $this->label;
    }


    public function setLabel($label): Questions
    {
        $this->label = $label;

        return $this;
    }


    public function getLevel(): string
    {
        return $this->level;
    }


    public function setLevel($level): Questions
    {
        $this->level = $level;

        return $this;
    }


    public function getQuestion(): string
    {
        return $this->question;
    }


    public function setQuestion($question): Questions
    {
        $this->question = $question;

        return $this;
    }

    public function getMaxNumberIdQuestions() : Array
    {
        $connection = getConnection();
        $stmt = $connection->prepare("SELECT MAX(id_question) as numberID FROM `questions` ");
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
    }

    public function returnNumberIfEmptyID($isEmptyID) : int
    {
        if( empty($isEmptyID[0]['numberID']) ){
            return 1;
        }else{
            return $isEmptyID[0]['numberID'] + 1 ;
        }
    }

    public function insertQuestion($dataQuestion, $id_question) : bool
    {
        $connection = getConnection();
    
        $sql = 'INSERT INTO
                `questions`(`id_question`, `label`, `level`, `question`) 
                VALUES 
                    (:id_question, :label, :level, :question)';
        $stmt = $connection->prepare($sql);
        $stmt->bindParam('id_question', $id_question, PDO::PARAM_STR);
        $stmt->bindParam('label', $dataQuestion['label'], PDO::PARAM_STR);
        $stmt->bindParam('level', $dataQuestion['level'], PDO::PARAM_STR);
        $stmt->bindParam('question', $dataQuestion['question'], PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function getAllQuestions() : Array
    {
        $connection = getConnection();
        $stmt = $connection->prepare("SELECT * FROM `questions` ");
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function getSingleQuestion($id) : array
    {
        $connection = getConnection();
        $stmt = $connection->prepare("SELECT * FROM `questions` WHERE id_question = $id");
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}