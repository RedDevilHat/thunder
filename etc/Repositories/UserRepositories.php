<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 26.11.2017
 * Time: 19:33
 */

namespace etc\Repositories;


use Database\Connection;
use etc\data\Repositories\Repositories;
use etc\Entity\User;

class UserRepositories extends Repositories
{
    protected $connection = 'mysql';

    /** @var Connection */
    protected $adapter;


    public function getAll()
    {
        return $this->adapter->table('user')->get();
    }

    public function getById(int $id) : User
    {
        return $this->adapter->table('user')->find($id);
    }

    public function getByUsername(string $username) : User
    {
        return $this->adapter->table('user')->where('username', '=' ,$username)->get();
    }
}