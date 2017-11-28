<?php

namespace etc\security;

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
     * @return ThunderUserInterface
     */
    public function getUser() : ThunderUserInterface;
}