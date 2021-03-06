<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 06.12.2017
 * Time: 13:17
 */

namespace Src\Entity;


use etc\data\Entity\Entity;

class Token extends Entity
{
    /** @var int */
    private $id;
    /** @var string */
    private $token;

    /** @var int */
    private $user_id;

    /** @var int */
    private $expired_at;

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Token
     */
    public function setId(int $id) : Token
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getToken() : string
    {
        return $this->token;
    }

    /**
     * @param string $token
     *
     * @return Token
     */
    public function setToken(string $token) : Token
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserId() : int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     *
     * @return Token
     */
    public function setUserId(int $user_id) : Token
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * @return int
     */
    public function getExpiredAt() : int
    {
        return $this->expired_at;
    }

    /**
     * @param $expired_at
     *
     * @return Token
     */
    public function setExpiredAt($expired_at) : Token
    {
        $this->expired_at = $expired_at;

        return $this;
    }
}