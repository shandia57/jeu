<?php

namespace App\Classes;
require_once "Connection.php";
use PDO;
use App\Classes\color;

class User
{
    private $username;
    private $password;
    private $lastName;
    private $firstName;
    private $mail;
    private $roles;
    private $createAt;



    /**
     * @return mixed
     */
    public function getUsername(): mixed
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return User
     */
    public function setUsername(mixed $username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword(): mixed
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return User
     */

    public function setPassword(mixed $password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName(): mixed
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     * @return User
     */

    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName(): mixed
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     * @return User
     */

    public function setFirstName(mixed $firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMail(): mixed
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     * @return User
     */

    public function setMail(mixed $mail)
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreateAt(): mixed
    {
        return $this->createAt;
    }

    /**
     * @param mixed $createAt
     * @return User
     */
    public function setCreateAt(mixed $createAt)
    {
        $this->createAt = $createAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRoles(): mixed
    {
        return $this->roles;
    }

    /**
     * @param mixed $roles
     * @return User
     */
    public function setRoles(mixed $roles)
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



    function getUsers(): array
    {
        $db = Connection::get();
        $stmt = $db->prepare("SELECT * FROM `users` ");
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    function userExists(string $username): bool
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

    function insertUser($data): bool
    {
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
        $stmt->bindParam('roles', $data['roles'], PDO::PARAM_STR);
        $stmt->bindParam('createAt', $data['createAt'], PDO::PARAM_STR);

        return $stmt->execute();
    }


    function userConnection(string $username, string $password)
    {
        $db = Connection::get();
        $stmt = $db->prepare("SELECT * FROM `users` WHERE `username` = :username");
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

}