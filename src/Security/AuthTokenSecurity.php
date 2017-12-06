<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 06.12.2017
 * Time: 12:30
 */

namespace src\Security;


use DI\Container;
use etc\http\Request\Request;
use etc\Kernel;
use etc\security\ApiAuthTokenInterface;
use Src\Entity\User;
use Src\Repositories\TokenRepository;

class AuthTokenSecurity implements ApiAuthTokenInterface
{
    /** @var Request */
    private $request;
    /** @var Container */
    private $container;

    /**
     * AuthTokenSecurity constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request   = $request;
        $this->container = Kernel::getContainer();
    }

    public function createToken() : string
    {
        $bytes = openssl_random_pseudo_bytes(Kernel::getParameters('token_lenght'),
            bin2hex(random_bytes(Kernel::getParameters('secret_token_lenght'))));

        return bin2hex($bytes);
    }

    public function expiredToken() : void
    {
        // TODO: Implement expiredToken() method.
    }

    public function getUserByToken() : User
    {
        $token = $this->request->getAuthHeaders();

        /** @var TokenRepository $tokenRepository */
        $tokenRepository = $this->container->get('token_repository');

        return $tokenRepository->getUser($token);
    }

}