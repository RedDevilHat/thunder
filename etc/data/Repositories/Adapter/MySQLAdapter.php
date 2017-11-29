<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 24.11.2017
 * Time: 13:59
 */

namespace etc\data\Repositories\Adapter;


use Database\Connection;
use DI\Container;
use etc\data\Entity\EntityInterface;
use etc\data\MySQL\MySQLConnection;
use etc\Kernel;

class MySQLAdapter implements AdapterInterface
{
    /** @var Connection */
    protected $adapter;

    /** @var Container */
    protected $container;

    /** @var string */
    protected $table;

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
     * @param string $entityName
     */
    public function setEntityName(string $entityName) : void
    {
        $this->table = $entityName;
    }

    /**
     * @return Connection
     */
    public function getAdapter() : Connection
    {
        return $this->adapter;
    }

    public function getAll()
    {
        return $this->adapter->table($this->table)->get();
    }

    public function getById(int $id)
    {
        return $this->adapter->table($this->table)->find($id);
    }

    public function find(array $critera)
    {
        // TODO: Implement find() method.
    }

    public function insert(EntityInterface $entity)
    {
        // TODO: Implement insert() method.
    }

    public function update(EntityInterface $entity)
    {
        // TODO: Implement update() method.
    }

    public function delete(EntityInterface $entity)
    {
        // TODO: Implement delete() method.
    }


}