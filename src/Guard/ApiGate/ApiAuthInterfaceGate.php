<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 24.11.2017
 * Time: 21:26
 */

namespace src\Guard\ApiGate;


use etc\auth\ApiAuthInterface;
use Src\Entity\User;

/**
 * Class ApiAuthInterfaceGate
 * @package src\Guard\ApiGate
 */
class ApiAuthInterfaceGate implements ApiAuthInterface
{
    public function createToken(): string
    {
        // TODO: Implement createToken() method.
    }

    public function checkGuard(): bool
    {
        // TODO: Implement checkGuard() method.
    }

    public function expiredToken(): void
    {
        // TODO: Implement expiredToken() method.
    }

    public function getUser() : User
    {
        // TODO: Implement getUser() method.
    }

}