<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 17.12.2017
 * Time: 17:43
 */

namespace etc\security;


class PasswordHasher
{
    /**
     * @param string $password
     * @return string
     */
    public static function hash(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}