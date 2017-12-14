<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 29.11.2017
 * Time: 0:55
 */

namespace Src\Entity;


use etc\data\Entity\Entity;
use etc\security\ThunderUserInterface;

class User extends Entity implements ThunderUserInterface
{
    /** @var int */
    private $id;
    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var int */
    private $token_id;

    /** @var int */
    private $role_id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;
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
     * @return User
     */
    public function setUsername(string $username): User
    {
        $this->username = $username;
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
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return int
     */
    public function getTokenId(): int
    {
        return $this->token_id;
    }

    /**
     * @param int $token_id
     * @return User
     */
    public function setTokenId(int $token_id): User
    {
        $this->token_id = $token_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getRoleId(): int
    {
        return $this->role_id;
    }

    /**
     * @param int $role_id
     * @return User
     */
    public function setRoleId(int $role_id): User
    {
        $this->role_id = $role_id;
        return $this;
    }

}