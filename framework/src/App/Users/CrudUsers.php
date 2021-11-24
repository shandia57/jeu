<?php


require_once __DIR__ . '/../connection/connection.php';


function getUsers(): array
{
    $connection = getConnection();
    $stmt = $connection->prepare("SELECT * FROM `users` ");
    if ($stmt->execute()) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

function deleteUser(){
    $connection = getConnection();
    $sql = "DELETE FROM `jeuDeLoieV2`.`users` WHERE `users`.`id_user` = 2";
    $stmt = $connection->prepare($sql);
    if ($stmt->execute()) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

function updateUser($dataUser){
    $connection = getConnection();
    $sql = "UPDATE `users` SET 
     `firstName`=  '$dataUser[firstName]', 
     `lastName` = '$dataUser[lastName]', 
     `mail` = '$dataUser[mail]', 
     `roles` =  '$dataUser[roles]'
      WHERE `users`.id_user = '$dataUser[id_user]' ;";
    $stmt = $connection->prepare($sql);
    return $stmt->execute();
}

function insertUser($dataUser): bool
{
    $connection = getConnection();
    $date = "2021-11-24";
    $sql = 'INSERT INTO
            users(`username`, `password`, `lastname`, `firstname`, `email`, `role`, `createAt`) 
            VALUES 
                (userName, :password, :lastname, :firstname, :email, :role, createAt )';
    $stmt = $connection->prepare($sql);
    $stmt->bindParam('username', $dataUser['username'], PDO::PARAM_STR);
    $stmt->bindParam('password', $dataUser['password'], PDO::PARAM_STR);
    $stmt->bindParam('lastname', $dataUser['lastname'], PDO::PARAM_STR);
    $stmt->bindParam('firstname', $dataUser['firstname'], PDO::PARAM_STR);
    $stmt->bindParam('email', $dataUser['email'], PDO::PARAM_STR);
    $stmt->bindParam('role', $dataUser['role'], PDO::PARAM_STR);
    $stmt->bindParam('creteAt', $date, PDO::PARAM_STR);


    return $stmt->execute();
}
