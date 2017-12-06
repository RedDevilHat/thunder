<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 06.12.2017
 * Time: 13:16
 */

namespace Src\Repositories;


use etc\data\Repositories\Adapter\AdapterInterface;
use etc\data\Repositories\Repositories;
use etc\security\Exception\UnauthorizedException;
use Src\Entity\Token;
use Src\Entity\User;

/**
 * Class TokenRepository
 *
 * @package Src\Repositories
 */
class TokenRepository extends Repositories
{
    protected $connection = 'mysql';

    /** @var AdapterInterface */
    protected $adapter;

    /**
     * @param string $token
     * @return User
     * @throws UnauthorizedException
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function getUser(string $token) : User
    {
        /** @var Token $dbToken */
        $dbToken = $this->adapter->find(['token' => $token]);

        if($dbToken !== null) {
            /** @var UserRepositories $userRepository */
            $userRepository = $this->container->get('user_repository');

            /** @var User $user */
            $user = $userRepository->getById($dbToken->getUserId());

            return $user;
        }

        throw new UnauthorizedException();
    }
}