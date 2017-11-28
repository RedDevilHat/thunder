<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 28.11.2017
 * Time: 23:34
 */

namespace etc\data\Gate;


use DI\Container;

class Gate
{
    /** @var Container */
    private $container;

    /**
     * Gate constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }
}