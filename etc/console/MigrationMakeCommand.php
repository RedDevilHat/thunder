<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 08.12.2017
 * Time: 13:44
 */

namespace etc\console;


use etc\data\Migration\Migration;
use etc\data\Migration\MigrationInterface;
use Nette\PhpGenerator\PhpNamespace;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;

class MigrationMakeCommand extends ConsoleCommandAbstract
{
    protected function configure()
    {
        $this->setName('migration:make');
        $this->setDescription('Make migration');
        $this->setHelp('This command make migration class');
        $this->addArgument('n');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Create new Migration');
        $date = new \DateTime();
        $name = $input->getArgument('n').'_'.$date->getTimestamp();

        $namespace = new PhpNamespace('Src\Migration');
        $namespace->addUse('etc\data\Migration\Migration');
        $namespace->addUse('etc\data\Migration\MigrationInterface');

        $class = $namespace->addClass($name);

        $class->addImplement(MigrationInterface::class);
        $class->setExtends(Migration::class);

        $class->setImplements([MigrationInterface::class]);
        $class->addMethod('up')
              ->setReturnType('void')// method return type
              ->setBody('//TODO Add Up code here');


        $class->addMethod('down')
              ->setReturnType('void')// method return type
              ->setBody('//TODO Add Down code here');

        /** @var Filesystem $fs */
        $fs = $this->container->get('fs');

        $fs->dumpFile(__DIR__.'\..\..\src\Migration\\'.$name.'.php', $class);
    }
}