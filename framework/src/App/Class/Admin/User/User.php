<?php 

namespace App\Class\Admin\Users;
use PDO;
require_once __DIR__ ."/../../../Connection/connection.php";

class Users
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
     * Users constructor.
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
    public function __construct(int $id, string $lastname, string $firstname, string $username, string $email, string $password, string $role, string $createAt)
    {
        $this->id = $id;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->createAt = $createAt;

    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Users
     */
    public function setId(int $id): Users
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return Users
     */
    public function setLastname(string $lastname): Users
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return Users
     */
    public function setFirstname(string $firstname): Users
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return Users
     */
    public function setUsername(string $username): Users
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Users
     */
    public function setEmail(string $email): Users
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return Users
     */
    public function setPassword(string $password): Users
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return Users
     */
    public function setRole(string $role): Users
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreateAt(): string
    {
        return $this->createAt;
    }

    /**
     * @param string $createAt
     * @return Users
     */
    public function setCreateAt(string $createAt): Users
    {
        $this->createAt = $createAt;
        return $this;
    }


}