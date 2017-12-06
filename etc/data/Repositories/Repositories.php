<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 24.11.2017
 * Time: 16:40
 */

namespace etc\data\Repositories;


use DI\Container;
use etc\ClassNameHelper;
use etc\data\Gate\ProxyHydratorGate;
use etc\data\Hydrator\Hydrator;
use etc\data\Repositories\Adapter\AdapterFactory;
use etc\data\Repositories\Adapter\AdapterInterface;
use etc\data\Repositories\Exception\EntityNotFoundException;
use etc\Kernel;

abstract class Repositories
{
    /** @var string */
    protected $connection;

    /** @var Container */
    protected $container;

    /** @var AdapterInterface */
    protected $adapter;

    /** @var Hydrator */
    protected $hydrator;

    /**
     * Repositories constructor.
     *
     * @throws EntityNotFoundException
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function __construct()
    {
        $this->container = Kernel::getContainer();

        if (!$this->connection) {
            $this->connection = Kernel::getParameters('default_connection');
        }

        /** @var AdapterInterface $currentAdapter */
        $currentAdapter = AdapterFactory::getAdapter($this->connection);
        $currentAdapter->setEntityName(mb_strtolower($this->getEntityName()));

        $this->hydrator = $this->container->make(Hydrator::class, ['entityName' => $this->getEntityName()]);

        $this->adapter = $this->container->make(ProxyHydratorGate::class, [
            'container' => $this->container,
            'hydrator' => $this->hydrator,
            'adapter' => $currentAdapter,
        ]);
    }

    /**
     * @return string
     * @throws EntityNotFoundException
     */
    private function getEntityName(): string
    {
        return ClassNameHelper::createTableNameFromRepositoriesName(get_class($this));
    }
}