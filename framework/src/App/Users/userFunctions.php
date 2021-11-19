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

function userExists(string $username): bool
{
    $connection = getConnection();
    $stmt = $connection->prepare("SELECT COUNT(*) as nb FROM `users` WHERE `user_name` = :username");
    $stmt->bindParam('username', $username, PDO::FETCH_ASSOC);
    if ($stmt->execute()) {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]['nb'] > 0;
    }
    return false;

}

function insertUser($data): bool
{
    $connection = getConnection();
    $sql = 'INSERT INTO 
            users(`id`,`username`, `password`, `lastname`, `firstname`, `email`, `role`, `createAt`,
                  `nbWin`, `nbLoose`, `nbPoints`, `winRate`) 
            VALUES 
                (:id, :userName, :password, :lastname, :firstname, :email, :role, :createAt, 
                 :nbWin, :nbloose, :nbPoints, :winRate)';
    $stmt = $connection->prepare($sql);
    $stmt->bindParam('id', $data['id'], PDO::PARAM_INT);
    $stmt->bindParam('username', $data['username'], PDO::PARAM_STR);
    $stmt->bindParam('password', $data['password'], PDO::PARAM_STR);
    $stmt->bindParam('lastname', $data['lastname'], PDO::PARAM_STR);
    $stmt->bindParam('firstname', $data['firstname'], PDO::PARAM_STR);
    $stmt->bindParam('email', $data['email'], PDO::PARAM_STR);
    $stmt->bindParam('role', $data['role'], PDO::PARAM_STR);
    $stmt->bindParam('createAt', $data['createAt'], PDO::PARAM_STR);
    $stmt->bindParam('nbWin', $data['nbWin'], PDO::PARAM_INT);
    $stmt->bindParam('nbLoose', $data['nbLoose'], PDO::PARAM_INT);
    $stmt->bindParam('nbPoints', $data['nbPoints'], PDO::PARAM_INT);
    $stmt->bindParam('winRate', $data['winRate'], PDO::PARAM_INT);

    return $stmt->execute();
}


function userConnection(string $username, string $password)
{
    $connection = getConnection();
    $stmt = $connection->prepare("SELECT * FROM `users` WHERE `username` = :username");
    $stmt->bindParam('username', $username, PDO::FETCH_ASSOC);
    if ($stmt->execute()) {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result[0]['password'] !== $password) {
            return false;
        } else {
            return $_SESSION['user'] = $result[0]['username'];
        }
    }
    return false;


}

