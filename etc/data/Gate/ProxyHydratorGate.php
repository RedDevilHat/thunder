<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 28.11.2017
 * Time: 23:34
 */

namespace etc\data\Gate;


use DI\Container;
use etc\data\Entity\EntityInterface;
use etc\data\Hydrator\Hydrator;
use etc\data\Repositories\Adapter\AdapterInterface;

/**
 * Class ProxyHydratorGate
 *
 * @package etc\data\Gate
 */
class ProxyHydratorGate implements AdapterInterface
{
    /** @var Container */
    private $container;
    /** @var Hydrator */
    private $hydrator;

    /** @var AdapterInterface */
    private $current_adapter;

    /**
     * Gate constructor.
     *
     * @param Container $container
     * @param Hydrator $hydrator
     * @param AdapterInterface $adapter
     */
    public function __construct(Container $container, Hydrator $hydrator, AdapterInterface $adapter)
    {
        $this->container = $container;
        $this->hydrator = $hydrator;
        $this->current_adapter = $adapter;
    }

    /**
     * @param string $entityName
     */
    public function setEntityName(string $entityName)
    {
        // TODO: Implement setEntityName() method.
    }

    /**
     * Get all data from table
     *
     * @return array
     */
    public function getAll()
    {
        return $this->hydrator->hydrate($this->current_adapter->getAll());
    }

    /**
     * Get from table by id
     *
     * @param int $id
     *
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->hydrator->hydrate($this->current_adapter->getById($id));
    }

    /**
     * Find data in table, need criteria
     *
     * @param array $criteria like ['field_name' => 'value']
     * @param string|null $operator not required params, avaible all sql where operators
     *
     * @return mixed
     */
    public function find(array $criteria, string $operator = null)
    {
        return $this->hydrator->hydrate($this->current_adapter->find($criteria, $operator));
    }

    /**
     * Save data in table
     *
     * @param EntityInterface $entity
     *
     * @return mixed
     */
    public function insert(EntityInterface $entity)
    {
        return $this->hydrator->hydrate($this->current_adapter->insert($entity));
    }

    /**
     * Update data in table
     *
     * @param EntityInterface $entity
     *
     * @return mixed
     */
    public function update(EntityInterface $entity)
    {
        return $this->hydrator->hydrate($this->current_adapter->update($entity));
    }

    /**
     * Delete data in table
     *
     * @param EntityInterface $entity
     *
     * @return mixed
     */
    public function delete(EntityInterface $entity)
    {
        return $this->hydrator->hydrate($this->current_adapter->delete($entity));
    }

    /**
     * Return raw connection
     *
     * @return mixed
     */
    public function getRawConnection()
    {
        return $this->current_adapter->getRawConnection();
    }

    /**
     * @param EntityInterface $entity
     *
     * @return mixed
     */
    public function entityToArray(EntityInterface $entity)
    {
        return $this->hydrator->extract($entity);
    }

    /**
     * Hydrate raw data
     *
     * @param array $data
     *
     * @return mixed
     */
    public function processedRawData(array $data)
    {
        return $this->hydrator->hydrate($data);
    }
}