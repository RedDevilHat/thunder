<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 07.12.2017
 * Time: 21:51
 */

namespace Src\Console;


use etc\console\ConsoleCommandAbstract;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class HelloWorldCommand
 * @package Src\Console
 */
class HelloWorldCommand extends ConsoleCommandAbstract
{

        protected function configure()
        {
            $this->setName('thunder:say_hello');
            $this->setDescription('Thunder say hello');
        }

        protected  function execute(InputInterface $input, OutputInterface $output)
        {
            $output->writeln('Hello i`m Thunder');
        }
}