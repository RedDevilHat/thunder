<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 24.11.2017
 * Time: 14:01
 */

namespace Src\Repositories;


use Database\Connection;
use etc\data\Repositories\Repositories;
use etc\Entity\User;
use Src\Entity\Home;

/**
 * Class HomeRepositories
 *
 * @package src\Repositories
 */
class HomeRepositories extends Repositories
{
    protected $connection = 'mysql';

    /** @var Connection */
    protected $adapter;

    /**
     * @return array
     */
    public function getAll()
    {
        $homes = $this->adapter->table('home')->get();
        $result = [];
        foreach ($homes as $home) {
            $result[] = $this->hydrator->hydrate($home);
        }

        return $result;
    }

    public function getUser()
    {
        $user = new User();
        return $user->prepare();
    }
}