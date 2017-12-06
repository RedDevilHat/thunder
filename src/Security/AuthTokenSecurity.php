<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 06.12.2017
 * Time: 12:30
 */

namespace Src\Security;


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
     * @param Container $container
     */
    public function __construct(Request $request, Container $container)
    {
        $this->request   = $request;
        $this->container = $container;
    }

    /**
     * @return string
     * @throws \RuntimeException
     * @throws \Exception
     */
    public function createToken() : string
    {
        $isSourceStrong = bin2hex(random_bytes(Kernel::getParameters('secret_token_lenght')));
        $bytes          = openssl_random_pseudo_bytes(Kernel::getParameters('token_lenght'), $isSourceStrong);

        if (false === $isSourceStrong || false === $bytes) {
            throw new \RuntimeException('IV generation failed');
        }

        return bin2hex($bytes);
    }

    public function expiredToken() : void
    {
        // TODO: Implement expiredToken() method.
    }

    /**
     * @return User
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     * @throws \etc\security\Exception\UnauthorizedException
     */
    public function getUserByToken() : User
    {
        $token = $this->request->getAuthToken();

        /** @var TokenRepository $tokenRepository */
        $tokenRepository = $this->container->get('token_repository');

        return $tokenRepository->getUser($token);
    }

}