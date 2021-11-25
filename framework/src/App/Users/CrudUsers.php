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

function deleteUser($id_user){
    $connection = getConnection();
    $sql = "DELETE FROM `jeuDeLoieV2`.`users` WHERE `users`.`id_user` = $id_user";
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
            `users`(`username`, `password`, `firstName`, `lastName`, `mail`, `roles`, `createAt`) 
            VALUES 
                (:username, :password, :lastname, :firstname, :mail, :roles, :createAt )';
    $stmt = $connection->prepare($sql);
    $stmt->bindParam('username', $dataUser['usernameSub'], PDO::PARAM_STR);
    $stmt->bindParam('password', $dataUser['passwordSub'], PDO::PARAM_STR);
    $stmt->bindParam('lastname', $dataUser['lastNameSub'], PDO::PARAM_STR);
    $stmt->bindParam('firstname', $dataUser['firstNameSub'], PDO::PARAM_STR);
    $stmt->bindParam('mail', $dataUser['mailSub'], PDO::PARAM_STR);
    $stmt->bindParam('roles', $dataUser['rolesSub'], PDO::PARAM_STR);
    $stmt->bindParam('createAt', $date, PDO::PARAM_STR);


    return $stmt->execute();
}
