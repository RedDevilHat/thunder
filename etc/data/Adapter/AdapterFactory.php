<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 24.11.2017
 * Time: 16:18
 */

namespace etc\data\Repositories\Adapter;


use DI\Container;
use etc\Kernel;

class AdapterFactory
{
    /** @var Container */
    private static $container;

    /**
     * @param string $connetion
     *
     * @return mixed
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public static function getAdapter(string $connetion)
    {
        self::$container = Kernel::getContainer();

        return self::$container->get($connetion . '-adapter');
    }
}