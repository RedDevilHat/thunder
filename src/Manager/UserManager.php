<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 16.12.2017
 * Time: 15:51
 */

namespace Src\Manager;


use etc\data\Manager\Manager;
use etc\security\PasswordHasher;
use Src\Entity\User;
use Src\Repositories\UserRepositories;

class UserManager extends Manager
{

    /** @var UserRepositories */
    private $userRepository;

    /** @var TokenManager */
    private $tokenManager;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = $this->container->get('user_repository');
        $this->tokenManager = $this->container->get('token_manager');
    }

    /**
     * @param string $username
     * @param string $password
     * @return array
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     * @throws \Exception
     */
    public function createUser(string $username,string $password): array
    {
        $user = new User();

        $user->setUsername($username)
            ->setPassword(PasswordHasher::hash($password));

        /** @var User $user */
        $user = $this->userRepository->create($user);
        /** @var \Src\Entity\Token $token */
        $token = $this->tokenManager->createToken($user);
        $user->setTokenId($token->getId());

        return ['user' => $user, 'token' => $token->getToken()];
    }
}