<?php

namespace etc\http\Controller;

use DI\Container;
use etc\http\Request\Request;
use etc\Kernel;

/**
 * Class Controller
 *
 * @package etc\http\Controller
 */
abstract class Controller
{
    /** @var Container */
    protected $container;

    /** @var Request */
    protected $request;

    /**
     * Controller constructor.
     *
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function __construct()
    {
        $this->container = Kernel::getContainer();
        $this->request = $this->container->make(Request::class);
    }
}