<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 24.11.2017
 * Time: 14:01
 */

namespace Src\Repositories;


use etc\data\Repositories\Adapter\AdapterInterface;
use etc\data\Repositories\Repositories;
use etc\Entity\User;

/**
 * Class HomeRepositories
 *
 * @package src\Repositories
 */
class HomeRepositories extends Repositories
{
    protected $connection = 'mysql';

    /** @var AdapterInterface */
    protected $adapter;

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->adapter->getAll();
    }

    public function getUser()
    {

    }
}