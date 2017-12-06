<?php

namespace etc\security;

use Src\Entity\User;

interface ApiAuthTokenInterface
{
    /**
     * @return string
     */
    public function createToken() : string;

    /**
     * @return void
     */
    public function expiredToken() : void;

    /**
     * @return User
     */
    public function getUserByToken() : User;
}