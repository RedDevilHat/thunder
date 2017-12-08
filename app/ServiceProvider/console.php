<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 07.12.2017
 * Time: 23:01
 */

$kernel->call(function () use ($kernel) {
    /** @var \Symfony\Component\Console\Application $console */
    $console = $kernel->get('console');

    $console->add(new \Symfony\Component\Console\Command\ListCommand());
    $console->add(new \Src\Console\HelloWorldCommand());
    $console->add(new \etc\console\MigrationMakeCommand());
    $console->run();
});