<?php 

function getUsers(): array
{
    $connection = getConnection();
    $stmt = $connection->prepare("SELECT * FROM `users` ");
    if ($stmt->execute()) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}