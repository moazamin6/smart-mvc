<?php
/**
 * Created by PhpStorm.
 * User: moaza
 * Date: 7/22/2019
 * Time: 5:30 PM
 */

namespace Core\CommandLine;

use Core\Config;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MakeModel extends Command
{
    protected $commandName = 'make:model';
    protected $commandDescription = "Create model with default structure";

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

            $base_namespace = Config::get('model_namespace');
            $namespace = CLIHelper::createNamespace($base_namespace, $name);
            $path_to_create_file = Config::get('model_base_url') . '/' . $name . '.php';
            $Class_name = CLIHelper::getClassName($name);

            $file_contents = CLIHelper::getModelTemplate($namespace, $Class_name);

            if (!file_exists($path_to_create_file)) {

                if (!is_dir(dirname($path_to_create_file))) {
                    mkdir(dirname($path_to_create_file), 0777, true);
                }


                if (file_put_contents($path_to_create_file, $file_contents)) {

                    $message = 'Model Created Successfully';
                } else {
                    $message = 'Some Error Occur';
                }
            } else {
                $message = 'Model already exist';
            }


        } else {
            $message = 'Please give model name';
        }

        $output->writeln($message);
    }
}