<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 29.11.2017
 * Time: 0:56
 */

namespace Src\Repositories;


use Database\Connection;
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

    /** @var Connection */
    protected $adapter;


    public function getAll()
    {
        return $this->hydrator->hydrate($this->adapter->table('user')->get());
    }

    public function getById(int $id) : User
    {
        return $this->hydrator->hydrate($this->adapter->table('user')->find($id));
    }

    public function getByUsername(string $username) : User
    {
        return $this->hydrator->hydrate($this->adapter->table('user')->where('username', '=', $username)->get());
    }
}