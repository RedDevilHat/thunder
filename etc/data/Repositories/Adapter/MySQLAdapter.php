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
use etc\ClassNameHelper;
use etc\data\Entity\EntityInterface;
use etc\data\Hydrator\Hydrator;
use etc\data\MySQL\MySQLConnection;
use etc\Kernel;

class MySQLAdapter implements AdapterInterface
{
    /** @var Connection */
    protected $transport;

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

        $this->transport = $dataBase->init();
    }



    /**
     * @param string $entityName
     */
    public function setEntityName(string $entityName) : void
    {
        $this->table = $entityName;
    }

    public function getAll()
    {
        return $this->transport->table($this->table)->get();
    }

    public function getById(int $id)
    {
        return $this->transport->table($this->table)->find($id);
    }

    public function find(array $criteria, string $operator = null)
    {
        $query = $this->transport->table($this->table)->select();
        if($operator === null) {
            $operator = '=';
        }
        foreach ($criteria as $key => $value) {
            $query->where($key, $operator, $value);
        }

        return $query->get();
    }

    public function insert(EntityInterface $entity)
    {
        $this->transport->table($this->table)->insert($this->entityToArray($entity));
    }

    public function update(EntityInterface $entity)
    {
        $values = $this->entityToArray($entity);
        unset($values['id']);
        $this->transport->table($this->table)->where('id', '=', $entity->getId())->update($values);
    }

    public function delete(EntityInterface $entity)
    {
        $this->transport->table($this->table)->delete($entity->getId());
    }

    /**
     * @return Connection
     */
    public function getRawConnection()
    {
        return $this->transport;
    }

    public function entityToArray(EntityInterface $entity)
    {
        /** @var Hydrator $hydrator */
        $hydrator = $this->container->make(Hydrator::class, [
            'entityName' => ClassNameHelper::getEntityClassNameWithoutNameSpace(get_class($entity))
        ]);

        return $hydrator->extract($entity);
    }

    public function processedRawData(array $data)
    {
        // TODO implement if need
    }
}