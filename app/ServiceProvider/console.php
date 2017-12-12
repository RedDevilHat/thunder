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
    $console->add(new Phinx\Console\Command\Status());
    $console->add(new Phinx\Console\Command\Init());
    $console->add(new Phinx\Console\Command\Create());
    $console->add(new Phinx\Console\Command\Migrate());
    $console->add(new Phinx\Console\Command\Breakpoint());
    $console->add(new Phinx\Console\Command\Rollback());
    $console->add(new Phinx\Console\Command\SeedCreate());
    $console->add(new Phinx\Console\Command\SeedRun());
    $console->add(new Phinx\Console\Command\Test());
    $console->run();
});