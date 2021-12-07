<?php

namespace App\Classes;
require_once "Connection.php";
use PDO;

class User
{

    private int $id;
    private string $username;
    private string $password;
    private string $lastName;
    private string $firstName;
    private string $mail;
    private string $roles;
    private string $createAt;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }


    public function setUsername(string $username) : User
    {
        $this->username = $username;
        return $this;
    }


    public function getPassword(): string
    {
        return $this->password;
    }



    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }


    public function getLastName(): string
    {
        return $this->lastName;
    }



    public function setLastName(string $lastName) : User
    {
        $this->lastName = $lastName;
        return $this;
    }


    public function getFirstName(): string
    {
        return $this->firstName;
    }


    public function setFirstName(string $firstName): User
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getMail(): string
    {
        return $this->mail;
    }


    public function setMail(string $mail): User
    {
        $this->mail = $mail;
        return $this;
    }


    public function getCreateAt(): string
    {
        return $this->createAt;
    }


    public function setCreateAt(string $createAt): User
    {
        $this->createAt = $createAt;
        return $this;
    }


    public function getRoles(): string
    {
        return $this->roles;
    }


    public function setRoles(string $roles): User
    {
        $this->roles = $roles;
        return $this;
    }


    public function __construct(
        $username = "",
        $password = "",
        $firstName = "",
        $lastName = "",
        $mail = "",
        $roles = "",
        $createAt = "",

    ) {
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setMail($mail);
        $this->setRoles($roles);
        $this->setCreateAt($createAt);
    }

    // ---------------------------------------------------------------- CRUD users

    public function getUsers(): array
    {
        $db = Connection::get();
        $stmt = $db->prepare("SELECT * FROM `users` ");
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function userExists(string $username): bool
    {
        $db = Connection::get();
        $stmt = $db->prepare("SELECT COUNT(*) as nb FROM `users` WHERE `username` = :username");
        $stmt->bindParam('username', $username, PDO::FETCH_ASSOC);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result[0]['nb'] > 0;
        }
        return false;

    }

    public function insertUser($data): bool
    {
        $date = "2021-11-24";
        $roles = "ROLES_USER";
        $db = Connection::get();
        $sql = 'INSERT INTO 
            users(`username`, `password`, `lastName`, `firstName`, `mail`, `roles`, `createAt`) 
            VALUES 
                (:username, :password, :lastName, :firstName, :mail, :roles, :createAt)';
        $stmt = $db->prepare($sql);
        $stmt->bindParam('username', $data['username'], PDO::PARAM_STR);
        $stmt->bindParam('password', $data['password'], PDO::PARAM_STR);
        $stmt->bindParam('lastName', $data['lastName'], PDO::PARAM_STR);
        $stmt->bindParam('firstName', $data['firstName'], PDO::PARAM_STR);
        $stmt->bindParam('mail', $data['mail'], PDO::PARAM_STR);
        $stmt->bindParam('roles', $roles, PDO::PARAM_STR);
        $stmt->bindParam('createAt', $date, PDO::PARAM_STR);

        return $stmt->execute();
    }
    public function insertUserAdmin($dataUser): bool
    {
        $connection = Connection::get();
        $date = "2021-11-24";
    
        $sql = 'INSERT INTO
                `users`(`username`, `password`, `firstName`, `lastName`, `mail`, `roles`, `createAt`) 
                VALUES 
                    (:username, :password, :lastname, :firstname, :mail, :roles, :createAt )';
        $stmt = $connection->prepare($sql);
        $stmt->bindParam('username', $dataUser['username'], PDO::PARAM_STR);
        $stmt->bindParam('password', $dataUser['password'], PDO::PARAM_STR);
        $stmt->bindParam('lastname', $dataUser['lastName'], PDO::PARAM_STR);
        $stmt->bindParam('firstname', $dataUser['firstName'], PDO::PARAM_STR);
        $stmt->bindParam('mail', $dataUser['mail'], PDO::PARAM_STR);
        $stmt->bindParam('roles', $dataUser['roles'], PDO::PARAM_STR);
        $stmt->bindParam('createAt', $date, PDO::PARAM_STR);
    
    
        return $stmt->execute();
    }

    public function updateUser($dataUser) : bool
    {
        $connection = Connection::get();
        $sql = "UPDATE `users` SET 
         `firstName`=  '$dataUser[firstName]', 
         `lastName` = '$dataUser[lastName]', 
         `mail` = '$dataUser[mail]', 
         `roles` =  '$dataUser[roles]'
          WHERE `users`.id_user = '$dataUser[id_user]' ;";
        $stmt = $connection->prepare($sql);
        return $stmt->execute();
    }

    public function deleteUser($id_user) : array
    {
        $connection = Connection::get();
        $sql = "DELETE FROM `jeuDeLoieV2`.`users` WHERE `users`.`id_user` = $id_user";
        $stmt = $connection->prepare($sql);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function userConnection(string $username, string $password)
    {
        $db = Connection::get();
        $stmt = $db->prepare("SELECT * FROM `users` WHERE `username` = :username");
        $stmt->bindParam('username', $username, PDO::FETCH_ASSOC);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result[0]['password'] !== $password) {
                return false;
            } else {
                $_SESSION['user'] = [
                    "username" => $result[0]['username'],       
                    "roles" => $result[0]['roles'] 
                ];
                // echo $_SESSION['test']['username'];
                return $_SESSION['user']; 
                
                
            }
        }
        return false;

    }
    public function filterArrayByKeyValue($array, $key, $keyValue)
    {
        return array_filter($array, function($value) use ($key, $keyValue) {
            return $value[$key] == $keyValue;
        });
    }

}

