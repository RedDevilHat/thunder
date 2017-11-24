<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 24.11.2017
 * Time: 16:40
 */

namespace etc\data\Repositories;


use DI\Container;
use etc\data\Repositories\Adapter\AdapterFabric;
use etc\Kernel;

abstract class Repositories
{
    /** @var string */
    protected $connection;

    /** @var Container */
    protected $container;

    protected $adapter;

    /**
     * Repositories constructor.
     *
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function __construct()
    {
        $this->container = Kernel::getContainer();

        if(!$this->connection) {
            $this->connection = Kernel::getParameters('default_connection');
        }

        $this->adapter = AdapterFabric::getAdapter($this->connection);
    }
}