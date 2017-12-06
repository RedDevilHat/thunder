<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 24.11.2017
 * Time: 21:26
 */

namespace src\Guard\ApiGate;

use etc\security\ApiAuthInterface;
use etc\security\ThunderUserInterface;

/**
 * Class ApiAuthInterfaceGate
 * @package src\Guard\ApiGate
 */
class ApiAuthInterfaceGate implements ApiAuthInterface
{
    /**
     * @return string
     */
    public function createToken(): string
    {
        // TODO: Implement createToken() method.
    }

    /**
     * @return bool
     */
    public function checkGuard(): bool
    {
        // TODO: Implement checkGuard() method.
    }


    public function expiredToken(): void
    {
        // TODO: Implement expiredToken() method.
    }

    /**
     * @return ThunderUserInterface
     */
    public function getUser(): ThunderUserInterface
    {
        // TODO: Implement getUser() method.
    }

}