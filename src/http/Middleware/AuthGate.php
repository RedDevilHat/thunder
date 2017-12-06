<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 06.12.2017
 * Time: 11:43
 */

namespace Src\http\Middleware;

use etc\security\AuthGateInterface;
use Src\Security\AuthTokenSecurity;

/**
 * Class AuthGate
 * @package src\http\Middleware
 */
class AuthGate implements AuthGateInterface
{

    /** @var AuthTokenSecurity */
    private $security;

    /**
     * AuthGate constructor.
     * @param AuthTokenSecurity $security
     */
    public function __construct(AuthTokenSecurity $security)
    {
        $this->security = $security;
    }

    /**
     * @return bool
     */
    public function checkGuard()
    {
        $this->security->getUserByToken();
    }

}