<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 24.11.2017
 * Time: 13:59
 */

namespace etc\data\Repositories\Adapter;


use DI\Container;
use etc\data\MySQL\MySQLConnection;
use etc\Kernel;

class MySQLAdapter implements RepositoriesInterface
{
    /** @var \PDO */
    protected $adapter;

    /** @var Container */
    protected $container;

    /**
     * mysqlAdapter constructor.
     *
     * @param MySQLConnection $dataBase
     */
    public function __construct(MySQLConnection $dataBase)
    {
        $this->container = Kernel::getContainer();

        $this->adapter = $dataBase->init();
    }

    /**
     * @return \PDO
     */
    public function getAdapter() : \PDO
    {
        return $this->adapter;
    }
}