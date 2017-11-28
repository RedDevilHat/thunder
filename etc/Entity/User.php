<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 26.11.2017
 * Time: 19:30
 */

namespace etc\Entity;


use etc\data\Entity\Entity;

class User extends Entity
{
    private $username;

    private $password;

    private $tokenId;

    private $role;


    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return User
     */
    public function setUsername($username): User
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return User
     */
    public function setPassword($password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTokenId()
    {
        return $this->tokenId;
    }

    /**
     * @param mixed $tokenId
     * @return User
     */
    public function setTokenId($tokenId): User
    {
        $this->tokenId = $tokenId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     * @return User
     */
    public function setRole($role): User
    {
        $this->role = $role;
        return $this;
    }
}