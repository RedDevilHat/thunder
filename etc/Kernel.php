<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 24.11.2017
 * Time: 10:10
 */

namespace etc;

use App\ServiceProvider;
use DI\Container;
use DI\ContainerBuilder;
use Symfony\Component\Yaml\Yaml;

class Kernel
{
    /** @var Container */
    private static $container = null;

    /** @var array */
    private static $parameters;

    /**
     * @return Container
     */
    public static function getContainer(): Container
    {
        self::init();

        return self::$container;
    }

    /**
     * initialize Kernel app, singletone
     *
     */
    public static function init(): void
    {
        if (self::$container === null) {
            self::$container = ContainerBuilder::buildDevContainer();
            self::$parameters = Yaml::parse(file_get_contents(__DIR__ . '/../app/config/parameters.yml'));
        }
    }

    /**
     * @return array|string
     */
    public static function getParameters($name = null)
    {
        self::init();

        if (!$name) {
            return self::$parameters;
        }

        return self::$parameters[$name];
    }
}