<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 07.12.2017
 * Time: 21:47
 */

namespace etc\console;


use DI\Container;
use etc\Kernel;
use Symfony\Component\Console\Command\Command;

abstract class ConsoleCommandAbstract extends  Command
{
    /** @var Container */
    protected $container;

    /**
     * ConsoleCommandAbstract constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->container = Kernel::getContainer();
    }
}