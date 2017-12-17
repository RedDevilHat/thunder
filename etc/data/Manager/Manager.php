<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 16.12.2017
 * Time: 15:52
 */

namespace etc\data\Manager;


use DI\Container;
use etc\Kernel;

abstract class Manager
{
    /** @var Container */
    protected $container;

    /**
     * Manager constructor.
     */
    public function __construct()
    {
        $this->container = Kernel::getContainer();
    }
}