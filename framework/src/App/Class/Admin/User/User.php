<?php 

namespace App\Class\Admin\User;
use PDO;
require_once __DIR__ ."/../../../Connection/connection.php";

class User
{
    public int $id;
    public string $lastname;
    public string $firstname;
    public string $username;
    public string $email;
    public string $password;
    public string $role;
    public string $createAt;

    /**
     * User constructor.
     * @param int $id
     * @param string $lastname
     * @param string $firstname
     * @param string $username
     * @param string $email
     * @param string $password
     * @param string $role
     * @param string $createAt
     * @param int $nbWin
     * @param int $nbPoints
     * @param int $nbLoose
     * @param int $winRate
     */
    // public function __construct(int $id, string $lastname, string $firstname, string $username, string $email, string $password, string $role, string $createAt)
    // {
    //     $this->id = $id;
    //     $this->lastname = $lastname;
    //     $this->firstname = $firstname;
    //     $this->username = $username;
    //     $this->email = $email;
    //     $this->password = $password;
    //     $this->role = $role;
    //     $this->createAt = $createAt;

    // }

    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }


    public function getLastname(): string
    {
        return $this->lastname;
    }


    public function setLastname(string $lastname): User
    {
        $this->lastname = $lastname;
        return $this;
    }


    public function getFirstname(): string
    {
        return $this->firstname;
    }


    public function setFirstname(string $firstname): User
    {
        $this->firstname = $firstname;
        return $this;
    }


    public function getUsername(): string
    {
        return $this->username;
    }


    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }


    public function getEmail(): string
    {
        return $this->email;
    }


    public function setEmail(string $email): User
    {
        $this->email = $email;
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


    public function getRole(): string
    {
        return $this->role;
    }


    public function setRole(string $role): User
    {
        $this->role = $role;
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

    public function getUsers(): array
    {
        $connection = getConnection();
        $stmt = $connection->prepare("SELECT * FROM `users` ");
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    // TODO ajouté une sortie 
    public function updateUser($dataUser)
    {
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

    public function insertUser($dataUser): bool
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
    // TODO ajouté une sortie
    public function deleteUser($id_user)
    {
        $connection = getConnection();
        $sql = "DELETE FROM `jeuDeLoieV2`.`users` WHERE `users`.`id_user` = $id_user";
        $stmt = $connection->prepare($sql);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

}