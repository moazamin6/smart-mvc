<?php
/**
 * Created by PhpStorm.
 * User: moaza
 * Date: 7/22/2019
 * Time: 5:30 PM
 */

namespace Core\CommandLine;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateController extends Command
{
    protected $commandName = 'make:controller';
    protected $commandDescription = "Create controller with default structure";

    protected $commandArgumentName = "name";
    protected $commandArgumentDescription = "Who do you want to greet?";

//    protected $commandOptionName = "cap";
//    protected $commandOptionDescription = 'If set, it will greet in uppercase letters';

    protected function configure()
    {
        $this
            ->setName($this->commandName)
            ->setDescription($this->commandDescription)
            ->addArgument(
                $this->commandArgumentName,
                InputArgument::OPTIONAL,
                $this->commandArgumentDescription
            );
//            ->addOption(
//                $this->commandOptionName,
//                null,
//                InputOption::VALUE_NONE,
//                $this->commandOptionDescription
//            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument($this->commandArgumentName);

        if ($name) {
            $text = 'Hello ' . $name;
        } else {
            $text = 'Hello';
        }

//        if ($input->getOption($this->commandOptionName)) {
//            $text = strtoupper($text);
//        }

        $output->writeln($text);
    }
}