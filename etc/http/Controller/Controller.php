<?php

namespace etc\http\Controller;

use DI\Container;
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

    public function __construct()
    {
        $this->container = Kernel::getContainer();
    }
}