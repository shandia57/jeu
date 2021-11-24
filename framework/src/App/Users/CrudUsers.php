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

function updateUser(){
    $connection = getConnection();
    $sql = "DELETE FROM `jeuDeLoieV2`.`users` WHERE `users`.`id_user` = 2";
    $stmt = $connection->prepare($sql);
    if ($stmt->execute()) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
