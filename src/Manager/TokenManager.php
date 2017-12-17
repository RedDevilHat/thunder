<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 16.12.2017
 * Time: 15:51
 */

namespace Src\Manager;


use etc\data\Manager\Manager;
use Src\Entity\Token;
use Src\Entity\User;
use Src\Repositories\TokenRepository;
use Src\Security\AuthTokenSecurity;

class TokenManager extends Manager
{
    /**
     * @return string
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     * @throws \Exception
     */
    public function createToken(User $user)
    {
        /** @var AuthTokenSecurity $auth */
        $auth = $this->container->get('auth_token_security');
        /** @var TokenRepository $tr */
        $tr = $this->container->get('token_repository');

        $tokenRaw = $auth->createToken();

        $token = new Token();
        $expired = new \DateTime('+ 1 month');

        $token->setToken($tokenRaw)
            ->setExpiredAt($expired->format('Y-m-d'))
            ->setUserId($user->getId());

        return $tr->create($token);
    }
}