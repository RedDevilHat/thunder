<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 24.11.2017
 * Time: 14:01
 */

namespace Src\Repositories;


use etc\data\Repositories\Repositories;

/**
 * Class HomeRepositories
 *
 * @package src\Repositories
 */
class HomeRepositories extends Repositories
{
    protected $connection = 'mysql';

    /** @var \PDO */
    protected $pdoAdapter;

    /**
     * HomeRepositories constructor.
     *
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function __construct()
    {
        parent::__construct();

        $this->pdoAdapter = $this->adapter;
    }

    /**
     * @return bool
     */
    public function getAll()
    {
        return $this->pdoAdapter->query('SELECT * FROM home')->fetch();
    }
}