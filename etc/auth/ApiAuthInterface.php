<?php

namespace etc\auth;


use etc\Entity\User;

interface ApiAuthInterface
{
    /**
     * @return string
     */
    public function createToken() : string;

    /**
     * @return bool
     */
    public function checkGuard() : bool;


    /**
     * @return void
     */
    public function expiredToken() : void;

    /**
     * @return User
     */
    public function getUser() : User;
}