<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 09.12.2017
 * Time: 21:16
 */

namespace etc\console;


use etc\data\Migration\Migration;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MigrationCommand extends ConsoleCommandAbstract
{
    protected function configure()
    {
        $this->setName('migration:migrate');
        $this->setDescription('Execute named migration');
        $this->setHelp('This command execute up() in you named Migration');
        $this->addArgument('n');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Start Migration');


        $name = $input->getArgument('n');
        $migration = new $name();

        $migration->up();
    }
}