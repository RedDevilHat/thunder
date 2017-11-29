<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 29.11.2017
 * Time: 0:56
 */

namespace Src\Repositories;


use Database\Connection;
use etc\data\Repositories\Adapter\AdapterInterface;
use etc\data\Repositories\Repositories;
use Src\Entity\User;

/**
 * Class UserRepositories
 *
 * @package Src\Repositories
 */
class UserRepositories extends Repositories
{
    protected $connection = 'mysql';

    /** @var AdapterInterface */
    protected $adapter;


    public function getAll()
    {
        return $this->adapter->getAll();
    }

    public function getById(int $id)
    {
        return $this->adapter->getById($id);
    }

    public function getByUsername(string $username)
    {
        return $this->adapter->find(['username' => $username]);
    }

    public function find(array $criteria, string $operator = '=')
    {
        return $this->adapter->find($criteria, $operator);
    }

    public function create(User $user)
    {
        return $this->adapter->insert($user);
    }

    public function update(User $user)
    {
        return $this->adapter->update($user);
    }

    public function delete(User $user)
    {
        return $this->adapter->delete($user);
    }
}