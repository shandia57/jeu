<?php


namespace App\Users;


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
    public int $nbWin;
    public int $nbPoints;
    public int $nbLoose;
    public int $winRate;

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
    public function __construct(int $id, string $lastname, string $firstname, string $username, string $email, string $password, string $role, string $createAt, int $nbWin, int $nbPoints, int $nbLoose, int $winRate)
    {
        $this->id = $id;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->createAt = $createAt;
        $this->nbWin = $nbWin;
        $this->nbPoints = $nbPoints;
        $this->nbLoose = $nbLoose;
        $this->winRate = $winRate;
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

    /**
     * @return int
     */
    public function getNbWin(): int
    {
        return $this->nbWin;
    }

    /**
     * @param int $nbWin
     * @return Users
     */
    public function setNbWin(int $nbWin): Users
    {
        $this->nbWin = $nbWin;
        return $this;
    }

    /**
     * @return int
     */
    public function getNbPoints(): int
    {
        return $this->nbPoints;
    }

    /**
     * @param int $nbPoints
     * @return Users
     */
    public function setNbPoints(int $nbPoints): Users
    {
        $this->nbPoints = $nbPoints;
        return $this;
    }

    /**
     * @return int
     */
    public function getNbLoose(): int
    {
        return $this->nbLoose;
    }

    /**
     * @param int $nbLoose
     * @return Users
     */
    public function setNbLoose(int $nbLoose): Users
    {
        $this->nbLoose = $nbLoose;
        return $this;
    }

    /**
     * @return int
     */
    public function getWinRate(): int
    {
        return $this->winRate;
    }

    /**
     * @param int $winRate
     * @return Users
     */
    public function setWinRate(int $winRate): Users
    {
        $this->winRate = $winRate;
        return $this;
    }


}
