<?php


require_once __DIR__ . '/../connection/connection.php';


function getNumberIdQuestions() : Array{
    $connection = getConnection();
    $stmt = $connection->prepare("SELECT MAX(id_question) as numberID FROM `questions` ");
    if ($stmt->execute()) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

function getNumberIdAnswer() : Array{
    $connection = getConnection();
    $stmt = $connection->prepare("SELECT MAX(id_answer) as numberID FROM `answer` ");
    if ($stmt->execute()) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

function returnNumberIfEmptyID($isEmptyID) : int{
    if( empty($isEmptyID[0]['numberID']) ){
        return 1;
    }else{
        return $isEmptyID[0]['numberID'];
    }
}

function insertQuestion($dataQuestion) : bool{
    $connection = getConnection();
    $number = getNumberIdQuestions();
    $id_question = (int)$number[0]['numberID'] + 1;

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


function insertOneAnswer($answer, $validAnswer) : bool{

    $connection = getConnection();
    $sql = 'INSERT INTO `answer`(`answer`, `valid`) 
            VALUES (:answer, :valid)';
    $stmt = $connection->prepare($sql);
    $stmt->bindParam('answer', $answer, PDO::PARAM_STR);
    $stmt->bindParam('valid', $validAnswer, PDO::PARAM_STR);

    return $stmt->execute();
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

function insertQuestionsAndAnswers($dataQuestion) : bool{

    insertQuestion($dataQuestion);
    $number1 = getNumberIdQuestions();
    $id_question = returnNumberIfEmptyID($number1);

    for($i = 0; $i < count($dataQuestion['answer']); $i++){

        if(isset($dataQuestion["validAnswer" .$i + 1])){
            $validAnswer = 1;
            insertOneAnswer($dataQuestion['answer'][$i], $validAnswer);

        }else{
            $validAnswer = 0;
            insertOneAnswer($dataQuestion['answer'][$i], $validAnswer);
        }
        $number2 = getNumberIdAnswer();
        $id_answer = returnNumberIfEmptyID($number2);
        

        linkQuestionWithAnswer($id_question, $id_answer);

    }
    return true;
}

function getQuestionAnswers(){
    
}