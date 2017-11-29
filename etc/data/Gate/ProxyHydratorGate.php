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
     */
    public function __construct(Container $container, Hydrator $hydrator, AdapterInterface $adapter)
    {
        $this->container       = $container;
        $this->hydrator        = $hydrator;
        $this->current_adapter = $adapter;
    }

    public function getAll()
    {
        return $this->hydrator->hydrate($this->current_adapter->getAll() ?? []);
    }

    public function getById(int $id)
    {
        return $this->hydrator->hydrate($this->current_adapter->getById($id) ?? []);
    }

    public function find(array $critera)
    {
        return $this->hydrator->hydrate($this->current_adapter->getAll() ?? []);
    }

    public function insert(EntityInterface $entity)
    {
        return $this->hydrator->hydrate($this->current_adapter->getAll() ?? []);
    }

    public function update(EntityInterface $entity)
    {
        return $this->hydrator->hydrate($this->current_adapter->getAll() ?? []);
    }

    public function delete(EntityInterface $entity)
    {
        return $this->hydrator->hydrate($this->current_adapter->getAll() ?? []);
    }


}