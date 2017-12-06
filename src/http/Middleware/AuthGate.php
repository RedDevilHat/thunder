<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 06.12.2017
 * Time: 11:43
 */

namespace src\http\Middleware;


use etc\security\ApiAuthInterface;
use etc\security\AuthGateInterface;


class AuthGate implements AuthGateInterface
{

    public function checkGuard() : bool
    {
        // TODO: Implement checkGuard() method.
    }

}